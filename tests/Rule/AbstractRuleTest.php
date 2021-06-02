<?php

namespace Rule;

use Akh\Typograf\Rule\AbstractRule;
use PHPUnit\Framework\TestCase;

class AbstractRuleTest extends TestCase
{
    public function testSetActive()
    {
        $stub = $this->getMockForAbstractClass('\Akh\Typograf\Rule\AbstractRule');
        foreach ([false, true] as $flag) {
            $stub->setActive($flag);
            $this->assertSame($stub->getActive(), $flag);
        }
    }

    public function testSetSort()
    {
        $stub = $this->getMockForAbstractClass('\Akh\Typograf\Rule\AbstractRule');
        foreach ([-100, 0, 100, 1000] as $sort) {
            $stub->setSort($sort);
            $this->assertSame($stub->getSort(), $sort);
        }
    }

    public function testSetSettings()
    {
        $stub = $this->getMockForAbstractClass('\Akh\Typograf\Rule\AbstractRule');
        $arTests = [
            [
                'len' => '1',
            ],
            [
                'len' => '1',
                'www' => 'www',
            ]
        ];

        $arRes = [];
        foreach ($arTests as $settings) {
            $stub->setSettings($settings);
            $arRes = $arRes + $settings;
            $this->assertSame($stub->getSettings(), $arRes);
        }
    }

    public function testSetSetting()
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
            ]
        ];

        $arRes = [];
        foreach ($arTests as $setting) {
            $stub->setSetting($setting[0], $setting[1]);
            $arSettings = $stub->getSettings();
            $this->assertSame($arSettings[$setting[0]], $setting[1]);
        }
    }
}
