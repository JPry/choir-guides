#!/usr/bin/env php
<?php

use JPry\ChoirGuide\Commands\TemplateCreate;
use JPry\ChoirGuide\Helpers\TemplateHelper;
use Symfony\Component\Console\Application;

define('ROOT_DIR', dirname(__DIR__));
date_default_timezone_set('America/New_York');

require_once(ROOT_DIR . '/vendor/autoload.php');

$data    = json_decode(ROOT_DIR . '/composer.json');
$version = isset($data->version) ? $data->version : 'dev';

// Add our helper set to the Application.
$app = new Application('choir_guide', $version);
$helper_set = $app->getHelperSet();
$helper_set->set(new TemplateHelper());
$app->setHelperSet($helper_set);

// Do the Thing!
$app->add(new TemplateCreate());
$app->run();
