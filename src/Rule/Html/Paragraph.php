<?php

namespace akh\Typograf\Rule\Html;

use akh\Typograf\Rule\AbstractRule;

class Paragraph extends AbstractRule
{
    public $name = 'Добавление тега <p>';

    protected $active = false;

    protected $sort = 800;

    public function handler($text): string
    {
        $text = trim($text);
        $first = mb_strpos($text, '<p>');
        $last = mb_strrpos($text, '</p>');

        if ($first !== false && $last !== false) {
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
        } else {
            return $this->addParagraph($text);
        }
    }

    protected function addParagraph($text): string
    {
        $text = trim($text);
        return '<p>' . $text . '</p>';
    }
}