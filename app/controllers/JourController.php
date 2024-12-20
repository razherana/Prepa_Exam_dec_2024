<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Trajet;
use DateTime;
use Flight;
use flight\Engine;

class JourController
{
    /** @var Engine */
    protected Engine $app;

    /**
     * Constructor
     */
    public function __construct(Engine $app)
    {
        $this->app = $app;
    }

   public function jours($annee) {
        $dates = Trajet::get_dates()[$annee] ?? [];
        $annees = Trajet::get_annee();
        Flight::render("date", compact("dates", "annees"));
   }
}
