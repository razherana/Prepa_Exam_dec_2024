<?php

namespace app\models;

class MinimumVersement extends BaseModel
{
  protected $table = "prepa1224_minimum_versement";
  protected $columns = [
    "minimum_versement_id",
    "minimum_versement_vehicule",
    "minimum_versement_montant"
  ];
}
