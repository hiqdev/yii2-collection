<?php

$header = <<<EOF
@package   yii2-collection
@link      http://hiqdev.com/yii2-collection
@license   http://hiqdev.com/yii2-collection/license
@copyright Copyright (c) 2015 HiQDev
EOF;

Symfony\CS\Fixer\Contrib\HeaderPhpdocFixer::setHeader($header);

return Symfony\CS\Config\Config::create()
    // use default SYMFONY_LEVEL and extra fixers:
    //->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers(array(
        'header_phpdoc',                    /// Add, replace or remove header phpdoc.
        'align_double_arrow',               /// Align double arrow symbols in consecutive lines.
        'align_equals',                     /// Align equals symbols in consecutive lines.
        'concat_with_spaces',               /// Concatenation should be used with at least one whitespace around.
        'ereg_to_preg',                     /// Replace deprecated ereg regular expression functions with preg. Warning! This could change code behavior.
/// NO  'long_array_syntax',                /// Arrays should use the long syntax.
        'multiline_spaces_before_semicolon',/// Multi-line whitespace before closing semicolon are prohibited.
        'newline_after_open_tag',           /// Ensure there is no code on the same line as the PHP open tag.
        'no_blank_lines_before_namespace',  /// There should be no blank lines before a namespace declaration.
        'ordered_use',                      /// Ordering use statements.
/// NO  'php4_constructor',                 /// Convert PHP4-style constructors to __construct. Warning! This could change code behavior.
        'phpdoc_order',                     /// Annotations in phpdocs should be ordered so that @param come first, then @throws, then @return.
/// NO  'phpdoc_var_to_type'                /// @var should always be written as @type.
        'pre_increment',                    /// Pre incrementation/decrementation should be used if possible.
        'short_array_syntax',               /// PHP arrays should use the PHP 5.4 short-syntax.
        'strict',                           /// Comparison should be strict. Warning! This could change code behavior.
        'strict_param',                     /// Functions should be used with $strict param. Warning! This could change code behavior.
    ))
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()
            ->in(__DIR__)
            ->notPath('tests/unit/UnitTester.php')
    )
;
