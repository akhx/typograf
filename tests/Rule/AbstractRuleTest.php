<?php

namespace Akh\Typograf\Tests\Rule;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class AbstractRuleTest extends TestCase
{
    public function testSetActive(): void
    {
        $stub = $this->getMockForAbstractClass('\Akh\Typograf\Rule\AbstractRule');
        foreach ([false, true] as $flag) {
            $stub->setActive($flag);
            $this->assertSame($stub->getActive(), $flag);
        }
    }

    public function testSetSort(): void
    {
        $stub = $this->getMockForAbstractClass('\Akh\Typograf\Rule\AbstractRule');
        foreach ([-100, 0, 100, 1000] as $sort) {
            $stub->setSort($sort);
            $this->assertSame($stub->getSort(), $sort);
        }
    }

    public function testSetSettings(): void
    {
        $stub = $this->getMockForAbstractClass('\Akh\Typograf\Rule\AbstractRule');
        $arTests = [
            [
                'len' => '1',
            ],
            [
                'len' => '1',
                'www' => 'www',
            ],
        ];

        $arRes = [];
        foreach ($arTests as $settings) {
            $stub->setSettings($settings);
            $arRes = $arRes + $settings;
            $this->assertSame($stub->getSettings(), $arRes);
        }
    }

    public function testSetSetting(): void
    {
        $stub = $this->getMockForAbstractClass('\Akh\Typograf\Rule\AbstractRule');
        $arTests = [
            [
                'len',
                '1',
            ],
            [
                'two',
                2,
            ],
            [
                'www',
                true,
            ],
        ];

        foreach ($arTests as $setting) {
            $stub->setSetting($setting[0], $setting[1]);
            $arSettings = $stub->getSettings();
            $this->assertSame($arSettings[$setting[0]], $setting[1]);
        }
    }
}
