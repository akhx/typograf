<?php

namespace Akh\Typograf\Rule;

abstract class AbstractRule
{
    /**
     * @var string
     */
    public $name = 'Name rule';

    /**
     * @var mixed[]
     */
    protected $char = [
        'allQuote' => '«‹»›„“‟”"\'',
        'allDash' => '-|‒|–|—',
        'charEnd' => '.,!?:;',
        'char' => 'а-яёa-z',
        'charCase' => 'а-яёa-zA-ЯЁA-Z',
        'nbsp' => '&nbsp;',
        'dash' => '&mdash;',
        'month' => 'январь|февраль|март|апрель|май|июнь|июль|август|сентябрь|октябрь|ноябрь|декабрь',
        'monthShort' => 'янв|фев|мар|апр|ма[ейя]|июн|июл|авг|сен|окт|ноя|дек',
        'monthGenCase' => 'января|февраля|марта|апреля|мая|июня|июля|августа|сентября|октября|ноября|декабря',
        'monthPreCase' => 'январе|феврале|марте|апреле|мае|июне|июле|августе|сентябре|октябре|ноябре|декабре',
    ];

    /**
     * @var bool
     */
    protected $active = true;

    /**
     * @var int
     */
    protected $sort = 500;

    /**
     * @var mixed[]
     */
    protected $settings = [];

    public function setSort(int $sort): void
    {
        $this->sort = $sort;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * @param mixed[] $settings
     */
    public function setSettings(array $settings): void
    {
        $this->settings = array_merge($this->settings, $settings);
    }

    /**
     * @param mixed $value
     */
    public function setSetting(string $key, $value): void
    {
        $this->settings[$key] = $value;
    }

    /**
     * @return mixed[]
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    abstract public function handler(string $text): string;
}
