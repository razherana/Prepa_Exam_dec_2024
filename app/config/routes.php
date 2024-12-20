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

$Welcome_Controller = new WelcomeController();
$jourController = new JourController($app);
$router->get('/', [$Welcome_Controller, 'home']);
$router->get('/jour', [$Welcome_Controller, 'jour']);
$router->get('/jour/@annee', [$jourController, 'jours']);


//$router->get('/', [ 'WelcomeController', 'home' ]); 

//$router->get('/', \app\controllers\WelcomeController::class.'->home'); 

$router->get('/hello-world/@name', function ($name) {
	echo '<h1>Hello world! Oh hey ' . $name . '!</h1>';
});

$router->group('/api', function () use ($router, $app) {
	$Api_Example_Controller = new ApiExampleController($app);
	$router->get('/users', [$Api_Example_Controller, 'getUsers']);
	$router->get('/users/@id:[0-9]', [$Api_Example_Controller, 'getUser']);
	$router->post('/users/@id:[0-9]', [$Api_Example_Controller, 'updateUser']);
});
