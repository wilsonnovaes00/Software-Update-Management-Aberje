<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#Add Autoload
require_once __DIR__.'/../vendor/autoload.php';


#Starting Silex Application
$app = new Silex\Application();


#Debugging
$app['debug'] = true;


#Registering a Twig Provider
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../template',
));


#Routes
$app->get('/', function () use ($app) {


    return $app['twig']->render('home.twig');
});

$app->get('/atualizar', function () use ($app) {


    return $app['twig']->render('atualizar.twig');
});


$app->get('/teste', function () use ($app) {


    return $app['twig']->render('teste.html');
});






$app->get('/contact', function () use ($app) {


    return $app['twig']->render('contact.twig');
});






$app->run();



