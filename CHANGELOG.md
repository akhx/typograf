# Changelog
## [Unreleased](https://github.com/akhx/typograf/compare/v0.7.0...HEAD)

## [0.7.0](https://github.com/akhx/typograf/compare/v0.6.0...v0.7.0) - 2024-12-08
* url добавлен в safeBlock
* новое правило для работы с адресами

## [0.6.0](https://github.com/akhx/typograf/compare/v0.5.0...v0.6.0) - 2024-09-25
* переработан SafeBlock

## [0.5.0](https://github.com/akhx/typograf/compare/v0.4.10...v0.5.0) - 2024-08-08
* добавлено правило неразрывных пробелов инициалов и фамилии

## [0.4.10](https://github.com/akhx/typograf/compare/v0.4.9...v0.4.10) - 2024-02-20
* support php 8.3
* fix inch .,/

## [0.4.9](https://github.com/akhx/typograf/compare/v0.4.8...v0.4.9) - 2023-04-21
* fix remove html entity in DelDouble

## [0.4.8](https://github.com/akhx/typograf/compare/v0.4.7...v0.4.8) - 2023-02-15
* fix README
* debug mode
* replace quote to html entity

## [0.4.7](https://github.com/akhx/typograf/compare/v0.4.6...v0.4.7) - 2022-12-08
* fix izZaPod

## [0.4.6](https://github.com/akhx/typograf/compare/v0.4.5...v0.4.6) - 2022-06-23
* phpStan and cs-fixer

## [0.4.5](https://github.com/akhx/typograf/compare/v0.4.4...v0.4.5) - 2021-09-20
### Исправлено
* проблема с декодированием, если встречаются конструкция 2X2

## [0.4.4](https://github.com/akhx/typograf/compare/v0.4.3...v0.4.4) - 2021-09-10
### Исправлено
* проверка при декодировании 


## [0.4.3](https://github.com/akhx/typograf/compare/v0.4.2...v0.4.3) - 2021-08-13
### Исправлено
* проблема с декодированием, если встречаются конструкция 2X2 (правило замены символа умножения)

## [0.4.2](https://github.com/akhx/typograf/compare/v0.4.1...v0.4.2) - 2021-08-05
### Исправлено
* кодирование(сохранение) тегов

## [0.4.1](https://github.com/akhx/typograf/compare/v0.4.0...v0.4.1) - 2021-07-12
### Исправлено
*   неразрывной пробел в конце текста (если встречается точка > стр. 1)

## [0.4.0](https://github.com/akhx/typograf/compare/v0.3.1...v0.4.0) - 2021-06-15
### Добавлено
*   debug mode
*   свои правила addRule

## [0.3.1](https://github.com/akhx/typograf/compare/v0.3.0...v0.3.1) - 2021-06-02
### Исправлено
*   Срабатывание правил в конструкциях с переносом строки и обрамлением тегами

## [0.3.0](https://github.com/akhx/typograf/compare/v0.2.0...v0.3.0) - 2021-06-03
### Добавлено
*   Правило разбиение числа на триады
*   Правило разбиение номер счёта
*   Правило форматирования номера телефона (выкл)

## [0.2.0](https://github.com/akhx/typograf/compare/v0.1.0...v0.2.0) - 2021-06-02
### Добавлено
*   Преобразование знака умножения
*   Включение по умолчанию математических преобразований

### Исправлено
*   Регистр namespace поставщика

## 0.1.0 - 2021-05-30
*   initial release