<?php

namespace app\models;

class Salaire extends BaseModel
{
  protected $table = "prepa1224_salaire";
  protected $columns = [
    "salaire_id",
    "salaire_trajet",
    "salaire_pourcentage_min",
    "salaire_pourcentage_max"
  ];
}
