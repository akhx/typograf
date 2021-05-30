<?php

namespace akh\Typograf\Rule\Quote;

use akh\Typograf\Rule\AbstractRule;

class Quote extends AbstractRule
{
    public $name = 'Расстановка кавычек правильного вида';

    protected $sort = 300;

    protected $settings = [
        'inch' => true,
    ];

    public $maxLevel = 3;

    public function replaceQuote($text)
    {
        return preg_replace('/&quot;/iu', '"', $text);
    }

    public function handler($text)
    {
        $text = $this->replaceQuote($text);
        $beforeLeft = '\s>[(-';
        $afterRight = '\s!?.:;#*,…)\]';

        $patternLeft = '/(^|' . $this->char['nbsp'] . '|[' . $beforeLeft . '])([' . $this->char['allQuote'] . ']{1,' . $this->maxLevel . '})(?![\s]|<\/|$)/iu';
        $patternRight = '/([\S])([' . $this->char['allQuote'] . ']{1,' . $this->maxLevel . '})(?=[' . $afterRight . ']|<\/|' . $this->char['nbsp'] . '|$)/iu';

        $text = preg_replace_callback(
            $patternLeft,
            function ($matches) {
                return $matches[1] . str_repeat($this->char['quote']['left'][0], mb_strlen($matches[2]));
            },
            $text
        );

        $text = preg_replace_callback(
            $patternRight,
            function ($matches) {
                return $matches[1] . str_repeat($this->char['quote']['right'][0], mb_strlen($matches[2]));
            },
            $text
        );

        $text = $this->setInch($text);

        if (isset($this->char['quote']['left'][1]) && $this->char['quote']['left'][0] !== $this->char['quote']['left'][1]) {
            $text = $this->setInner($text);
        }

        return $text;
    }

    protected function countQuote($text): array
    {
        $count = [
            'total' => 0
        ];
        $pattern = '/[' . $this->char['allQuote'] . ']/iu';

        preg_match_all($pattern, $text, $matches);
        if (!empty($matches[0])) {
            foreach ($matches[0] as $quote) {
                if (!isset($count[$quote])) {
                    $count[$quote] = 0;
                }

                $count[$quote]++;
                $count['total']++;
            }
        }

        return $count;
    }

    protected function setInch(string $text): string
    {
        if ($this->settings['inch'] !== true) {
            return $text;
        }

        return preg_replace('/(^|[0-9])\/([0-9]+)(»)/u', '$1/$2″', $text);
    }

    protected function setInner(string $text): string
    {
        $minLevel = -1;
        $maxLevel = count($this->char['quote']['left']) - 1;
        $level = $minLevel;
        $result = '';
        $arText = preg_split('/(?<!^)(?!$)/u', $text);

        for ($i = 0; $i < count($arText); $i++) {
            $letter = $arText[$i];
            if ($letter === $this->char['quote']['left'][0]) {
                $level++;
                if ($level > $maxLevel) {
                    $level = $maxLevel;
                }

                $result .= $this->char['quote']['left'][$level];
            } elseif ($letter === $this->char['quote']['right'][0]) {
                if ($level <= $minLevel) {
                    $level = 0;
                    $result .= $this->char['quote']['right'][$level];
                } else {
                    $result .= $this->char['quote']['right'][$level];
                    $level--;
                    if ($level < $minLevel) {
                        $level = $minLevel;
                    }
                }
            } else {
                if ($letter === '"') {
                    $level = $minLevel;
                }

                $result .= $letter;
            }
        }

        $counts = $this->countQuote($result);
        $leftCount = $counts[$this->char['quote']['left'][0]] ?? null;
        $rightCount = $counts[$this->char['quote']['right'][0]] ?? null;
        return $leftCount !== $rightCount ? $text : $result;
    }
}