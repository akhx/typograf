<?php


use akh\Typograf\Typograf;
use PHPUnit\Framework\TestCase;

class TypografTest extends TestCase
{
    public function testEnableRule()
    {
        $typo = new Typograf();
        $typo->enableRule('Nbsp\ReplaceNbsp');

        foreach ($typo->getRules() as $ruleName => $rule) {
            if ($ruleName === 'akh\Typograf\Rule\Nbsp\ReplaceNbsp') {
                $this->assertSame($rule->getActive(), true);
            }
        }
    }

    public function testDisableRule()
    {
        $typo = new Typograf();
        $typo->disableRule('*');
        $typo->enableRule('Nbsp\ReplaceNbsp');

        foreach ($typo->getRules() as $ruleName => $rule) {
            if ($ruleName === 'akh\Typograf\Rule\Nbsp\ReplaceNbsp') {
                $this->assertSame($rule->getActive(), true);
            } else {
                $this->assertSame($rule->getActive(), false);
            }
        }
    }

    public function testApply()
    {
        $arTests = [
            [
                'Опа!??',
                'Опа?!'
            ],
            [
                'ого......',
                'ого&hellip;'
            ],
            [
                '1 и 4 литра',
                '1&nbsp;и&nbsp;4&nbsp;литра'
            ],
            [
                'В неполном предложении отсутствует один или несколько членов , значение которых понятно из контекста или из ситуации.',
                'В&nbsp;неполном предложении отсутствует один или несколько членов, значение которых понятно из&nbsp;контекста или из&nbsp;ситуации.'
            ],
            [
                'Может ли&nbsp;быть?',
                'Может&nbsp;ли быть?'
            ],
            [
                'специально для "клапана на 3/4" или 1/2" (наружная резьба)" нужно дополнительно',
                'специально для «клапана на&nbsp;3/4″ или 1/2″ (наружная резьба)» нужно дополнительно'
            ],
            [
                'Вот у вас "Мой спутник, "это "не "сочинение" это" хорошо, потому" это хорошо, потому что не выдумано."',
                'Вот у&nbsp;вас «Мой спутник, «это «не&nbsp;«сочинение» это» хорошо, потому» это хорошо, потому что не&nbsp;выдумано.»'
            ],
            [
                '««Цыганы» мои не продаются вовсе»',
                '«„Цыганы“ мои не&nbsp;продаются вовсе»'
            ],
            [
                '"Пример"',
                '«Пример»'
            ],
            [
                'ОАО "Пример"',
                'ОАО «Пример»'
            ]
        ];

        foreach ($arTests as $arTest) {
            $typo = new Typograf();
            $test = $typo->apply($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }

    public function testApplyDocument()
    {
        /**
         * test HTML
         */
        $content = '
            <!DOCTYPE html>
            <html lang="ru">
            <head>
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
                <style>
                    .class {
                        color: red;
                        background: url("");
                    }
                </style>
            </body>
            </html>
            ';
        $contentRes = '
            <!DOCTYPE html>
            <html lang="ru">
            <head>
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
                <p>«Пример»</p>
                <!-- hidden a text -->
                <pre data-test="asd" data-a="asd" class="" title="asd">
                    qwe
                    pre content
                    ewq
                    a a
                </pre>
                <!-- test "text" -->
                <p>«Пример»</p>
                <style>
                    .class {
                        color: red;
                        background: url("");
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

    public function testGetSafeBlock()
    {
        $typo = new Typograf();
        $class = get_class($typo->getSafeBlock());
        $this->assertSame($class, 'akh\Typograf\SafeBlock');
    }
}
