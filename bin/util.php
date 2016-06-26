#!/usr/bin/env php
<?php

if ($argc < 2) {
    print_r("USAGE: " . __FILE__ . " '<separator>' '<string>'");
}

$separator = $argv[1];
$string = $argv[2];

$data = explode($separator, $string);
$data = array_map('trim', $data);

echo 'data:' . PHP_EOL . '- ';
echo implode("\n- ", $data);
echo PHP_EOL;
