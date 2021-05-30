<?php

namespace akh\Typograf;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;

class RuleFinder
{
    public static $rules = [];

    public static function getAllRule(): array
    {
        if (empty(static::$rules)) {
            $baseClass = new ReflectionClass('akh\Typograf\Rule\AbstractRule');

            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator(
                    __DIR__ . DIRECTORY_SEPARATOR . 'Rule',
                    RecursiveDirectoryIterator::SKIP_DOTS
                )
            );

            foreach ($files as $file) {
                $className = static::getClassNameByFilePath($file->getPathname());
                $reflectionClass = new ReflectionClass($className);
                if ($reflectionClass->isSubclassOf($baseClass)) {
                    static::$rules[] = $className;
                }
            }
        }

        return static::$rules;
    }

    protected static function getClassNameByFilePath($path)
    {
        $class = str_replace(
            [__DIR__, '.php'],
            ['akh\Typograf', ''],
            $path
        );

        return str_replace('/', '\\', $class);
    }
}