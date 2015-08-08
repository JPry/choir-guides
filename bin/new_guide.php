#!/usr/bin/env php
<?php

define('ROOT_DIR', dirname(__DIR__));
date_default_timezone_set('America/New_York');

require_once(ROOT_DIR .'/vendor/autoload.php');

$data = json_decode(ROOT_DIR . '/composer.json');
$version = isset($data->version) ? $data->version : 'dev';

$app = new \Symfony\Component\Console\Application('choir_guide', $version);
$app->add(new \JPry\Choir_Guide\Commands\Template_Create());

$app->run();
