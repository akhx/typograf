<?php

namespace Akh\Typograf\Tests\Rule\Punctuation;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Punctuation\ExclamationQuestion;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class ExclamationQuestionTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new ExclamationQuestion();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
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
    }
}
