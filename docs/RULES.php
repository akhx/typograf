<?php

require_once "../vendor/autoload.php";
$t = new Akh\Typograf\Typograf();

$arRules = [];
foreach ($t->getRules() as $rule) {
    $class = get_class($rule);
    $class = str_replace('Akh\Typograf\\', '', $class);
    $arClass = explode("\\", $class);
    $class = str_replace('Rule\\', '', $class);
    if (empty($arRules[$arClass[1]])) {
        $arRules[$arClass[1]] = [];
    }

    $arRules[$arClass[1]][] = [
        'code' => $class,
        'name' => $t->apply($rule->name),
        'sort' => $rule->getSort(),
        'active' => $rule->getActive(),
        'config' => $rule->getSettings()
    ];
}

ob_start();
foreach ($arRules as $group => $items) {
    echo '## ' . $group . PHP_EOL;
    echo '| Класс | Название | Сортировка | Активность | Параметры |' . PHP_EOL;
    echo '| --- | --- | --- | --- | --- |' . PHP_EOL;
    foreach ($items as $arItem) {
        echo '| [' . $arItem['code'] . '](../src/Rule/' . str_replace('\\', '/', $arItem['code']) . '.php) ';
        echo '| ' . $arItem['name'] . ' ';
        echo '| ' . $arItem['sort'] . ' ';
        echo '| ' . ($arItem['active'] === true ? 'вкл' : 'выкл') . ' ';
        echo '| ';
        if (!empty($arItem['config'])) {
            foreach ($arItem['config'] as $key => $value) {
                echo $key . ' = ' . $value;
            }
        } else {
            echo '&nbsp;';
        }
        echo ' |' . PHP_EOL;
    }
}

$res = ob_get_contents();
ob_end_clean();
file_put_contents(__DIR__ . '/RULES.md', $res);

echo $res;
