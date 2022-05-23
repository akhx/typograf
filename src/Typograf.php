<?php

namespace Akh\Typograf;

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

    public function addRule($ruleClass)
    {
        if (true === is_subclass_of($ruleClass, 'Akh\Typograf\Rule\AbstractRule')) {
            $this->rules[spl_object_hash($ruleClass)] = $ruleClass;
            $this->sortRule();
        }
    }

    public function apply($text)
    {
        $newText = $this->safeBlock->on($text);

        foreach ($this->rules as $rule) {
            if (true === $this->debug) {
                $arLogRule = [
                    'rule' => get_class($rule),
                    'startText' => $newText,
                ];
            }

            if (false === $rule->getActive()) {
                if (true === $this->debug) {
                    $arLogRule['endText'] = $newText;
                    $arLogRule['status'] = 'skip';
                    $arLog[] = $arLogRule;
                }

                continue;
            }

            $newText = $rule->handler($newText);

            if (true === $this->debug) {
                $arLogRule['endText'] = $newText;
                $arLogRule['status'] = $arLogRule['startText'] !== $arLogRule['endText'] ? 'modify' : 'passed';
                $arLog[] = $arLogRule;
            }
        }

        $newText = $this->safeBlock->off($newText);

        if (true === $this->debug) {
            $this->arDebug[] = [
                'start' => $text,
                'end' => $newText,
                'trace' => $arLog ?? [],
            ];
        }

        return $newText;
    }

    public function enableRule($name)
    {
        $this->changeRule($name, true);
    }

    public function disableRule($name)
    {
        $this->changeRule($name, false);
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function getSafeBlock(): SafeBlock
    {
        return $this->safeBlock;
    }

    public function getDebugInfo(): array
    {
        return $this->arDebug;
    }

    protected function initRules()
    {
        $all = (new RuleFinder())->getAllRule();
        foreach ($all as $ruleClass) {
            $this->rules[$ruleClass] = new $ruleClass();
        }

        $this->sortRule();
    }

    protected function sortRule()
    {
        uasort(
            $this->rules,
            function ($a, $b) {
                return $a->getSort() <=> $b->getSort();
            }
        );
    }

    final protected function changeRule($name, bool $active)
    {
        if ('*' === $name) {
            foreach ($this->rules as $rule) {
                $rule->setActive($active);
            }
        } else {
            $pattern = '#' . str_replace(['\\', '*'], ['\\\\', '.+'], $name) . '$#';
            foreach ($this->rules as $rule) {
                preg_match($pattern, get_class($rule), $matches);
                if (!empty($matches)) {
                    $rule->setActive($active);
                }
            }
        }
    }
}
