## Nbsp
| Класс | Название | Сортировка | Активность | Параметры |
| --- | --- | -- | --- | --- |
| [Nbsp\ReplaceNbsp](../src/Rule/Nbsp/ReplaceNbsp.php) | Замена неразрывного пробела на&nbsp;обычный перед типографированием | -100 | выкл | &nbsp; |
| [Nbsp\AfterNumber](../src/Rule/Nbsp/AfterNumber.php) | Неразрывной пробел, после чисел | 500 | вкл | maxLen = 5 |
| [Nbsp\AfterShortWord](../src/Rule/Nbsp/AfterShortWord.php) | Неразрывной пробел, после короткого слова | 500 | вкл | len = 2 |
| [Nbsp\BeforeShortLastWord](../src/Rule/Nbsp/BeforeShortLastWord.php) | Неразрывной пробел перед последним коротким словом в&nbsp;предложении | 500 | вкл | len = 3 |
| [Nbsp\DayMonth](../src/Rule/Nbsp/DayMonth.php) | Нераз. пробел между числом и&nbsp;месяцем | 500 | вкл | &nbsp; |
| [Nbsp\BeforeParticle](../src/Rule/Nbsp/BeforeParticle.php) | Нераз. пробел перед «ли», «ль», «же», «бы», «б» | 510 | вкл | &nbsp; |
| [Nbsp\Initials](../src/Rule/Nbsp/Initials.php) | Неразрывной пробел инициалов и&nbsp;фамилии | 500 | вкл | &nbsp; |
| [Nbsp\Address](../src/Rule/Nbsp/Address.php) | Неразрывной пробел, а&nbsp;адресах г.&nbsp;ул.&nbsp;кв. | 450 | вкл | &nbsp; |
## Dash
| Класс | Название | Сортировка | Активность | Параметры |
| --- | --- | --- | --- | --- |
| [Dash\ReplaceDash](../src/Rule/Dash/ReplaceDash.php) | Замена дефиса на&nbsp;тире + исправление дублей, перед типографированием | -100 | вкл | len = 2 |
| [Dash\ToLiboNebud](../src/Rule/Dash/ToLiboNebud.php) | Дефис перед «то», «либо», «нибудь» | 300 | вкл | &nbsp; |
| [Dash\IzZaPod](../src/Rule/Dash/IzZaPod.php) | Расстановка дефисов между из-за, из-под | 500 | вкл | &nbsp; |
| [Dash\KaKas](../src/Rule/Dash/KaKas.php) | Расстановка дефисов с&nbsp;частицами-ка, кась | 500 | вкл | &nbsp; |
## Space
| Класс | Название | Сортировка | Активность | Параметры |
| --- | --- | --- | --- | --- |
| [Space\DelBeforeLine](../src/Rule/Space/DelBeforeLine.php) | Удаление пробелов в&nbsp;начале строки | -100 | вкл | &nbsp; |
| [Space\DelRepeatSpace](../src/Rule/Space/DelRepeatSpace.php) | Удаление повторяющихся пробелов | -100 | вкл | &nbsp; |
| [Space\DelRepeatN](../src/Rule/Space/DelRepeatN.php) | Удаление повторяющихся переносов строки | -100 | вкл | &nbsp; |
| [Space\DelBeforePercent](../src/Rule/Space/DelBeforePercent.php) | Удаление пробела перед знаками процентов | 300 | вкл | &nbsp; |
| [Space\AfterDot](../src/Rule/Space/AfterDot.php) | Забытый пробел после точки | 300 | вкл | &nbsp; |
| [Space\AfterPunctuation](../src/Rule/Space/AfterPunctuation.php) | Пробел после знаков пунктуации, кроме точки | 300 | вкл | &nbsp; |
| [Space\DelBeforePunctuation](../src/Rule/Space/DelBeforePunctuation.php) | Удаление пробела перед знаками препинания | 300 | вкл | &nbsp; |
| [Space\Year](../src/Rule/Space/Year.php) | Пробел между числом и&nbsp;словом&nbsp;год | 500 | вкл | &nbsp; |
| [Space\Bracket](../src/Rule/Space/Bracket.php) | Удаление лишних пробелов после открывающей и&nbsp;перед закрывающей скобкой | 500 | вкл | &nbsp; |
| [Space\BeforeBracket](../src/Rule/Space/BeforeBracket.php) | Пробел перед открывающей скобкой | 500 | вкл | &nbsp; |
| [Space\AfterHellip](../src/Rule/Space/AfterHellip.php) | Пробел после знаков троеточий и&nbsp;троеточий с&nbsp;вопросительным или восклицательными знаками | 800 | вкл | &nbsp; |
## Quote
| Класс | Название | Сортировка | Активность | Параметры |
| --- | --- | --- | --- | --- |
| [Quote\Quote](../src/Rule/Quote/Quote.php) | Расстановка кавычек правильного вида | 300 | вкл | inch = 1 |
| [Quote\QuoteLink](../src/Rule/Quote/QuoteLink.php) | Кавычки вне тэга <a> | 500 | вкл | &nbsp; |
## Punctuation
| Класс | Название | Сортировка | Активность | Параметры |
| --- | --- | --- | --- | --- |
| [Punctuation\ANo](../src/Rule/Punctuation/ANo.php) | Расстановка запятых перед а, но | 300 | вкл | &nbsp; |
| [Punctuation\DelDouble](../src/Rule/Punctuation/DelDouble.php) | Лишние знаки припинания | 500 | вкл | maxLenMark = 3 |
| [Punctuation\Apostrophe](../src/Rule/Punctuation/Apostrophe.php) | Расстановка правильного апострофа в&nbsp;текстах | 500 | вкл | &nbsp; |
| [Punctuation\ExclamationQuestion](../src/Rule/Punctuation/ExclamationQuestion.php) | Замена восклицательного и&nbsp;вопросительного знаков местами | 800 | вкл | &nbsp; |
| [Punctuation\Hellip](../src/Rule/Punctuation/Hellip.php) | Замена трёх точек на&nbsp;многоточие | 800 | вкл | &nbsp; |
## Symbol
| Класс | Название | Сортировка | Активность | Параметры |
| --- | --- | --- | --- | --- |
| [Symbol\Arrow](../src/Rule/Symbol/Arrow.php) | Стрелочки разные &rarr; → →, &larr; → ← | 500 | вкл | &nbsp; |
| [Symbol\Copy](../src/Rule/Symbol/Copy.php) | Копирайт ©, торговая марка ™,® | 500 | вкл | &nbsp; |
| [Symbol\Math](../src/Rule/Symbol/Math.php) | Математические знаки больше, меньше, плюс, равно, умножить | 500 | вкл | &nbsp; |
## Number
| Класс | Название | Сортировка | Активность | Параметры |
| --- | --- | --- | --- | --- |
| [Number\DimensionSup](../src/Rule/Number/DimensionSup.php) | Верхний индекс для&nbsp;см<sup>2</sup>, м<sup>2</sup>&hellip; | 500 | вкл | &nbsp; |
| [Number\BankAccount](../src/Rule/Number/BankAccount.php) | Разбиение номер счёта в&nbsp;банке | 500 | вкл | &nbsp; |
| [Number\Fraction](../src/Rule/Number/Fraction.php) | Замена дробей 1/2, 1/4, 3/4&nbsp;на&nbsp;соответствующие символы | 500 | выкл | &nbsp; |
| [Number\Ordinal](../src/Rule/Number/Ordinal.php) | Исправление падежного окночания у&nbsp;чисел | 500 | вкл | &nbsp; |
| [Number\Phone](../src/Rule/Number/Phone.php) | Форматирование номера телефона | 500 | выкл | tpl = +$1&thinsp;$2&thinsp;$3&ndash;$4&ndash;$5 |
| [Number\Sub](../src/Rule/Number/Sub.php) | Нижний индекс для _{n} | 500 | вкл | &nbsp; |
| [Number\Sup](../src/Rule/Number/Sup.php) | Верхний индекс для ^ | 500 | вкл | &nbsp; |
| [Number\Triad](../src/Rule/Number/Triad.php) | Разбиение числа на&nbsp;триады | 800 | вкл | &nbsp; |
## Html
| Класс | Название | Сортировка | Активность | Параметры |
| --- | --- | --- | --- | --- |
| [Html\Paragraph](../src/Rule/Html/Paragraph.php) | Добавление тега <p> | 800 | выкл | &nbsp; |
