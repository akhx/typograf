<?php

namespace akh\Typograf;

class Typograf
{
    protected $rules = [];

    protected $debug = false;

    protected $arDebug = [];

    protected $safeBlock;

    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
        $this->safeBlock = new SafeBlock();
        $this->initRules();
    }

    protected function initRules()
    {
        $all = RuleFinder::getAllRule();
        foreach ($all as $ruleClass) {
            $this->rules[$ruleClass] = new $ruleClass();
        }

        uasort(
            $this->rules,
            function ($a, $b) {
                return $a->getSort() <=> $b->getSort();
            }
        );
    }

    public function apply($text)
    {
        $text = $this->safeBlock->on($text);

        foreach ($this->rules as $rule) {
            if ($rule->getActive() === false) {
                continue;
            }

            if ($this->debug === true) {
                $arLog = [
                    'rule' => $rule,
                    'startText' => $text
                ];
            }

            $text = $rule->handler($text);

            if ($this->debug === true) {
                $arLog['endText'] = $text;
                $this->arDebug[] = $arLog;
            }
        }

        return $this->safeBlock->off($text);
    }

    public function enableRule($name)
    {
        $this->changeRule($name, true);
    }

    public function disableRule($name)
    {
        $this->changeRule($name, false);
    }

    final protected function changeRule($name, bool $active)
    {
        if ($name === '*') {
            foreach ($this->rules as &$rule) {
                $rule->setActive($active);
            }
        } else {
            $pattern = '#' . str_replace(['\\', '*'], ['\\\\', '.+'], $name) . '$#';
            foreach ($this->rules as &$rule) {
                preg_match($pattern, get_class($rule), $matches);
                if (!empty($matches)) {
                    $rule->setActive($active);
                }
            }
        }
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function getSafeBlock(): SafeBlock
    {
        return $this->safeBlock;
    }
}