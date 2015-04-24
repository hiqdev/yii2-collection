<?php

$header = <<<EOF
This file is part of hiqdev/yii2-collection.

@link    http://hiqdev.com/yii2-collection
@license http://hiqdev.com/yii2-collection/license
@copyright Copyright (c) 2015 HiQDev
EOF;

Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

return Symfony\CS\Config\Config::create()
    // use default SYMFONY_LEVEL and extra fixers:
    ->fixers(array(
        'header_comment',
        'long_array_syntax',
        'align_double_arrow',
        'align_equals',
        'concat_with_spaces',
        'multiline_spaces_before_semicolon',
        'newline_after_open_tag',
        'php4_constructor',
        'phpdoc_order',
        'ordered_use',
        'strict',
        'strict_param',
    ))
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()
            ->in(__DIR__)
    )
;
