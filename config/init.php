<?php

const DEBUG = 0;
define("ROOT", dirname(__DIR__));
const WWW = ROOT . '/public';
const APP = ROOT . '/app';
const CORE = ROOT . '/core';
const CACHE = ROOT . '/tmp/cache';
const CONFIG = ROOT . '/config';
const LAYOUT = 'default';

$app_path = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#", '', $app_path);
$app_path = str_replace('/public/', '', $app_path);

define("PATH", $app_path );

const ADMIN = PATH . '/admin';
require_once(ROOT . '/vendor/autoload.php');
