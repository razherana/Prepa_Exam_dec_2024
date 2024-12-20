<?php

namespace app\models;

use DateTime;

class Trajet extends BaseModel
{
  protected $table = "prepa1224_trajet";
  protected $columns = [
    "trajet_id",
    "trajet_chauffeur",
    "trajet_vehicule",
    "trajet_A",
    "trajet_B",
    "trajet_montant",
    "trajet_debut",
    "trajet_fin",
    "trajet_distance",
    "trajet_carburant"
  ];

  public static function get_annee()
  {
    $trajets = Trajet::all();
    $annees = [];

    foreach ($trajets as $trajet) {
      $date1 = new DateTime($trajet->trajet_debut);
      $annee = $date1->format("Y");
      if (!in_array($annee, $annees))
        $annees[] = $annee;
    }
    return $annees;
  }

  public static function get_dates()
  {
    $trajets = self::all();
    $dates = [];

    foreach ($trajets as $trajet) {
      $date1 = new DateTime($trajet->trajet_debut);
      $date2 = new DateTime($trajet->trajet_fin);
      $annee = $date1->format("Y");
      if (!in_array($annee, array_keys($dates)))
        $dates[$annee] = [];
      $mois = $date1->format("m");
      if (!in_array($mois, array_keys($dates[$annee])))
        $dates[$annee][$mois] = [];
      $jour1 = $date1->format("d");
      $jour2 = $date2->format("d");
      if (!in_array($jour1, $dates[$annee][$mois]))
        $dates[$annee][$mois][] = $jour1;
      if (!in_array($jour2, $dates[$annee][$mois]))
        $dates[$annee][$mois][] = $jour2;
    }

    return $dates;
  }
}