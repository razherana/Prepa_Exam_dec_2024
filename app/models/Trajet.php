<?php

namespace app\models;

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
}
