<?php

namespace app\models;

class Vehicule extends BaseModel
{
  protected $table = "prepa1224_vehicule";
  protected $columns = [
    "vehicule_id",
    "vehicule_modele",
    "vehicule_marque",
    "vehicule_plaque"
  ];
}
