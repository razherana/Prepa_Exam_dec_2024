<?php

namespace app\controllers;

use Flight;

class WelcomeController {

	public function __construct() {

	}


	public function home() {
        Flight::render('date');
    }

    public function jour() {
        Flight::render('jour');
    }
}