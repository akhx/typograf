<?php

namespace Akh\Typograf\Rule\Html;

use Akh\Typograf\Rule\AbstractRule;

class Paragraph extends AbstractRule
{
    public $name = 'Добавление тега <p>';

    protected $active = false;

    protected $sort = 800;

    public function handler(string $text): string
    {
        $text = trim($text);
        $first = mb_strpos($text, '<p>');
        $last = mb_strrpos($text, '</p>');

        if (false !== $first && false !== $last) {
            $newText = '';
            $start = trim(mb_substr($text, 0, $first));

            if (!empty($start)) {
                $newText .= $this->addParagraph($start);
            }

            $middle = mb_substr($text, $first + mb_strlen('<p>'), $last - ($first + mb_strlen('<p>')));
            $newText .= '<p>' . $middle . '</p>';

            $end = trim(mb_substr($text, $last + mb_strlen('</p>')));

            if (!empty($end)) {
                $newText .= $this->addParagraph($end);
            }

            return $newText;
        }

        return $this->addParagraph($text);
    }

    protected function addParagraph(string $text): string
    {
        $text = trim($text);

        return '<p>' . $text . '</p>';
    }
}
