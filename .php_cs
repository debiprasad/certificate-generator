<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('vendor')
    ->exclude('storage')
    ->exclude('public')
    ->in(__DIR__)
;

return Symfony\CS\Config\Config::create()
    ->setUsingCache(true)
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers(array(
        '-psr0',
        'concat_with_spaces',
        'ordered_use',
        'extra_empty_lines',
        'remove_lines_between_uses',
        'return',
        'unused_use',
        'whitespacy_lines',
        'multiline_array_trailing_comma',
        'new_with_braces',
        'trailing_spaces',
        '-phpdoc_params',
    ))
    ->finder($finder);
