<?php

require_once 'vendor/autoload.php';

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
;

$config = new PhpCsFixer\Config();

return $config
    ->setFinder($finder)
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->setRules(
        [
            '@PSR12' => true,
            '@Symfony' => true,
            '@PhpCsFixer' => true,

            'concat_space' => ['spacing' => 'one'],

            'comment_to_phpdoc' => true,
            'phpdoc_summary' => false,
            'phpdoc_to_comment' => false,

            'php_unit_test_class_requires_covers' => false,
        ],
    )
;
