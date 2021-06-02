<?php

namespace Akh\Typograf\Rule;

abstract class AbstractRule
{
    public $name = 'Name rule';

    protected $char = [
        'allQuote' => '«‹»›„“‟”"\'',
        'allDash' => '-|‒|–|—',
        'charEnd' => '.,!?:;',
        'char' => 'а-яёa-z',
        'charCase' => 'а-яёa-zA-ЯЁA-Z',
        'nbsp' => '&nbsp;',
        'dash' => '&mdash;',
        'quote' => [
            'left' => ['«', '„', '‚'],
            'right' => ['»', '“', '‘']
        ],
        'month' => 'январь|февраль|март|апрель|май|июнь|июль|август|сентябрь|октябрь|ноябрь|декабрь',
        'monthShort' => 'янв|фев|мар|апр|ма[ейя]|июн|июл|авг|сен|окт|ноя|дек',
        'monthGenCase' => 'января|февраля|марта|апреля|мая|июня|июля|августа|сентября|октября|ноября|декабря',
        'monthPreCase' => 'январе|феврале|марте|апреле|мае|июне|июле|августе|сентябре|октябре|ноябре|декабре',
    ];

    protected $active = true;

    protected $sort = 500;

    protected $settings = [];

    public function setSort(int $sort)
    {
        $this->sort = $sort;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setSettings(array $settings)
    {
        $this->settings = array_merge($this->settings, $settings);
    }

    public function setSetting(string $key, $value)
    {
        $this->settings[$key] = $value;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    abstract public function handler($text);
}