<?php

namespace Akh\Typograf;

class Typograf
{
    /**
     * @var Rule\AbstractRule[]
     */
    protected $rules = [];

    /**
     * @var bool
     */
    protected $debug = false;

    /**
     * @var array<array<array<int, array<string, string>>|string>|string>
     */
    protected $arDebug = [];

    /**
     * @var SafeBlock
     */
    protected $safeBlock;

    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
        $this->safeBlock = new SafeBlock();
        $this->initRules();
    }

    public function addRule(object $ruleClass): void
    {
        if (true === is_subclass_of($ruleClass, 'Akh\Typograf\Rule\AbstractRule')) {
            $this->rules[spl_object_hash($ruleClass)] = $ruleClass;
            $this->sortRule();
        }
    }

    /**
     * @param mixed $text
     */
    public function apply($text): string
    {
        $text = (string) $text;
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

    public function enableRule(string $name): void
    {
        $this->changeRule($name, true);
    }

    public function disableRule(string $name): void
    {
        $this->changeRule($name, false);
    }

    /**
     * @return Rule\AbstractRule[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    public function getSafeBlock(): SafeBlock
    {
        return $this->safeBlock;
    }

    /**
     * @return array<array<array<int, array<string, string>>|string>|string>
     */
    public function getDebugInfo(): array
    {
        return $this->arDebug;
    }

    protected function initRules(): void
    {
        $all = (new RuleFinder())->getAllRule();

        foreach ($all as $ruleClass) {
            /**
             * @var Rule\AbstractRule
             */
            $ruleObj = new $ruleClass();
            $this->rules[$ruleClass] = $ruleObj;
        }

        $this->sortRule();
    }

    protected function sortRule(): void
    {
        uasort(
            $this->rules,
            function ($a, $b) {
                return $a->getSort() <=> $b->getSort();
            }
        );
    }

    final protected function changeRule(string $name, bool $active): void
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
