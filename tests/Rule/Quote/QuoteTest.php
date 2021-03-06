<?php

namespace Akh\Typograf\Tests\Rule\Quote;

use Akh\Typograf\Rule\Quote\Quote;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class QuoteTest extends TestCase
{
    public function toDo(): void
    {
        $arTests = [
            [
                "<p>\"Я всегда с гордостью носил военную форму...</p>\n\n<p>...Я переживал очень тяжёлую депрессию. \"</p>",
                "<p>«Я всегда с гордостью носил военную форму...</p>\n\n<p>...Я переживал очень тяжёлую депрессию. »</p>",
            ],
            [
                '“ слово слово “слово” слово”',
                '" слово слово «слово» слово"',
            ],
        ];
    }

    public function testInchDisabled(): void
    {
        $arTests = [
            [
                'специально для "клапана на 3/4" или 1/2" (наружная резьба)" нужно дополнительно',
                'специально для «клапана на 3/4» или 1/2» (наружная резьба)» нужно дополнительно',
            ],
        ];

        foreach ($arTests as $arTest) {
            $rule = new Quote();
            $rule->setSetting('inch', false);
            $test = $rule->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }

    public function testHandler(): void
    {
        $arTests = [
            [
                'специально для "клапана на 3/4" или 1/2" (наружная резьба)" нужно дополнительно',
                'специально для «клапана на 3/4″ или 1/2″ (наружная резьба)» нужно дополнительно',
            ],
            [
                'Вот у вас "Мой спутник, "это "не "сочинение" это" хорошо, потому" это хорошо, потому что не выдумано."',
                'Вот у вас «Мой спутник, «это «не «сочинение» это» хорошо, потому» это хорошо, потому что не выдумано.»',
            ],
            [
                'Вот у вас "Мой спутник" – это не сочинение, это хорошо, потому что не выдумано.',
                'Вот у вас «Мой спутник» – это не сочинение, это хорошо, потому что не выдумано.',
            ],
            [
                '««Цыганы» мои не продаются вовсе»',
                '«„Цыганы“ мои не продаются вовсе»',
            ],
            [
                '"Пример"',
                '«Пример»',
            ],
            [
                "\"Пример\"\n\"Пример\"",
                "«Пример»\n«Пример»",
            ],
            [
                '<p>"Пример"</p>',
                '<p>«Пример»</p>',
            ],
            [
                'ОАО "Пример"',
                'ОАО «Пример»',
            ],
            [
                'В "самом "добром" кино" Мамы. В "самом "добром" кино" Мамы',
                'В «самом „добром“ кино» Мамы. В «самом „добром“ кино» Мамы',
            ],
            [
                'В самом добром кино “Мамы”, в молодежном триллере “Закрытая школа” на СТС. А еще на сцене театра им. Вл. Маяковского в спектакле “Не все коту масленица”.',
                'В самом добром кино «Мамы», в молодежном триллере «Закрытая школа» на СТС. А еще на сцене театра им. Вл. Маяковского в спектакле «Не все коту масленица».',
            ],
            [
                'В самом добром кино “Мамы”, в молодежном триллере “Закрытая школа” на СТС',
                'В самом добром кино «Мамы», в молодежном триллере «Закрытая школа» на СТС',
            ],
            [
                'В самом добром кино “Мамы, в молодежном триллере “Закрытая школа” на СТС"',
                'В самом добром кино «Мамы, в молодежном триллере „Закрытая школа“ на СТС»',
            ],
            [
                "<p>\"Я всегда с гордостью носил военную форму...</p>\n\n<p>...Я переживал очень тяжёлую депрессию.\"</p>",
                "<p>«Я всегда с гордостью носил военную форму...</p>\n\n<p>...Я переживал очень тяжёлую депрессию.»</p>",
            ],
            [
                'Печорин писал: "Я не помню утра более голубого и свежего!"',
                'Печорин писал: «Я не помню утра более голубого и свежего!»',
            ],
            [
                'Печорин признавался: "Я иногда себя презираю..."',
                'Печорин признавался: «Я иногда себя презираю...»',
            ],
            [
                'Печорин спрашивает: "И зачем было судьбе кинуть меня в мирный круг честных контрабандистов?"',
                'Печорин спрашивает: «И зачем было судьбе кинуть меня в мирный круг честных контрабандистов?»',
            ],
            [
                'Печорин размышляет: "…зачем было судьбе кинуть меня в мирный круг честных контрабандистов? Как камень, брошенный в гладкий источник, я встревожил их спокойствие..."',
                'Печорин размышляет: «…зачем было судьбе кинуть меня в мирный круг честных контрабандистов? Как камень, брошенный в гладкий источник, я встревожил их спокойствие...»',
            ],
            [
                'Печорин размышляет: "…зачем было судьбе кинуть меня в мирный круг честных контрабандистов? Как камень, брошенный в гладкий источник, я встревожил их спокойствие…"',
                'Печорин размышляет: «…зачем было судьбе кинуть меня в мирный круг честных контрабандистов? Как камень, брошенный в гладкий источник, я встревожил их спокойствие…»',
            ],
            [
                "Печорин размышляет: \"…зачем было судьбе кинуть меня в мирный круг честных контрабандистов? Как камень, брошенный в гладкий источник, я встревожил их спокойствие…\"\n\n",
                "Печорин размышляет: «…зачем было судьбе кинуть меня в мирный круг честных контрабандистов? Как камень, брошенный в гладкий источник, я встревожил их спокойствие…»\n\n",
            ],
            [
                "Печорин размышляет: \"…зачем было судьбе кинуть меня в мирный круг честных контрабандистов? Как камень, брошенный в гладкий источник, я встревожил их спокойствие…\"\n\nПечорин...",
                "Печорин размышляет: «…зачем было судьбе кинуть меня в мирный круг честных контрабандистов? Как камень, брошенный в гладкий источник, я встревожил их спокойствие…»\n\nПечорин...",
            ],
            [
                'Лермонтов восклицает в предисловии, что это "старая и жалкая шутка!"',
                'Лермонтов восклицает в предисловии, что это «старая и жалкая шутка!»',
            ],
            [
                '"Лермонтов восклицает в "предисловии", что это "старая и жалкая шутка!""',
                '«Лермонтов восклицает в „предисловии“, что это „старая и жалкая шутка!“»',
            ],
            [
                '"Лермонтов восклицает в "предисловии", что это "старая и жалкая шутка!"" "Лермонтов восклицает в "предисловии", что это "старая и жалкая шутка!""',
                '«Лермонтов восклицает в „предисловии“, что это „старая и жалкая шутка!“» «Лермонтов восклицает в „предисловии“, что это „старая и жалкая шутка!“»',
            ],
            [
                '"Лермонтов восклицает в предисловии, что это "старая и жалкая шутка!"" "Лермонтов восклицает в предисловии, что это "старая и жалкая шутка!""',
                '«Лермонтов восклицает в предисловии, что это „старая и жалкая шутка!“» «Лермонтов восклицает в предисловии, что это „старая и жалкая шутка!“»',
            ],
            [
                '"Лермонтов восклицает в предисловии, что это "старая и жалкая шутка!"" "Лермонтов восклицает в предисловии, что это "старая и жалкая шутка!"" "Лермонтов восклицает в предисловии, что это "старая и жалкая шутка!""',
                '«Лермонтов восклицает в предисловии, что это „старая и жалкая шутка!“» «Лермонтов восклицает в предисловии, что это „старая и жалкая шутка!“» «Лермонтов восклицает в предисловии, что это „старая и жалкая шутка!“»',
            ],
            [
                '<p>"Энергия соблазна: "от внутреннего" к внешнему".</p>        <p>"Энергия соблазна: "от внутреннего" к внешнему".</p>',
                '<p>«Энергия соблазна: „от внутреннего“ к внешнему».</p>        <p>«Энергия соблазна: „от внутреннего“ к внешнему».</p>',
            ],
            [
                "<p>\"Энергия\nсоблазна: \"от\nвнутреннего\" к\nвнешнему\".</p>        <p>\"Энергия\nсоблазна: \"от\nвнутреннего\" к\nвнешнему\".</p>",
                "<p>«Энергия\nсоблазна: „от\nвнутреннего“ к\nвнешнему».</p>        <p>«Энергия\nсоблазна: „от\nвнутреннего“ к\nвнешнему».</p>",
            ],
            [
                "\"Полотенцесушители из нержавеющей стали\"\n\nПолотенцесушитель из черного металла, сделанные из нержавеющей стали, очень хорошо подходят к использованию в наших условиях. Снаружи они могут иметь полированную, матовую, или даже окрашенную поверхность. Модели с окрашенной поверхностью обычно стоят меньше других. Еще один плюс окрашенных полотенцесушителей — возможность разместить их в любом интерьере благодаря широкой цветовой гамме.",
                "«Полотенцесушители из нержавеющей стали»\n\nПолотенцесушитель из черного металла, сделанные из нержавеющей стали, очень хорошо подходят к использованию в наших условиях. Снаружи они могут иметь полированную, матовую, или даже окрашенную поверхность. Модели с окрашенной поверхностью обычно стоят меньше других. Еще один плюс окрашенных полотенцесушителей — возможность разместить их в любом интерьере благодаря широкой цветовой гамме.",
            ],
            [
                '<i>"Энергия соблазна".</i>',
                '<i>«Энергия соблазна».</i>',
            ],
            [
                '<i>"Энергия соблазна".</i> <i>"Энергия соблазна".</i>',
                '<i>«Энергия соблазна».</i> <i>«Энергия соблазна».</i>',
            ],
            [
                '"<i>Энергия соблазна</i>".',
                '«<i>Энергия соблазна</i>».',
            ],
            [
                '"<i>Энергия соблазна</i>". "<i>Энергия соблазна</i>".',
                '«<i>Энергия соблазна</i>». «<i>Энергия соблазна</i>».',
            ],
            [
                '"<i>Энергия соблазна"</i>.',
                '«<i>Энергия соблазна»</i>.',
            ],
            [
                '"<i>Энергия соблазна"</i>. "<i>Энергия соблазна"</i>.',
                '«<i>Энергия соблазна»</i>. «<i>Энергия соблазна»</i>.',
            ],
            [
                '"<i>Екатеринбург лучше Стамбула, однозначно, а&nbsp;люди здесь добрее, чем в&nbsp;Москве и&nbsp;Питере"</i>, &nbsp;- рассказывает он&nbsp;со&nbsp;знанием дела: во&nbsp;время подготовки книги об&nbsp;уральской столице Аслиддин прожил по&nbsp;две недели и&nbsp;в&nbsp;Белокаменной, и&nbsp;в&nbsp;Северной Пальмире. &nbsp;"<i>Все оплачивают спонсоры&nbsp;-; бизнесмены из&nbsp;Таджикистана, которые заинтересовались моими работами. Они-то и&nbsp;договаривались с&nbsp;издательством"</i>, &nbsp;-; объясняет&nbsp;строитель-историк.&nbsp;Из&nbsp;пятисот отпечатанных экземпляров автору достанется 15. Все остальные пойдут на&nbsp;магазинные прилавки и&nbsp;в&nbsp;Центральную библиотеку Таджикистана, а&nbsp;также самим спонсорам. Размеры гонорара, который дойдет до&nbsp;Аслиддина, не&nbsp;позволят уволиться со&nbsp;стройки. &nbsp;<i>"Да я&nbsp;рад уже тому, что мои книги свет увидели, их&nbsp;читают, отзывы делают", &nbsp;</i>- рассказывает писатель.',
                '«<i>Екатеринбург лучше Стамбула, однозначно, а&nbsp;люди здесь добрее, чем в&nbsp;Москве и&nbsp;Питере»</i>, &nbsp;- рассказывает он&nbsp;со&nbsp;знанием дела: во&nbsp;время подготовки книги об&nbsp;уральской столице Аслиддин прожил по&nbsp;две недели и&nbsp;в&nbsp;Белокаменной, и&nbsp;в&nbsp;Северной Пальмире. &nbsp;«<i>Все оплачивают спонсоры&nbsp;-; бизнесмены из&nbsp;Таджикистана, которые заинтересовались моими работами. Они-то и&nbsp;договаривались с&nbsp;издательством»</i>, &nbsp;-; объясняет&nbsp;строитель-историк.&nbsp;Из&nbsp;пятисот отпечатанных экземпляров автору достанется 15. Все остальные пойдут на&nbsp;магазинные прилавки и&nbsp;в&nbsp;Центральную библиотеку Таджикистана, а&nbsp;также самим спонсорам. Размеры гонорара, который дойдет до&nbsp;Аслиддина, не&nbsp;позволят уволиться со&nbsp;стройки. &nbsp;<i>«Да я&nbsp;рад уже тому, что мои книги свет увидели, их&nbsp;читают, отзывы делают», &nbsp;</i>- рассказывает писатель.',
            ],
            [
                '"',
                '"',
            ],
            [
                '"Газета',
                '«Газета',
            ],
            [
                '" Газета',
                '" Газета',
            ],
            [
                '"Иннопром". "Иннопром". "Синий "мужчина" знак".',
                '«Иннопром». «Иннопром». «Синий „мужчина“ знак».',
            ],
            [
                'М. М. Бахтин писал: "Тришатов рассказывает подростку о своей любви к музыке и развивает перед ним замысел оперы: "Послушайте, любите вы музыку? Я ужасно люблю... Если бы я сочинял оперу, то, знаете, я бы взял сюжет из "Фауста". Я очень люблю эту тему"".',
                'М. М. Бахтин писал: «Тришатов рассказывает подростку о своей любви к музыке и развивает перед ним замысел оперы: „Послушайте, любите вы музыку? Я ужасно люблю... Если бы я сочинял оперу, то, знаете, я бы взял сюжет из ‚Фауста‘. Я очень люблю эту тему“».',
            ],
            [
                'по произведению Достоевского &quot;Преступление и наказание&quot;в театре Моссовета',
                'по произведению Достоевского «Преступление и наказание"в театре Моссовета',
            ],
            [
                'Из всей нашей культурной программы самое сильное впечатление на меня произвела постановка &quot;Р.Р.Р.&quot; по произведению Достоевского &quot;Преступление и наказание&quot;в театре Моссовета.' .
                "Она буквально влюбила меня в театр.\n&quot;Мы напихиваем в детей ненужное барахло&quot;. 5 радикальных тезисов Германа Грефа об образовании",

                'Из всей нашей культурной программы самое сильное впечатление на меня произвела постановка «Р.Р.Р.» по произведению Достоевского «Преступление и наказание"в театре Моссовета.' .
                "Она буквально влюбила меня в театр.\n«Мы напихиваем в детей ненужное барахло». 5 радикальных тезисов Германа Грефа об образовании",
            ],
            [
                'Из всей нашей культурной программы самое сильное впечатление на меня произвела постановка &quot;Р.Р.Р.&quot; по произведению Достоевского &quot;Преступление и наказание&quot;в театре Моссовета.' .
                "Она буквально влюбила меня в театр.\n&quot;Мы напихиваем в детей ненужное барахло&quot;. 5 радикальных тезисов Германа Грефа об образовании\n" .
                'Из всей нашей культурной программы самое сильное впечатление на меня произвела постановка &quot;Р.Р.Р.&quot; по произведению Достоевского &quot;Преступление и наказание&quot;в театре Моссовета.' .
                "Она буквально влюбила меня в театр.\n&quot;Мы напихиваем в детей ненужное барахло&quot;. 5 радикальных тезисов Германа Грефа об образовании",

                'Из всей нашей культурной программы самое сильное впечатление на меня произвела постановка «Р.Р.Р.» по произведению Достоевского «Преступление и наказание"в театре Моссовета.' .
                "Она буквально влюбила меня в театр.\n«Мы напихиваем в детей ненужное барахло». 5 радикальных тезисов Германа Грефа об образовании\n" .
                'Из всей нашей культурной программы самое сильное впечатление на меня произвела постановка «Р.Р.Р.» по произведению Достоевского «Преступление и наказание"в театре Моссовета.' .
                "Она буквально влюбила меня в театр.\n«Мы напихиваем в детей ненужное барахло». 5 радикальных тезисов Германа Грефа об образовании",
            ],
            [
                '<p>«Куда ты ведёшь нас?.. не видно ни зги! —</p>',
                '<p>«Куда ты ведёшь нас?.. не видно ни зги! —</p>',
            ],
            [
                '“слово слово “слово” слово”',
                '«слово слово „слово“ слово»',
            ],
            [
                'Движение перекроют из‑за матча на«ВЭБ Арене» 7 октября в Москве‍',
                'Движение перекроют из‑за матча на«ВЭБ Арене» 7 октября в Москве‍',
            ],
            [
                '["история наоборот"]',
                '[«история наоборот»]',
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new Quote())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
