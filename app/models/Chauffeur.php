<?php

namespace app\models;

class Chauffeur extends BaseModel
{
  protected $table = "prepa1224_chauffeur";
  protected $columns = [
    "chauffeur_id",
    "chauffeur_prenom",
    "chauffeur_nom"
  ];
}
