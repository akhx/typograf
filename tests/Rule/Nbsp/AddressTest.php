<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Nbsp\Address;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class AddressTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Address();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'г. Москва, ул. Тверская, д.  12',
                'г.&nbsp;Москва, ул.&nbsp;Тверская, д.&nbsp;12',
            ],
            [
                'Магазин "Авто": ул. Набережная, д. 10, эт. -1, оф. 22',
                'Магазин "Авто": ул.&nbsp;Набережная, д.&nbsp;10, эт.&nbsp;-1, оф.&nbsp;22',
            ],
            [
                'К примеру, ваш адрес: Россия, г.&nbsp;Саратов, ул.&nbsp;Антонова, дом&nbsp;25, кв.&nbsp;72.',
                'К примеру, ваш адрес: Россия, г.&nbsp;Саратов, ул.&nbsp;Антонова, дом&nbsp;25, кв.&nbsp;72.',
            ],
            [
                'Адрес: 119021, Москва, ул. Льва Толстого, 16',
                'Адрес: 119021, Москва, ул.&nbsp;Льва Толстого, 16',
            ],
            [
                'Санкт-Петербург, Пискаревский проспект, дом 2, корпус 2, БЦ «Бенуа».',
                'Санкт-Петербург, Пискаревский проспект, дом&nbsp;2, корпус&nbsp;2, БЦ «Бенуа».',
            ],
            [
                'Адрес: 119021, Саратов, ул. М. Попова 20-21, бизнес-центр «Верный», подъезд B2, этаж 6',
                'Адрес: 119021, Саратов, ул.&nbsp;М. Попова 20-21, бизнес-центр «Верный», подъезд B2, этаж&nbsp;6',
            ],
            [
                '220036, Минск, пр. Дзержинского 5, оф. 318 (БЦ Rubin Plaza).',
                '220036, Минск, пр.&nbsp;Дзержинского 5, оф.&nbsp;318 (БЦ Rubin Plaza).',
            ],
            [
                'г. Пущино, д. 34, мкр. «В»',
                'г.&nbsp;Пущино, д.&nbsp;34, мкр.&nbsp;«В»',
            ],
        ];
    }
}
