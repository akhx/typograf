<?php

namespace Akh\Typograf\Tests\Rule\Punctuation;

use Akh\Typograf\Rule\Punctuation\ExclamationQuestion;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class ExclamationQuestionTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            ['Опа!???', 'Опа!???'],
            [
                'Опа!?',
                'Опа?!',
            ],
            [
                "Опа!?\nОпа!?",
                "Опа?!\nОпа?!",
            ],
            [
                '<p>Опа!?</p>',
                '<p>Опа?!</p>',
            ],
            ['Может домой!?', 'Может домой?!'],
        ];

        foreach ($arTests as $arTest) {
            $test = (new ExclamationQuestion())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
