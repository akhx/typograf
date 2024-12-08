<?php

namespace Akh\Typograf\Tests;

use Akh\Typograf\Debug;
use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Typograf;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class TypografTest extends TestCase
{
    public function testEnableRule(): void
    {
        $typo = new Typograf();
        $typo->enableRule('Nbsp\ReplaceNbsp');
        foreach ($typo->getRules() as $ruleName => $rule) {
            if ('Akh\Typograf\Rule\Nbsp\ReplaceNbsp' === $ruleName) {
                $this->assertSame($rule->getActive(), true);
            }
        }
    }

    public function testDisableRule(): void
    {
        $typo = new Typograf();
        $typo->disableRule('*');
        $typo->enableRule('Nbsp\ReplaceNbsp');
        foreach ($typo->getRules() as $ruleName => $rule) {
            if ('Akh\Typograf\Rule\Nbsp\ReplaceNbsp' === $ruleName) {
                $this->assertSame($rule->getActive(), true);
            } else {
                $this->assertSame($rule->getActive(), false);
            }
        }
    }

    public function testApply(): void
    {
        $arTests = [
            // ожидает включения правила телефонов
            /*[
                "+7 926 999 9999",
                "+7&thinsp;926&thinsp;999&ndash;99&ndash;99",
            ],*/
            [
                123,
                '123',
            ],
            [
                'file <code>result_modifier.php</code>',
                'file <code>result_modifier.php</code>',
            ],
            [
                '400+ м2',
                '400+&nbsp;м<sup>2</sup>',
            ],
            [
                '<h1 class="test">text</h1>',
                '<h1 class="test">text</h1>',
            ],
            [
                'Опа!??',
                'Опа?!',
            ],
            [
                'ого......',
                'ого&hellip;',
            ],
            [
                '1 и 4 литра',
                '1&nbsp;и&nbsp;4&nbsp;литра',
            ],
            [
                'В неполном предложении отсутствует один или несколько членов , значение которых понятно из контекста или из ситуации.',
                'В&nbsp;неполном предложении отсутствует один или несколько членов, значение которых понятно из&nbsp;контекста или из&nbsp;ситуации.',
            ],
            [
                'Может ли&nbsp;быть?',
                'Может&nbsp;ли быть?',
            ],
            [
                'специально для "клапана на 3/4" или 1/2" (наружная резьба)" нужно дополнительно',
                'специально для &laquo;клапана на&nbsp;3/4″ или 1/2″ (наружная резьба)&raquo; нужно дополнительно',
            ],
            [
                'Вот у вас "Мой спутник, "это "не "сочинение" это" хорошо, потому" это хорошо, потому что не выдумано."',
                'Вот у&nbsp;вас &laquo;Мой спутник, &laquo;это &laquo;не&nbsp;&laquo;сочинение&raquo; это&raquo; хорошо, потому&raquo; это хорошо, потому что не&nbsp;выдумано.&raquo;',
            ],
            [
                '««Цыганы» мои не продаются вовсе»',
                '&laquo;&bdquo;Цыганы&ldquo; мои не&nbsp;продаются вовсе&raquo;',
            ],
            [
                '"Пример"',
                '&laquo;Пример&raquo;',
            ],
            [
                'ОАО "Пример"',
                'ОАО &laquo;Пример&raquo;',
            ],
        ];
        foreach ($arTests as $arTest) {
            $typo = new Typograf();
            $test = $typo->apply($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }

    public function testApplyDocument(): void
    {
        /**
         * test HTML
         */
        $content = '
            <!DOCTYPE html>
            <html lang="ru">
            <head>
                <title>Вот это тестовая страница</title>
                <meta name="yandex-verification" content="123"/>
                <script>
                    console.log("test");
                </script>
            </head>
            <body>
                <script>
                    console.log("alert");
                </script>
                <p>text</p>
                text my text
                <span class="no-typo">"Пример"</span>
                <pre></pre>
                [gallery ids="100,101,102"]
                <p>"Пример"</p>
                <!-- hidden a text -->
                <pre data-test="asd" data-a="asd" class="" title="asd">
                    qwe
                    pre content
                    ewq
                    a a
                </pre>
                <!-- test "text" -->
                <p>"Пример"</p>
                <p>Наш адрес: Россия, г. Саратов, ул. Антонова, дом 25, кв. 72.</p>
                https://www.domain.com/path/test-05-09-2024/
                <a href="https://domain.com/path/test-05-09-2024/">https://domain.com/path/test-05-09-2024/</a>
                [embed]https://domain.com/path/test-05-09-2024/[/embed]
                <style>
                    .class {
                        color: red;
                        background: url("data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==");
                    }
                </style>
            </body>
            </html>
            ';
        $contentRes = '
            <!DOCTYPE html>
            <html lang="ru">
            <head>
                <title>Вот это тестовая страница</title>
                <meta name="yandex-verification" content="123"/>
                <script>
                    console.log("test");
                </script>
            </head>
            <body>
                <script>
                    console.log("alert");
                </script>
                <p>text</p>
                text my&nbsp;text
                <span class="no-typo">"Пример"</span>
                <pre></pre>
                [gallery ids="100,101,102"]
                <p>&laquo;Пример&raquo;</p>
                <!-- hidden a text -->
                <pre data-test="asd" data-a="asd" class="" title="asd">
                    qwe
                    pre content
                    ewq
                    a a
                </pre>
                <!-- test "text" -->
                <p>&laquo;Пример&raquo;</p>
                <p>Наш адрес: Россия, г.&nbsp;Саратов, ул.&nbsp;Антонова, дом&nbsp;25, кв.&nbsp;72.</p>
                https://www.domain.com/path/test-05-09-2024/
                <a href="https://domain.com/path/test-05-09-2024/">https://domain.com/path/test-05-09-2024/</a>
                [embed]https://domain.com/path/test-05-09-2024/[/embed]
                <style>
                    .class {
                        color: red;
                        background: url("data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==");
                    }
                </style>
            </body>
            </html>
            ';
        $typo = new Typograf();
        $typo->disableRule('Rule\Space\*');
        $test = $typo->apply($content);
        $this->assertSame($test, $contentRes);
    }

    public function testAddRule(): void
    {
        $typo = new Typograf();
        $simpleRule = new class extends AbstractRule {
            public $name = 'Замена названия сайта';
            protected $sort = -200;

            public function handler(string $text): string
            {
                return str_replace('old.ru', 'new.ru', $text);
            }
        };
        $typo->addRule($simpleRule);
        $this->assertSame($typo->apply('old.ru'), 'new.ru');
    }

    public function testDebugMode(): void
    {
        $typo = new Typograf(true);
        $typo->apply('10000');
        $this->assertInstanceOf(Debug::class, $typo->getDebug());
    }

    public function testDebugModeException(): void
    {
        $typo = new Typograf();
        $typo->apply('10000');
        $this->expectException(\Exception::class);
        $typo->getDebug();
    }

    public function testGetSafeBlock(): void
    {
        $typo = new Typograf();
        $class = get_class($typo->getSafeBlock());
        $this->assertSame($class, 'Akh\Typograf\SafeBlock');
    }
}
