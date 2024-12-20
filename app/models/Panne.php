<?php

namespace app\models;

class Panne extends BaseModel
{
  protected $table = "prepa1224_panne";
  protected $columns = [
    "panne_id",
    "panne_vehicule",
    "panne_reparee",
    "panne_date"
  ];
}
