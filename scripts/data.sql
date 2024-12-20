USE prepa1224;

-- Insert data into prepa1224_chauffeur
INSERT INTO prepa1224_chauffeur (chauffeur_prenom, chauffeur_nom) VALUES
('Jean', 'Dupont'),
('Alice', 'Martin'),
('Robert', 'Durand');

-- Insert data into prepa1224_vehicule
INSERT INTO prepa1224_vehicule (vehicule_modele, vehicule_marque, vehicule_plaque) VALUES
('Model S', 'Tesla', 'AB-123-CD'),
('Golf', 'Volkswagen', 'EF-456-GH'),
('Civic', 'Honda', 'IJ-789-KL');

-- Insert data into prepa1224_minimum_versement
INSERT INTO prepa1224_minimum_versement (minimum_versement_vehicule, minimum_versement_montant) VALUES
(1, 500.00),
(2, 300.00),
(3, 400.00);

-- Insert data into prepa1224_destination
INSERT INTO prepa1224_destination (destination_name) VALUES
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice');

-- Insert data into prepa1224_trajet
INSERT INTO prepa1224_trajet (trajet_chauffeur, trajet_vehicule, trajet_A, trajet_B, trajet_montant, trajet_debut, trajet_fin, trajet_distance, trajet_carburant) VALUES
(1, 1, 1, 2, 150.50, '2024-12-18 08:00:00', '2024-12-18 12:00:00', 465.0, 30.0),
(2, 2, 2, 3, 200.00, '2024-12-18 09:00:00', '2024-12-18 14:00:00', 320.0, 25.0),
(3, 3, 4, 5, 180.00, '2024-12-18 10:00:00', '2024-12-18 13:30:00', 250.0, 20.0);

-- Insert data into prepa1224_panne
INSERT INTO prepa1224_panne (panne_vehicule, panne_reparee, panne_date) VALUES
(1, 1, '2024-12-17 15:00:00'),
(2, 0, '2024-12-18 10:30:00'),
(3, 1, '2024-12-16 09:00:00');

-- Insert data into prepa1224_salaire
INSERT INTO prepa1224_salaire (salaire_trajet, salaire_pourcentage_min, salaire_pourcentage_max) VALUES
(1, 10.0, 15.0),
(2, 12.0, 18.0),
(3, 8.0, 14.0);
