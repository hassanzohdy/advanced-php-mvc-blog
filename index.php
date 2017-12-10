<?php

date_default_timezone_set('Africa/Cairo');

require __DIR__ . '/vendor/System/Application.php';
require __DIR__ . '/vendor/System/File.php';

use System\File;
use System\Application;

$file = new File(__DIR__);

$app = Application::getInstance($file);

$app->run();                        