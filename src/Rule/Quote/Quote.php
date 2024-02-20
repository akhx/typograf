<?php

namespace Akh\Typograf\Rule\Quote;

use Akh\Typograf\Rule\AbstractRule;

class Quote extends AbstractRule
{
    public $name = 'Расстановка кавычек правильного вида';

    /**
     * @var int
     */
    public $maxLevel = 3;

    protected $sort = 300;

    protected $settings = [
        'inch' => true,
        'quote' => [
            'left' => ['«', '„', '‚'],
            'right' => ['»', '“', '‘'],
        ],
        'replace' => [
            '&quot;' => '"',
            '&laquo;' => '«',
            '&raquo;' => '»',
            '&lsaquo;' => '‹',
            '&rsaquo;' => '›',
            '&bdquo;' => '„',
            '&ldquo;' => '“',
            '&#8223;' => '‟',
            '&rdquo;' => '”',
            '&apos;' => '\'',
        ],
    ];

    public function replaceQuote(string $text, bool $back = false): string
    {
        $data = $back ? array_flip($this->settings['replace']) : $this->settings['replace'];

        foreach ($data as $uni => $html) {
            $text = preg_replace('/' . $uni . '/iu', $html, $text);
        }

        return $text;
    }

    public function handler(string $text): string
    {
        $text = $this->replaceQuote($text);
        $beforeLeft = '\s>[(-';
        $afterRight = '\s!?.:;#*,…)\]';

        $patternLeft = '/(^|' . $this->char['nbsp'] . '|[' . $beforeLeft . '])([' . $this->char['allQuote'] . ']{1,' . $this->maxLevel . '})(?![\s]|<\/|$)/iu';
        $patternRight = '/([\S])([' . $this->char['allQuote'] . ']{1,' . $this->maxLevel . '})(?=[' . $afterRight . ']|<\/|' . $this->char['nbsp'] . '|$)/iu';

        $text = preg_replace_callback(
            $patternLeft,
            function ($matches) {
                return $matches[1] . str_repeat($this->settings['quote']['left'][0], mb_strlen($matches[2]));
            },
            $text
        );

        $text = preg_replace_callback(
            $patternRight,
            function ($matches) {
                return $matches[1] . str_repeat($this->settings['quote']['right'][0], mb_strlen($matches[2]));
            },
            $text
        );

        $text = $this->setInch($text);

        if (isset($this->settings['quote']['left'][1]) && $this->settings['quote']['left'][0] !== $this->settings['quote']['left'][1]) {
            $text = $this->setInner($text);
        }

        return $this->replaceQuote($text, true);
    }

    /**
     * @return int[]
     */
    protected function countQuote(string $text): array
    {
        $count = [
            'total' => 0,
        ];
        $pattern = '/[' . $this->char['allQuote'] . ']/iu';

        preg_match_all($pattern, $text, $matches);
        if (!empty($matches[0])) {
            foreach ($matches[0] as $quote) {
                if (!isset($count[$quote])) {
                    $count[$quote] = 0;
                }

                ++$count[$quote];
                ++$count['total'];
            }
        }

        return $count;
    }

    protected function setInch(string $text): string
    {
        if (true !== $this->settings['inch']) {
            return $text;
        }

        return preg_replace('/(^|[0-9])([\/,.])([0-9]+)(»)/u', '$1$2$3″', $text);
    }

    protected function setInner(string $text): string
    {
        $minLevel = -1;
        $maxLevel = count($this->settings['quote']['left']) - 1;
        $level = $minLevel;
        $result = '';
        $arText = mb_str_split($text);

        for ($i = 0; $i < count($arText); ++$i) {
            $letter = $arText[$i];
            if ($letter === $this->settings['quote']['left'][0]) {
                ++$level;
                if ($level > $maxLevel) {
                    $level = $maxLevel;
                }

                $result .= $this->settings['quote']['left'][$level];
            } elseif ($letter === $this->settings['quote']['right'][0]) {
                if ($level <= $minLevel) {
                    $level = 0;
                    $result .= $this->settings['quote']['right'][$level];
                } else {
                    $result .= $this->settings['quote']['right'][$level];
                    --$level;
                }
            } else {
                if ('"' === $letter) {
                    $level = $minLevel;
                }

                $result .= $letter;
            }
        }

        $counts = $this->countQuote($result);
        $leftCount = $counts[$this->settings['quote']['left'][0]] ?? null;
        $rightCount = $counts[$this->settings['quote']['right'][0]] ?? null;

        return $leftCount !== $rightCount ? $text : $result;
    }
}
