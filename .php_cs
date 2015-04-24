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
        'ordered_use',
        'strict',
        'strict_param',
    ))
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()
            ->exclude('Symfony/CS/Tests/Fixtures')
            ->in(__DIR__)
    )
;
