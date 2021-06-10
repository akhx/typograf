<?php

namespace Akh\Typograf;

class SafeBlock
{
    protected $safeBlocks = [];

    private $defaultSafeTags = [
        'head',
        'pre',
        'code',
        'script',
        'style'
    ];

    private $defaultSafeRegexp = [
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

    public function removeAllBlock()
    {
        $this->safeBlocks = [];
    }

    public function addTag(string $tag)
    {
        $res = [
            'id' => $tag
        ];

        $res['pattern'] = $this->getPattern(
            [
                'open' => '<' . preg_quote($tag) . '[^>]*>',
                'close' => '<\/' . preg_quote($tag) . '>',
                'tag' => $tag
            ]
        );

        $this->addBlock($res);
    }

    public function addRegExp($pattern, $id = '')
    {
        $this->addBlock(
            [
                'id' => $id,
                'pattern' => $pattern
            ]
        );
    }

    private function addBlock(array $arBlock)
    {
        $this->safeBlocks[] = $arBlock;
    }

    private function getPattern(array $arBlock): string
    {
        return '/' . $arBlock['open'] . '(.*?)' . $arBlock['close'] . '/ius';
    }

    public function on($text)
    {
        $text = $this->safeBlockContent($text);
        return $this->safeTagAttr($text);
    }

    public function safeBlockContent($text, $back = false)
    {
        $blocks = $back === false ? $this->safeBlocks : array_reverse($this->safeBlocks);
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

    public function safeTagAttr($text, $back = false)
    {
        return preg_replace_callback(
            '/<\w+\s([^>]+)>/ius',
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

    protected function decrypt($text): string
    {
        return base64_decode($text);
    }

    protected function encrypt($text): string
    {
        return base64_encode($text);
    }

    public function off($text)
    {
        $text = $this->safeTagAttr($text, true);
        return $this->safeBlockContent($text, true);
    }

    public function getBlocks(): array
    {
        return $this->safeBlocks;
    }
}
