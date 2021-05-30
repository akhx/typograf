# php Типограф
[![tests](https://github.com/akhx/typograf/actions/workflows/tests.yml/badge.svg)](https://github.com/akhx/typograf/actions/workflows/tests.yml)
[![codecov](https://codecov.io/gh/akhx/typograf/branch/master/graph/badge.svg)](https://codecov.io/gh/akhx/typograf)

Типографирование текста на&nbsp;php, помогает расставить неразрывные пробелы, правильные кавычки и&nbsp;исправить мелкие опечатки.

## Содержание
 - [Установка](#Установка)
 - [Использование](#Использование)
 - [Правила](docs/RULES.md)

### Установка

```shell
composer require akh/typograf
```

### Использование

```php
$t = new akh\Typograf\Typograf();
$typoText = $t->apply('"Привет, мир!"');
echo $typoText; //«Привет, мир!»
```

#### Включение и выключение правил

```php
$t = new akh\Typograf\Typograf();
// Включить правило
$t->enableRule('Nbsp\ReplaceNbsp');
// Включить все правила в группе 
$t->enableRule('Nbsp\*');
// Включить все правила
$t->enableRule('*');

// Отключить правило
$t->disableRule('Nbsp\ReplaceNbsp'); 
// Отключить все правила в группе
$t->disableRule('Nbsp\*'); 
// Отключить все правила
$t->disableRule('*'); 
```

#### Частичное отключение
Чтобы отключить типографирование для участка текста, его нужно оберунть в 
```html
<span class="no-typo">"Привет"</span>
```

## Вдохновление черпается из
+ [Типограф на js](https://github.com/typograf/typograf)
+ [Типограф Муравьева](https://github.com/emuravjev/mdash)