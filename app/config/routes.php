<?php

use app\controllers\ApiExampleController;
use app\controllers\JourController;
use app\controllers\WelcomeController;
use flight\Engine;
use flight\net\Router;
// use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
$app = Flight::app();
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$jourController = new JourController($app);

$router->get('/dates/@annee', [$jourController, 'dates']);
$router->get('/jours/@dateParam', [$jourController, 'jours']);

