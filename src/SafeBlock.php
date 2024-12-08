<?php

namespace Akh\Typograf;

class SafeBlock
{
    /**
     * @var string[][]
     */
    protected $safeBlocks = [];

    /**
     * @var string[]
     */
    protected $defaultSafeTags = [
        'head',
        'pre',
        'code',
        'script',
        'style',
    ];

    /**
     * @var string[]
     */
    protected $defaultSafeRegexp = [
        '/<!--(.+?)-->/ius',
        '/\[[a-z]([^]]+)]/ius',
        '/<span class=["\']no-typo["\']>(.+?)<\/span>/ius',
        '/https?:\/\/?([^<\'"[\s]+)/ius',
    ];

    /**
     * @var mixed[]
     */
    private $memory = [];

    public function __construct()
    {
        foreach ($this->defaultSafeTags as $tag) {
            $this->addTag($tag);
        }

        foreach ($this->defaultSafeRegexp as $regExp) {
            $this->addRegExp($regExp);
        }
    }

    public function addTag(string $tag): void
    {
        $res = [];
        $res['pattern'] = $this->getPattern(
            [
                'open' => '<' . preg_quote($tag) . '[^>]*>',
                'close' => '<\/' . preg_quote($tag) . '>',
                'tag' => $tag,
            ]
        );

        $this->addBlock($res);
    }

    public function addRegExp(string $pattern): void
    {
        $this->addBlock(
            [
                'pattern' => $pattern,
            ]
        );
    }

    public function on(string $text): string
    {
        $this->memory = [];
        $text = $this->safeBlockContent($text);

        return $this->safeTagAttr($text);
    }

    public function safeBlockContent(string $text, bool $back = false): string
    {
        $key = 'bc';
        $i = false === $back ? 1 : count($this->memory[$key] ?? []);
        $blocks = false === $back ? $this->safeBlocks : array_reverse($this->safeBlocks);

        foreach ($blocks as $block) {
            $text = preg_replace_callback(
                $block['pattern'],
                function ($matches) use (&$i, $key, $back) {
                    switch ($back) {
                        case true:
                            $safeContent = $this->unSafe($matches[1]);

                            break;

                        default:
                            $safeContent = $this->safe($key, $i, $matches[1]);
                    }

                    false === $back ? ++$i : $i--;

                    return str_replace($matches[1], $safeContent, $matches[0]);
                },
                $text
            );
        }

        return $text;
    }

    public function safeTagAttr(string $text, bool $back = false): string
    {
        $i = 1;

        return preg_replace_callback(
            '/<[^\/]([^>]+)>/ius',
            function ($matches) use (&$i, $back) {
                switch ($back) {
                    case true:
                        $safeContent = $this->unSafe($matches[1]);

                        break;

                    default:
                        $safeContent = $this->safe('tag', $i, $matches[1]);
                }

                ++$i;

                return str_replace($matches[1], $safeContent, $matches[0]);
            },
            $text
        );
    }

    public function off(string $text): string
    {
        $text = $this->safeTagAttr($text, true);

        return $this->safeBlockContent($text, true);
    }

    /**
     * @param string[] $arBlock
     */
    protected function addBlock(array $arBlock): void
    {
        $this->safeBlocks[] = $arBlock;
    }

    /**
     * @param string[] $arBlock
     */
    final protected function getPattern(array $arBlock): string
    {
        return '/' . $arBlock['open'] . '(.*?)' . $arBlock['close'] . '/ius';
    }

    private function safe(string $key, int $i, string $text): string
    {
        $this->memory[$key][$i] = $text;

        return sprintf('##%s_%s##', $key, $i);
    }

    private function unSafe(string $key): string
    {
        $key = trim($key, '#');
        if ('' === $key) {
            return '';
        }

        if (false === strpos($key, '_')) {
            return $key;
        }

        list($key, $i) = explode('_', $key, 2);

        return $this->memory[$key][$i] ?? '';
    }
}
