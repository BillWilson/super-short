<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude([
        'vendor',
        'node_modules',
        'storage',
        'bootstrap/cache',
    ])
    ->notPath('_ide_helper.php')
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'no_unused_imports' => true,
        'ordered_imports' => ['sortAlgorithm' => 'length'],
        'array_syntax' => ['syntax' => 'short'],
        'fully_qualified_strict_types' => true,
    ])
    ->setUsingCache(false)
    ->setFinder($finder);