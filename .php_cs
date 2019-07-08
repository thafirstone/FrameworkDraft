<?php

$rules = [
    '@PSR2' => true,
    '@Symfony' => true,
    '@DoctrineAnnotation' => true,
    'doctrine_annotation_braces' => [
        'syntax' => 'with_braces'
    ],
    '@PHP70Migration' => true,
    '@PHP71Migration' => true,
    'array_syntax' => ['syntax' => 'short'],
    'align_multiline_comment' => [
        'comment_type' => 'all_multiline',
    ],
    'cast_spaces' => ['space' => 'single'],
    'concat_space' => ['spacing' => 'none'],
    'is_null' => ['use_yoda_style' => true],
    'no_useless_return' => false,
    'ordered_class_elements' => true,
    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'new_line_for_chained_calls'
    ],
    'no_unused_imports' => true,
    'no_useless_else' => true,
    'ordered_imports' => [
        'sortAlgorithm' => 'alpha',
        'imports_order' => [ "const", "class", "function" ]
    ],
    'single_quote' => [
        'strings_containing_single_quote_chars' => true
    ],
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline_array' => true,
    'full_opening_tag' => false,
    'yoda_style' => true,
    'simplified_null_return' => true,
    'array_indentation' => true,
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'explicit_string_variable' => true,
    'fully_qualified_strict_types' => true,
    'compact_nullable_typehint' => true,
    'method_chaining_indentation' => true,
    'return_assignment' => true,
    'phpdoc_var_without_name' => false,
    'simplified_null_return' => false,
];

$excludes = [
    'phpdocker',
    'vendor',
];

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            ->exclude($excludes)
            ->notName('README.md')
            ->notName('*.xml')
            ->notName('*.yml')
            ->notName('_ide_helper.php')
    );