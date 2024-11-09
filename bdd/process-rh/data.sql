INSERT INTO canal (nom)
VALUES
   ('LinkedIn'),
   ('Facebook'),
   ('Radio'),
   ('Pole emploi'),
   ('Television'),
   ('Journal');

INSERT INTO poste (nom)
VALUES
   ('Boulanger'),
   ('Patissier'),
   ('Chef Boulanger'),
   ('Vendeur'),
   ('Caissier'),
   ('Apprenti Boulanger'),
   ('Responsable de Production'),
   ('Responsable des Ventes'),
   ('Preparateur de Commandes'),
   ('Livreur');

INSERT INTO type_contrat (nom)
VALUES
   ('Periode essaie'),  
   ('CDD'),    
   ('CDI');       

INSERT INTO travail (nom)
VALUES
   ('Preparation de la pate'),
   ('Petrissage de la pate'),
   ('Cuisson du pain'),
   ('Preparation des viennoiseries'),
   ('Decoration des patisseries'),
   ('Preparation des sandwichs'),
   ('Emballage des produits'),
   ('Nettoyage du materiel'),
   ('Gestion des stocks'),
   ('Commande des matieres premieres'),
   ('Gestion des invendus'),
   ('Accueil des clients'),
   ('Conseil sur les produits'),
   ('Encaissement des ventes'),
   ('Organisation des livraisons'),
   ('Rangement du magasin'),
   ('Entretien de l espace de vente'),
   ('Creation de nouvelles recettes'),
   ('Verification des normes de securite'),
   ('Gestion des employes'),
   ('Formation des apprentis'),
   ('Suivi des commandes clients'),
   ('Preparation des commandes clients'),
   ('Prise de commande telephonique'),
   ('Gestion des reseaux sociaux');

INSERT INTO diplome (nom, valeur)
VALUES
   ('Pas de diplome', 0),
   ('CEPE', 20),
   ('BEPC', 40),
   ('BACC', 50),
   ('DTS / BTS', 60),
   ('Licence', 70),
   ('Master I', 80),
   ('Master II', 90),
   ('Doctorat', 100);

INSERT INTO candidature (nom, prenom, date_naissance, date_candidature, id_diplome)
VALUES
   ('Durand', 'Alice', '1990-04-12', '2024-01-10', 1),
   ('Martin', 'Benoit', '1988-03-20', '2024-01-12', 2),
   ('Dupont', 'Claire', '1992-08-05', '2024-01-14', 3),
   ('Bernard', 'David', '1985-11-10', '2024-01-15', 1),
   ('Petit', 'Elise', '1991-07-25', '2024-01-18', 4),
   ('Leroy', 'François', '1994-06-15', '2024-01-20', 7),
   ('Moreau', 'Georges', '1989-12-30', '2024-01-22', 3),
   ('Simon', 'Helene', '1987-05-03', '2024-01-25', 1),
   ('Rousseau', 'Isabelle', '1995-10-19', '2024-01-28', 5),
   ('Garnier', 'Julien', '1986-09-21', '2024-01-30', 1),
   ('Faure', 'Karine', '1990-01-11', '2024-02-01', 2),
   ('Blanc', 'Louis', '1984-02-15', '2024-02-03', 3),
   ('Morel', 'Marie', '1993-03-29', '2024-02-05', 5),
   ('Girard', 'Nathalie', '1982-06-22', '2024-02-07', 6),
   ('Andre', 'Olivier', '1991-11-09', '2024-02-10', 1),
   ('Lemoine', 'Pauline', '1990-04-18', '2024-02-13', 3),
   ('Perrin', 'Quentin', '1987-10-24', '2024-02-15', 4),
   ('Renaud', 'Sabine', '1995-07-05', '2024-02-18', 2),
   ('Benoit', 'Thomas', '1986-12-06', '2024-02-20', 8),
   ('Schmitt', 'Ursule', '1992-09-17', '2024-02-22', 4),
   ('Colin', 'Victor', '1989-05-11', '2024-02-25', 9),
   ('Renard', 'Wendy', '1994-08-13', '2024-02-27', 8),
   ('Leclerc', 'Xavier', '1985-07-19', '2024-02-29', 6),
   ('Martinez', 'Yvonne', '1993-11-01', '2024-03-01', 2);

INSERT INTO resultat_test (date_resultat_test, note, id_candidature)
VALUES
   ('2024-01-15', 9.50, 1),  -- Moyenne non atteinte
   ('2024-01-17', 12.00, 2),  -- Moyenne atteinte
   ('2024-01-19', 15.25, 3),  -- Moyenne atteinte
   ('2024-01-22', 8.00, 4),  -- Moyenne non atteinte
   ('2024-01-25', 14.50, 5),  -- Moyenne atteinte
   ('2024-01-28', 7.25, 6),  -- Moyenne non atteinte
   ('2024-01-30', 11.00, 7),  -- Moyenne atteinte
   ('2024-02-02', 9.00, 8),  -- Moyenne non atteinte
   ('2024-02-05', 10.50, 9),  -- Moyenne atteinte
   ('2024-02-08', 6.75, 10), -- Moyenne non atteinte
   ('2024-02-11', 13.00, 11), -- Moyenne atteinte
   ('2024-02-14', 7.50, 12), -- Moyenne non atteinte
   ('2024-02-17', 16.00, 13), -- Moyenne atteinte
   ('2024-02-20', 8.25, 14), -- Moyenne non atteinte
   ('2024-02-22', 10.00, 15); -- Moyenne atteinte

INSERT INTO rendez_vous (date_rendez_vous, id_candidature)
VALUES
   ('2024-02-01', 2),
   ('2024-02-03', 3),
   ('2024-02-06', 5),
   ('2024-02-09', 7),
   ('2024-02-12', 9),
   ('2024-02-15', 11),
   ('2024-02-18', 13),
   ('2024-02-21', 15);

INSERT INTO personnel (nom, prenom, date_naissance, id_poste)
VALUES
   ('Durand', 'Sophie', '1987-05-10', 1),    -- Boulanger
   ('Faure', 'Laurent', '1990-08-20', 2),    -- Pâtissier
   ('Garnier', 'Éric', '1992-04-05', 3),     -- Chef Boulanger
   ('Lemoine', 'Cécile', '1989-01-11', 4),   -- Vendeur
   ('Moreau', 'Antoine', '1994-07-30', 5),   -- Caissier
   ('Rousseau', 'Lucie', '1988-12-18', 6),   -- Apprenti Boulanger
   ('Benoit', 'Michel', '1985-11-22', 7),    -- Responsable de Production
   ('Renaud', 'Amandine', '1990-03-14', 8),  -- Responsable des Ventes
   ('Blanc', 'Cédric', '1993-06-08', 9),     -- Préparateur de Commandes
   ('Martinez', 'Isabelle', '1986-02-28', 10);-- Livreur

INSERT INTO contrat (date_debut, date_fin, date_renvoie, id_personnel, id_type_contrat, id_poste)
VALUES
   ('2024-01-01', NULL, NULL, 1, 1, 1),    -- Boulanger en CDI
   ('2024-02-15', '2024-11-15', NULL, 2, 2, 2),    -- Pâtissier en CDD
   ('2024-03-01', NULL, NULL, 3, 1, 3),    -- Chef Boulanger en CDI
   ('2024-04-01', '2024-09-30', '2024-09-25', 4, 2, 4),  -- Vendeur en CDD (avec date de renvoi)
   ('2024-05-01', NULL, NULL, 5, 1, 5),    -- Caissier en CDI
   ('2024-06-01', '2024-12-01', NULL, 6, 2, 6),    -- Apprenti Boulanger en CDD
   ('2024-07-01', NULL, NULL, 7, 1, 7),    -- Responsable de Production en CDI
   ('2024-08-01', '2024-08-31', '2024-08-28', 8, 2, 8),  -- Responsable des Ventes en CDD (avec date de renvoi)
   ('2024-09-01', '2025-08-31', NULL, 9, 2, 9),    -- Préparateur de Commandes en CDD
   ('2024-10-01', NULL, NULL, 10, 1, 10);  -- Livreur en CDI

INSERT INTO annonce (date_annonce, duree_exp_requise, id_travail, id_canal, id_poste, id_type_contrat)
VALUES
   ('2024-10-01', 2, 1, 1, 1, 1),  -- Boulanger en CDI
   ('2024-10-05', 3, 2, 2, 2, 2),  -- Pâtissier en CDD
   ('2024-10-10', 5, 3, 3, 3, 1),  -- Chef Boulanger en CDI
   ('2024-10-15', 1, 4, 4, 4, 2),  -- Vendeur en CDD
   ('2024-10-20', 4, 5, 5, 5, 1);  -- Caissier en CDI


-- Candidatures pour l'annonce 1 (Boulanger en CDI, requérant 3 ans d'expérience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (1, 1),   -- Durand Alice
   (1, 3),   -- Dupont Claire
   (1, 5),   -- Petit Elise
   (1, 7),   -- Moreau Georges
   (1, 9),   -- Rousseau Isabelle
   (1, 13);  -- Morel Marie

-- Candidatures pour l'annonce 2 (Pâtissier en CDD, requérant 2 ans d'expérience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (2, 2),   -- Martin Benoit
   (2, 10),  -- Faure Karine
   (2, 12),  -- Blanc Louis
   (2, 14),  -- Girard Nathalie
   (2, 18),  -- Renaud Sabine
   (2, 20);  -- Schmitt Ursule

-- Candidatures pour l'annonce 3 (Chef Boulanger en CDI, requérant 5 ans d'expérience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (3, 3),   -- Dupont Claire
   (3, 8),   -- Simon Helene
   (3, 11),  -- Faure Karine
   (3, 13),  -- Morel Marie
   (3, 16),  -- Lemoine Pauline
   (3, 17);  -- Perrin Quentin

-- Candidatures pour l'annonce 4 (Vendeur en CDD, requérant 1 an d'expérience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (4, 4),   -- Bernard David
   (4, 6),   -- Leroy François
   (4, 12),  -- Blanc Louis
   (4, 15),  -- Andre Olivier
   (4, 19),  -- Benoit Thomas
   (4, 21);  -- Colin Victor

-- Candidatures pour l'annonce 5 (Caissier en CDI, requérant 4 ans d'expérience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (5, 7),   -- Moreau Georges
   (5, 9),   -- Rousseau Isabelle
   (5, 14),  -- Girard Nathalie
   (5, 16),  -- Lemoine Pauline
   (5, 20);  -- Schmitt Ursule


INSERT INTO experience_travail (id_travail, id_candidature, duree)
VALUES
   (1, 1, 2),   -- Durand Alice, Boulanger, 2 ans d'expérience
   (2, 2, 3),   -- Martin Benoit, Pâtissier, 3 ans d'expérience
   (3, 3, 4),   -- Dupont Claire, Chef Boulanger, 4 ans d'expérience
   (4, 4, 1),   -- Bernard David, Vendeur, 1 an d'expérience
   (5, 5, 3),   -- Petit Elise, Caissier, 3 ans d'expérience
   (1, 6, 5),   -- Leroy François, Boulanger, 5 ans d'expérience
   (2, 7, 2),   -- Moreau Georges, Pâtissier, 2 ans d'expérience
   (3, 8, 3),   -- Simon Helene, Chef Boulanger, 3 ans d'expérience
   (4, 9, 1),   -- Rousseau Isabelle, Vendeur, 1 an d'expérience
   (5, 10, 4),  -- Garnier Julien, Caissier, 4 ans d'expérience
   (1, 11, 3),  -- Faure Karine, Boulanger, 3 ans d'expérience
   (2, 12, 2),  -- Blanc Louis, Pâtissier, 2 ans d'expérience
   (3, 13, 5),  -- Morel Marie, Chef Boulanger, 5 ans d'expérience
   (4, 14, 1),  -- Girard Nathalie, Vendeur, 1 an d'expérience
   (5, 15, 4),  -- Andre Olivier, Caissier, 4 ans d'expérience
   (1, 16, 2),  -- Lemoine Pauline, Boulanger, 2 ans d'expérience
   (2, 17, 3),  -- Perrin Quentin, Pâtissier, 3 ans d'expérience
   (3, 18, 4),  -- Renaud Sabine, Chef Boulanger, 4 ans d'expérience
   (4, 19, 1),  -- Benoit Thomas, Vendeur, 1 an d'expérience
   (5, 20, 2),  -- Schmitt Ursule, Caissier, 2 ans d'expérience
   (1, 21, 3),  -- Colin Victor, Boulanger, 3 ans d'expérience
   (2, 22, 4),  -- Renard Wendy, Pâtissier, 4 ans d'expérience
   (3, 23, 5),  -- Leclerc Xavier, Chef Boulanger, 5 ans d'expérience
   (4, 24, 2);  -- Martinez Yvonne, Vendeur, 2 ans d'expérience


