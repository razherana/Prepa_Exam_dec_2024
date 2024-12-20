CREATE DATABASE prepa1224;

USE prepa1224;

CREATE TABLE prepa1224_chauffeur (
    chauffeur_id INT PRIMARY KEY AUTO_INCREMENT,
    chauffeur_prenom VARCHAR(100) NOT NULL,
    chauffeur_nom VARCHAR(100) NOT NULL
);

CREATE TABLE prepa1224_vehicule (
    vehicule_id INT PRIMARY KEY AUTO_INCREMENT,
    vehicule_modele VARCHAR(100) NOT NULL,
    vehicule_marque VARCHAR(100) NOT NULL,
    vehicule_plaque VARCHAR(100) NOT NULL
);

CREATE TABLE prepa1224_minimum_versement (
    minimum_versement_id INT PRIMARY KEY AUTO_INCREMENT,
    minimum_versement_vehicule INT REFERENCES prepa1224_vehicule (vehicule_id),
    minimum_versement_montant REAL NOT NULL
);

CREATE TABLE prepa1224_destination (
    destination_id INT PRIMARY KEY AUTO_INCREMENT,
    destination_name VARCHAR(100)
);

CREATE TABLE prepa1224_trajet (
    trajet_id INT PRIMARY KEY AUTO_INCREMENT,
    trajet_chauffeur INT REFERENCES prepa1224_chauffeur (chauffeur_id),
    trajet_vehicule INT REFERENCES prepa1224_vehicule (vehicule_id),
    trajet_A INT REFERENCES prepa1224_destination (destination_id),
    trajet_B INT REFERENCES prepa1224_destination (destination_id),
    trajet_montant REAL NOT NULL,
    trajet_debut DATETIME NOT NULL,
    trajet_fin DATETIME NOT NULL,
    trajet_distance REAL,
    trajet_carburant REAL
);

CREATE TABLE prepa1224_panne (
    panne_id INT PRIMARY KEY AUTO_INCREMENT,
    panne_vehicule INT REFERENCES prepa1224_vehicule (vehicule_id),
    panne_reparee INT(1) DEFAULT 0,
    panne_date DATETIME NOT NULL
);

CREATE TABLE prepa1224_salaire (
    salaire_id INT PRIMARY KEY AUTO_INCREMENT,
    salaire_trajet INT REFERENCES prepa1224_trajet (trajet_id),
    salaire_pourcentage_min REAL NOT NULL,
    salaire_pourcentage_max REAL NOT NULL
);