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
        '/<span class=["\']no-typo["\']>(.+?)<\/span>/ius',
    ];

    public function __construct()
    {
        foreach ($this->defaultSafeTags as $tag) {
            $this->addTag($tag);
        }

        foreach ($this->defaultSafeRegexp as $regExp) {
            $this->addRegExp($regExp);
        }
    }

    public function removeAllBlock(): void
    {
        $this->safeBlocks = [];
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
        $text = $this->safeBlockContent($text);

        return $this->safeTagAttr($text);
    }

    public function safeBlockContent(string $text, bool $back = false): string
    {
        $blocks = false === $back ? $this->safeBlocks : array_reverse($this->safeBlocks);
        foreach ($blocks as $block) {
            $text = preg_replace_callback(
                $block['pattern'],
                function ($matches) use ($back) {
                    switch ($back) {
                        case true:
                            $safeContent = $this->decrypt($matches[1]);

                            break;

                        default:
                            $safeContent = $this->encrypt($matches[1]);
                    }

                    return str_replace($matches[1], $safeContent, $matches[0]);
                },
                $text
            );
        }

        return $text;
    }

    public function safeTagAttr(string $text, bool $back = false): string
    {
        return preg_replace_callback(
            '/<[^\/]([^>]+)>/ius',
            function ($matches) use ($back) {
                switch ($back) {
                    case true:
                        $safeContent = $this->decrypt($matches[1]);

                        break;

                    default:
                        $safeContent = $this->encrypt($matches[1]);
                }

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
     * @return string[][]
     */
    public function getBlocks(): array
    {
        return $this->safeBlocks;
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

    protected function decrypt(string $text): string
    {
        if (base64_encode((string) base64_decode($text, true)) === $text) {
            return base64_decode($text);
        }

        return $text;
    }

    protected function encrypt(string $text): string
    {
        return base64_encode($text);
    }
}
