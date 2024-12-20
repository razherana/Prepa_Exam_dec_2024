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

    public function dates($annee)
    {
        $dates = Trajet::get_dates()[$annee] ?? [];
        $annees = Trajet::get_annee();
        Flight::render("date", compact("dates", "annees"));
    }

    public function jours($dateParam)
    {
        $date = new DateTime($dateParam);
        $trajetAll = Trajet::all();
        $trajets = [];
        $date_format = $date->format("Y-m-d");
        foreach ($trajetAll as $trajet)
            if ($trajet->trajet_debut >= $date_format && $trajet->trajet_fin >= $date_format)
                $trajets[] = $trajet;
        Flight::render("jour", compact("date", "trajets"));
    }
}
