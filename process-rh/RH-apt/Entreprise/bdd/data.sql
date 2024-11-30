-- AZA INSERENA TY FA LE ANY CANDIDAT ATAO








-- INSERT INTO annonce (date_annonce, duree_exp_requise, id_travail, id_canal, id_poste, id_type_contrat)
-- VALUES
--    ('2024-10-01', 2, 1, 1, 1, 1),  -- Boulanger en CDI
--    ('2024-10-05', 3, 2, 2, 2, 2),  -- Pâtissier en CDD
--    ('2024-10-10', 5, 3, 3, 3, 1),  -- Chef Boulanger en CDI
--    ('2024-10-15', 1, 4, 4, 4, 2),  -- Vendeur en CDD
--    ('2024-10-20', 4, 5, 5, 5, 1);  -- Caissier en CDI

-- candidature

-- candidature in annonce

-- experience travail

-- ========================================================





-- INSERT INTO test (date_test, id_candidature)
-- VALUES
--    ('2024-03-15', 1),
--    ('2024-03-16', 3),
--    ('2024-03-17', 5),
--    ('2024-03-18', 7),
--    ('2024-03-19', 10),
--    ('2024-03-20', 12),
--    ('2024-03-21', 15),
--    ('2024-03-22', 18),
--    ('2024-03-23', 20),
--    ('2024-03-24', 22);

-- INSERT INTO resultat_test (date_resultat_test, note, id_test)
-- VALUES
--    ('2024-03-30', 85.50, 1),
--    ('2024-03-31', 72.00, 3),
--    ('2024-04-01', 90.75, 5),
--    ('2024-04-02', 68.25, 7),
--    ('2024-04-03', 88.00, 10),
--    ('2024-04-04', 76.50, 12),
--    ('2024-04-05', 93.00, 15),
--    ('2024-04-06', 81.75, 18),
--    ('2024-04-07', 78.50, 20),
--    ('2024-04-08', 69.25, 22);


-- INSERT INTO resultat_test (date_resultat_test, note, id_candidature)
-- VALUES
--    ('2024-01-15', 9.50, 1),  -- Moyenne non atteinte
--    ('2024-01-17', 12.00, 2),  -- Moyenne atteinte
--    ('2024-01-19', 15.25, 3),  -- Moyenne atteinte
--    ('2024-01-22', 8.00, 4),  -- Moyenne non atteinte
--    ('2024-01-25', 14.50, 5),  -- Moyenne atteinte
--    ('2024-01-28', 7.25, 6),  -- Moyenne non atteinte
--    ('2024-01-30', 11.00, 7),  -- Moyenne atteinte
--    ('2024-02-02', 9.00, 8),  -- Moyenne non atteinte
--    ('2024-02-05', 10.50, 9),  -- Moyenne atteinte
--    ('2024-02-08', 6.75, 10), -- Moyenne non atteinte
--    ('2024-02-11', 13.00, 11), -- Moyenne atteinte
--    ('2024-02-14', 7.50, 12), -- Moyenne non atteinte
--    ('2024-02-17', 16.00, 13), -- Moyenne atteinte
--    ('2024-02-20', 8.25, 14), -- Moyenne non atteinte
--    ('2024-02-22', 10.00, 15); -- Moyenne atteinte

-- INSERT INTO rendez_vous (date_rendez_vous, id_candidature)
-- VALUES
--    ('2024-02-01', 2),
--    ('2024-02-03', 3),
--    ('2024-02-06', 5),
--    ('2024-02-09', 7),
--    ('2024-02-12', 9),
--    ('2024-02-15', 11),
--    ('2024-02-18', 13),
--    ('2024-02-21', 15);

-- INSERT INTO personnel (nom, prenom, date_naissance, id_poste)
-- VALUES
--    ('Durand', 'Sophie', '1987-05-10', 1),    -- Boulanger
--    ('Faure', 'Laurent', '1990-08-20', 2),    -- Pâtissier
--    ('Garnier', 'Éric', '1992-04-05', 3),     -- Chef Boulanger
--    ('Lemoine', 'Cécile', '1989-01-11', 4),   -- Vendeur
--    ('Moreau', 'Antoine', '1994-07-30', 5),   -- Caissier
--    ('Rousseau', 'Lucie', '1988-12-18', 6),   -- Apprenti Boulanger
--    ('Benoit', 'Michel', '1985-11-22', 7),    -- Responsable de Production
--    ('Renaud', 'Amandine', '1990-03-14', 8),  -- Responsable des Ventes
--    ('Blanc', 'Cédric', '1993-06-08', 9),     -- Préparateur de Commandes
--    ('Martinez', 'Isabelle', '1986-02-28', 10);-- Livreur

-- INSERT INTO contrat (date_debut, date_fin, date_renvoie, id_personnel, id_type_contrat, id_poste)
-- VALUES
--    ('2024-01-01', NULL, NULL, 1, 1, 1),    -- Boulanger en CDI
--    ('2024-02-15', '2024-11-15', NULL, 2, 2, 2),    -- Pâtissier en CDD
--    ('2024-03-01', NULL, NULL, 3, 1, 3),    -- Chef Boulanger en CDI
--    ('2024-04-01', '2024-09-30', '2024-09-25', 4, 2, 4),  -- Vendeur en CDD (avec date de renvoi)
--    ('2024-05-01', NULL, NULL, 5, 1, 5),    -- Caissier en CDI
--    ('2024-06-01', '2024-12-01', NULL, 6, 2, 6),    -- Apprenti Boulanger en CDD
--    ('2024-07-01', NULL, NULL, 7, 1, 7),    -- Responsable de Production en CDI
--    ('2024-08-01', '2024-08-31', '2024-08-28', 8, 2, 8),  -- Responsable des Ventes en CDD (avec date de renvoi)
--    ('2024-09-01', '2025-08-31', NULL, 9, 2, 9),    -- Préparateur de Commandes en CDD
--    ('2024-10-01', NULL, NULL, 10, 1, 10);  -- Livreur en CDI




