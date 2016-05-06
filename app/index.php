<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#Add Autoload
require_once __DIR__.'/../vendor/autoload.php';


#Starting Silex Application
$app = new Silex\Application();

date_default_timezone_set('America/Sao_Paulo');

#Conect Data Base
$app['db'] = function() {
    return new \PDO('mysql:host=localhost;dbname=silex','root','551100');
};


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
$app->get('/listar', function() use ($app) {

    $stmt = $app['db']->query("Select * from computadores");
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

     return $app->json($result);







});





$app->get('/atualizar', function () use ($app) {


    return $app['twig']->render('atualizar.twig');
});


$app->get('/teste', function () use ($app) {


    return $app['twig']->render('teste.twig');
});






$app->get('/contact', function () use ($app) {


    return $app['twig']->render('contact.twig');
});






$app->run();



