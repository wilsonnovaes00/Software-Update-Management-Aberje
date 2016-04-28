<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';


$app =  new Silex\Application();


$app['debug'] = true;

$app->get('/', function(){
    return "Home";
});

$app->run();
