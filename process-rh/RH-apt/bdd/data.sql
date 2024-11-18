INSERT INTO annonce (date_annonce, duree_exp_requise, id_travail, id_canal, id_poste, id_type_contrat)
VALUES
   ('2024-10-01', 2, 1, 1, 1, 1),  -- Boulanger en CDI
   ('2024-10-05', 3, 2, 2, 2, 2),  -- Pâtissier en CDD
   ('2024-10-10', 5, 3, 3, 3, 1),  -- Chef Boulanger en CDI
   ('2024-10-15', 1, 4, 4, 4, 2),  -- Vendeur en CDD
   ('2024-10-20', 4, 5, 5, 5, 1);  -- Caissier en CDI


INSERT INTO candidature (nom, prenom, mdp, date_naissance, id_diplome)
VALUES
   ('Durand', 'Alice', '123', '1990-04-12', 1),
   ('Martin', 'Benoit', '123', '1988-03-20', 2),
   ('Dupont', 'Claire', '123', '1992-08-05', 3),
   ('Bernard', 'David', '123', '1985-11-10', 1),
   ('Petit', 'Elise', '123', '1991-07-25', 4),
   ('Leroy', 'François', '123', '1994-06-15', 7),
   ('Moreau', 'Georges', '123', '1989-12-30', 3),
   ('Simon', 'Helene', '123', '1987-05-03', 1),
   ('Rousseau', 'Isabelle', '123', '1995-10-19', 5),
   ('Garnier', 'Julien', '123', '1986-09-21', 1),
   ('Faure', 'Karine', '123', '1990-01-11', 2),
   ('Blanc', 'Louis', '123', '1984-02-15', 3),
   ('Morel', 'Marie', '123', '1993-03-29', 5),
   ('Girard', 'Nathalie', '123', '1982-06-22', 6),
   ('Andre', 'Olivier', '123', '1991-11-09', 1),
   ('Lemoine', 'Pauline', '123', '1990-04-18', 3),
   ('Perrin', 'Quentin', '123', '1987-10-24', 4),
   ('Renaud', 'Sabine', '123', '1995-07-05', 2),
   ('Benoit', 'Thomas', '123', '1986-12-06', 8),
   ('Schmitt', 'Ursule', '123', '1992-09-17', 4),
   ('Colin', 'Victor', '123', '1989-05-11', 9),
   ('Renard', 'Wendy', '123', '1994-08-13', 8),
   ('Leclerc', 'Xavier', '123', '1985-07-19', 6),
   ('Martinez', 'Yvonne', '123', '1993-11-01', 2);


-- Candidatures pour l'annonce 1 (Boulanger en CDI, requerant 3 ans d'experience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (1, 1),   -- Durand Alice
   (1, 3),   -- Dupont Claire
   (1, 5),   -- Petit Elise
   (1, 7),   -- Moreau Georges
   (1, 9),   -- Rousseau Isabelle
   (1, 13);  -- Morel Marie

-- Candidatures pour l'annonce 2 (Pâtissier en CDD, requerant 2 ans d'experience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (2, 2),   -- Martin Benoit
   (2, 10),  -- Faure Karine
   (2, 12),  -- Blanc Louis
   (2, 14),  -- Girard Nathalie
   (2, 18),  -- Renaud Sabine
   (2, 20);  -- Schmitt Ursule

-- Candidatures pour l'annonce 3 (Chef Boulanger en CDI, requerant 5 ans d'experience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (3, 3),   -- Dupont Claire
   (3, 8),   -- Simon Helene
   (3, 11),  -- Faure Karine
   (3, 13),  -- Morel Marie
   (3, 16),  -- Lemoine Pauline
   (3, 17);  -- Perrin Quentin

-- Candidatures pour l'annonce 4 (Vendeur en CDD, requerant 1 an d'experience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (4, 4),   -- Bernard David
   (4, 6),   -- Leroy François
   (4, 12),  -- Blanc Louis
   (4, 15),  -- Andre Olivier
   (4, 19),  -- Benoit Thomas
   (4, 21);  -- Colin Victor

-- Candidatures pour l'annonce 5 (Caissier en CDI, requerant 4 ans d'experience)
INSERT INTO candidature_in_annonce (id_annonce, id_candidature)
VALUES
   (5, 7),   -- Moreau Georges
   (5, 9),   -- Rousseau Isabelle
   (5, 14),  -- Girard Nathalie
   (5, 16),  -- Lemoine Pauline
   (5, 20);  -- Schmitt Ursule


INSERT INTO experience_travail (id_travail, id_candidature, duree)
VALUES
   (1, 1, 2),   -- Durand Alice, Boulanger, 2 ans d'experience
   (2, 2, 3),   -- Martin Benoit, Pâtissier, 3 ans d'experience
   (3, 3, 4),   -- Dupont Claire, Chef Boulanger, 4 ans d'experience
   (4, 4, 1),   -- Bernard David, Vendeur, 1 an d'experience
   (5, 5, 3),   -- Petit Elise, Caissier, 3 ans d'experience
   (1, 6, 5),   -- Leroy François, Boulanger, 5 ans d'experience
   (2, 7, 2),   -- Moreau Georges, Pâtissier, 2 ans d'experience
   (3, 8, 3),   -- Simon Helene, Chef Boulanger, 3 ans d'experience
   (4, 9, 1),   -- Rousseau Isabelle, Vendeur, 1 an d'experience
   (5, 10, 4),  -- Garnier Julien, Caissier, 4 ans d'experience
   (1, 11, 3),  -- Faure Karine, Boulanger, 3 ans d'experience
   (2, 12, 2),  -- Blanc Louis, Pâtissier, 2 ans d'experience
   (3, 13, 5),  -- Morel Marie, Chef Boulanger, 5 ans d'experience
   (4, 14, 1),  -- Girard Nathalie, Vendeur, 1 an d'experience
   (5, 15, 4),  -- Andre Olivier, Caissier, 4 ans d'experience
   (1, 16, 2),  -- Lemoine Pauline, Boulanger, 2 ans d'experience
   (2, 17, 3),  -- Perrin Quentin, Pâtissier, 3 ans d'experience
   (3, 18, 4),  -- Renaud Sabine, Chef Boulanger, 4 ans d'experience
   (4, 19, 1),  -- Benoit Thomas, Vendeur, 1 an d'experience
   (5, 20, 2),  -- Schmitt Ursule, Caissier, 2 ans d'experience
   (1, 21, 3),  -- Colin Victor, Boulanger, 3 ans d'experience
   (2, 22, 4),  -- Renard Wendy, Pâtissier, 4 ans d'experience
   (3, 23, 5),  -- Leclerc Xavier, Chef Boulanger, 5 ans d'experience
   (4, 24, 2);  -- Martinez Yvonne, Vendeur, 2 ans d'experience

-- ========================================================





INSERT INTO test (date_test, id_candidature)
VALUES
   ('2024-03-15', 1),
   ('2024-03-16', 3),
   ('2024-03-17', 5),
   ('2024-03-18', 7),
   ('2024-03-19', 10),
   ('2024-03-20', 12),
   ('2024-03-21', 15),
   ('2024-03-22', 18),
   ('2024-03-23', 20),
   ('2024-03-24', 22);

INSERT INTO resultat_test (date_resultat_test, note, id_test)
VALUES
   ('2024-03-30', 85.50, 1),
   ('2024-03-31', 72.00, 2),
   ('2024-04-01', 90.75, 3),
   ('2024-04-02', 68.25, 4),
   ('2024-04-03', 88.00, 5),
   ('2024-04-04', 76.50, 6),
   ('2024-04-05', 93.00, 7),
   ('2024-04-06', 81.75, 8),
   ('2024-04-07', 78.50, 9),
   ('2024-04-07', 98.50, 10);
   
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

   -- Notifications pour Durand (id_candidature = 1)
INSERT INTO notification (date_notification, vu, id_candidature, id_annonce, id_test, id_resultat_test, id_rendez_vous)
VALUES
('2024-11-01', FALSE, 1, 1, NULL, NULL, NULL), -- Notification pour une annonce
('2024-11-02', TRUE, 1, 2, NULL, NULL, NULL), -- Notification vue pour une autre annonce
('2024-11-03', FALSE, 1, NULL, 1, NULL, NULL), -- Notification pour un test
('2024-11-04', TRUE, 1, NULL, NULL, 1, NULL), -- Notification vue pour un resultat de test
('2024-11-05', FALSE, 1, NULL, NULL, NULL, 1), -- Notification pour un rendez-vous
('2024-11-06', TRUE, 1, 3, 2, NULL, NULL), -- Notification vue pour une annonce et un test
('2024-11-07', FALSE, 1, NULL, NULL, 2, NULL), -- Notification pour un autre resultat de test
('2024-11-08', TRUE, 1, NULL, NULL, NULL, 2); -- Notification vue pour un autre rendez-vous



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

INSERT INTO personnel (nom, prenom, date_naissance, id_poste)
VALUES
   ('Durand', 'Sophie', '1987-05-10', 1),    -- Boulanger
   ('Faure', 'Laurent', '1990-08-20', 2),    -- Pâtissier
   ('Garnier', 'eric', '1992-04-05', 3),     -- Chef Boulanger
   ('Lemoine', 'Cecile', '1989-01-11', 4),   -- Vendeur
   ('Moreau', 'Antoine', '1994-07-30', 5),   -- Caissier
   ('Rousseau', 'Lucie', '1988-12-18', 6),   -- Apprenti Boulanger
   ('Benoit', 'Michel', '1985-11-22', 7),    -- Responsable de Production
   ('Renaud', 'Amandine', '1990-03-14', 8),  -- Responsable des Ventes
   ('Blanc', 'Cedric', '1993-06-08', 9),     -- Preparateur de Commandes
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
   ('2024-09-01', '2025-08-31', NULL, 9, 2, 9),    -- Preparateur de Commandes en CDD
   ('2024-10-01', NULL, NULL, 10, 1, 10);  -- Livreur en CDI




INSERT INTO reponse_simulation (reponse) VALUES 
('Oui, absolument.'),
('Non, pas du tout.'),
('Peut-etre, cela depend des circonstances.'),
('Je ne suis pas sur, mais cest possible.'),
('Certainement pas, cest hors de question.'),
('Je suis daccord avec cette affirmation.'),
('Cela necessite une analyse plus approfondie.'),
('Il est peu probable que cela arrive.'),
('Cest une excellente idee.'),
('Je pense que cela pourrait fonctionner.'),
('Cela semble trop risque.'),
('Oui, mais avec des conditions specifiques.'),
('Non, ce nest pas faisable actuellement.'),
('Il faudrait poser cette question à un expert.'),
('Cest un scenario realiste.'),
('Nous devrions explorer cette option.'),
('Je ne pense pas que ce soit necessaire.'),
('Cela depend de plusieurs facteurs.'),
('Absolument pas.'),
('Cest une possibilite que nous pouvons envisager.');

INSERT INTO question_simulation (question, id_reponse_simulation) VALUES 
('Pensez-vous que cette methode est efficace ?', 1),
('Est-il possible que cette solution ne fonctionne pas ?', 2),
('Cette alternative est-elle envisageable ?', 3),
('Les resultats pourraient-ils varier selon les cas ?', 4),
('Devons-nous exclure completement cette option ?', 5),
('Cette approche garantit-elle des resultats fiables ?', 6),
('Quels sont les risques associes à cette solution ?', 7),
('Est-il peu probable que cela echoue ?', 8),
('Pouvez-vous confirmer que cest une excellente idee ?', 9),
('Est-ce une solution viable à long terme ?', 10),
('Cela pourrait-il etre trop risque ?', 11),
('Y a-t-il des conditions pour que cela fonctionne ?', 12),
('Est-ce faisable dans le contexte actuel ?', 13),
('Devons-nous consulter un expert avant de decider ?', 14),
('Cela represente-t-il un scenario realiste ?', 15),
('Cette option merite-t-elle detre exploree ?', 16),
('Pouvons-nous eviter completement cette decision ?', 17),
('Quels facteurs influencent cette possibilite ?', 18),
('Devons-nous considerer cela comme totalement exclu ?', 19),
('Est-ce une possibilite serieuse ?', 20),
('Quels sont les avantages de cette approche ?', 1),
('Cette solution comporte-t-elle des inconvenients ?', 2),
('La mise en œuvre est-elle simple ?', 3),
('Est-ce une methode eprouvee ?', 4),
('Comment pouvons-nous mesurer le succes ?', 5),
('Cette strategie est-elle innovante ?', 6),
('Cela a-t-il dejà ete teste ailleurs ?', 7),
('Quels sont les couts impliques ?', 8),
('Pouvons-nous minimiser les risques ?', 9),
('Ce processus est-il scalable ?', 10),
('Les parties prenantes soutiendront-elles cette idee ?', 11),
('Cette hypothese est-elle validee par des donnees ?', 12),
('Pouvons-nous adapter cette solution à nos besoins ?', 13),
('Cela necessite-t-il une formation speciale ?', 14),
('Quels sont les impacts à court terme ?', 15),
('Cela ameliore-t-il les performances globales ?', 16),
('Cette methode est-elle conforme aux normes ?', 17),
('Quels benefices apporte-t-elle à nos clients ?', 18),
('Cela garantit-il une satisfaction accrue ?', 19),
('Pouvons-nous prevoir les defis potentiels ?', 20),
('Cette action peut-elle avoir des effets indesirables ?', 1),
('Les resultats sont-ils alignes avec nos objectifs ?', 2),
('Est-ce une solution economiquement viable ?', 3),
('Cette decision aura-t-elle un impact positif ?', 4),
('Devons-nous impliquer toutes les equipes dans ce projet ?', 5),
('Ce modele est-il durable ?', 6),
('Quels sont les retours dexperience disponibles ?', 7),
('La mise en place est-elle realisable à court terme ?', 8),
('Cette demarche favorise-t-elle linnovation ?', 9),
('Les outils actuels permettent-ils cette solution ?', 10),
('Cette strategie est-elle competitive ?', 11),
('Pouvons-nous anticiper les objections possibles ?', 12),
('Cette hypothese est-elle coherente avec nos donnees ?', 13),
('Cette solution necessite-t-elle un pilote avant deploiement ?', 14),
('Quels criteres doivent etre respectes pour reussir ?', 15),
('Quels sont les points de vigilance à surveiller ?', 16),
('Cette approche est-elle adaptee à notre secteur ?', 17),
('Cela necessite-t-il des ressources importantes ?', 18),
('Les delais sont-ils compatibles avec nos attentes ?', 19),
('Est-ce une decision alignee avec nos valeurs ?', 20);

INSERT INTO reponses_question (id_question_simulation, id_reponse_simulation) VALUES
(1, 1),
(1, 12),
(2, 2),
(2, 18),
(3, 3),
(3, 20),
(4, 4),
(4, 18),
(5, 5),
(5, 19),
(6, 6),
(6, 15),
(7, 7),
(7, 16),
(8, 8),
(8, 9),
(9, 9),
(9, 10),
(10, 10),
(10, 3),
(11, 11),
(11, 5),
(12, 12),
(12, 16),
(13, 13),
(13, 18),
(14, 14),
(14, 6),
(15, 15),
(15, 7),
(16, 16),
(16, 11),
(17, 17),
(17, 18),
(18, 18),
(18, 12),
(19, 19),
(19, 20),
(20, 20),
(20, 1),
(20, 2),
(21, 7),
(21, 8),
(22, 9),
(22, 10),
(23, 11),
(23, 12),
(24, 13),
(24, 14),
(25, 15),
(25, 16),
(26, 17),
(26, 18),
(27, 19),
(27, 20),
(28, 1),
(28, 2),
(29, 3),
(29, 4),
(30, 5),
(30, 6),
(31, 7),
(31, 8),
(32, 9),
(32, 10),
(33, 11),
(33, 12),
(34, 13),
(34, 14),
(35, 15),
(35, 16),
(36, 17),
(36, 18),
(37, 19),
(37, 20),
(38, 1),
(38, 2),
(39, 3),
(39, 4),
(40, 5),
(40, 6),
(41, 7),
(41, 8),
(42, 9),
(42, 10),
(43, 11),
(43, 12),
(44, 13),
(44, 14),
(45, 15),
(45, 16),
(46, 17),
(46, 18),
(47, 19),
(47, 20),
(48, 1),
(48, 2),
(49, 3),
(49, 4),
(50, 5),
(50, 6),
(51, 7),
(51, 8),
(52, 9),
(52, 10),
(53, 11),
(53, 12),
(54, 13),
(54, 14),
(55, 15),
(55, 16),
(56, 17),
(56, 18),
(57, 19),
(57, 20),
(58, 1),
(58, 2),
(59, 3),
(59, 4),
(60, 5),
(60, 6);

