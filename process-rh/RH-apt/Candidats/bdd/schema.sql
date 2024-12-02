use pain;

-- DROP TABLE mot_cle_reponse; 
DROP TABLE contrat_avenant; 
-- DROP TABLE centre_poste; 
DROP TABLE personnel_salaire; 
DROP TABLE simulation_questions; 
DROP TABLE reponses_question; 
-- DROP TABLE mot_cle_domaine; 
DROP TABLE experience_travail; 
DROP TABLE candidature_in_annonce;
DROP TABLE conge;
DROP TABLE rupture_contrat;
DROP TABLE resultat_simulation;  
DROP TABLE question_simulation;  
DROP TABLE notification;  
DROP TABLE contrat; 
DROP TABLE personnel; 
DROP TABLE annonce;
DROP TABLE demande_besoin_rh;  
DROP TABLE poste; 
DROP TABLE avenant; 
DROP TABLE type_rupture_contrat; 
-- DROP TABLE centre; 
DROP TABLE type_conge; 
DROP TABLE salaire; 
DROP TABLE categorie_personnel;
DROP TABLE simulation; 
DROP TABLE reponse_simulation; 
-- DROP TABLE mot_cle; 
-- DROP TABLE domaine; 
DROP TABLE reponses_chatbot; 
-- DROP TABLE demande_besoin_rh;
DROP TABLE rendez_vous; 
DROP TABLE resultat_test; 
DROP TABLE test; 
DROP TABLE candidature; 
DROP TABLE diplome; 
DROP TABLE travail; 
DROP TABLE type_contrat;
-- DROP TABLE poste; 
DROP TABLE canal;
-- DROP TABLE departement;



-- CREATE TABLE departement(
--    id_departement INT AUTO_INCREMENT,
--    nom_departement VARCHAR(50)  NOT NULL,
--    mdp_departement VARCHAR(50)  NOT NULL,
--    PRIMARY KEY(id_departement)
-- );

CREATE TABLE canal(
   id_canal INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_canal)
);

-- CREATE TABLE poste(
--    id_poste INT AUTO_INCREMENT,
--    nom VARCHAR(50)  NOT NULL,
--    PRIMARY KEY(id_poste)
-- );

CREATE TABLE type_contrat(
   id_type_contrat INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_type_contrat)
);

CREATE TABLE travail(
   id_travail INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_travail)
);

CREATE TABLE diplome(
   id_diplome INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   valeur INT NOT NULL,
   PRIMARY KEY(id_diplome)
);

CREATE TABLE candidature(
   id_candidature INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   mdp VARCHAR(50)  NOT NULL,
   date_naissance DATE NOT NULL,
   id_diplome INT,
   PRIMARY KEY(id_candidature),
   FOREIGN KEY(id_diplome) REFERENCES diplome(id_diplome)
);

CREATE TABLE test(
   id_test INT AUTO_INCREMENT,
   date_test DATE NOT NULL,
   id_candidature INT NOT NULL,
   PRIMARY KEY(id_test),
   FOREIGN KEY(id_candidature) REFERENCES candidature(id_candidature)
);

CREATE TABLE rendez_vous(
   id_rendez_vous INT AUTO_INCREMENT,
   date_rendez_vous DATE NOT NULL,
   id_candidature INT NOT NULL,
   PRIMARY KEY(id_rendez_vous),
   FOREIGN KEY(id_candidature) REFERENCES candidature(id_candidature)
);

CREATE TABLE resultat_test(
   id_resultat_test INT AUTO_INCREMENT,
   date_resultat_test DATE NOT NULL,
   note DECIMAL(15,2)   NOT NULL,
   id_test INT NOT NULL,
   PRIMARY KEY(id_resultat_test),
   FOREIGN KEY(id_test) REFERENCES test(id_test)
);

CREATE TABLE reponses_chatbot(
   id_reponses_chatbot INT AUTO_INCREMENT,
   texte VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_reponses_chatbot)
);

-- CREATE TABLE domaine(
--    id_domaine INT AUTO_INCREMENT,
--    nom_domaine VARCHAR(50)  NOT NULL,
--    PRIMARY KEY(id_domaine)
-- );

-- CREATE TABLE mot_cle(
--    id_mot_cle INT AUTO_INCREMENT,
--    mot VARCHAR(50)  NOT NULL,
--    PRIMARY KEY(id_mot_cle)
-- );

CREATE TABLE reponse_simulation(
   id_reponse_simulation INT AUTO_INCREMENT,
   reponse VARCHAR(500)  NOT NULL,
   PRIMARY KEY(id_reponse_simulation)
);

CREATE TABLE simulation(
   id_simulation INT AUTO_INCREMENT,
   date_simulation DATE NOT NULL,
   PRIMARY KEY(id_simulation)
);

CREATE TABLE categorie_personnel(
   id_categorie_pesonnel INT AUTO_INCREMENT,
   nom_categorie_pesonnel VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_categorie_pesonnel)
);

CREATE TABLE salaire(
   id_salaire INT AUTO_INCREMENT,
   montant DECIMAL(15,2)   NOT NULL,
   PRIMARY KEY(id_salaire)
);

CREATE TABLE type_conge(
   id_type_conge INT AUTO_INCREMENT,
   nom_type_conge VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_type_conge)
);

-- CREATE TABLE centre(
--    id_centre INT AUTO_INCREMENT,
--    nom_centre VARCHAR(50)  NOT NULL,
--    PRIMARY KEY(id_centre)
-- );

CREATE TABLE type_rupture_contrat(
   id_type_rupture_contrat INT AUTO_INCREMENT,
   nom_type_rupture_contrat VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_type_rupture_contrat)
);

CREATE TABLE avenant(
   id_avenant INT AUTO_INCREMENT,
   date_avenant DATE NOT NULL,
   PRIMARY KEY(id_avenant)
);

CREATE TABLE poste(
   id_poste INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   id_centre INT NOT NULL,
   PRIMARY KEY(id_poste),
   FOREIGN KEY(id_centre) REFERENCES centre(id_centre)
);

CREATE TABLE demande_besoin_rh(
   id_demande_besoin INT AUTO_INCREMENT,
   date_demande DATE NOT NULL,
   id_poste INT NOT NULL,
   id_departement INT NOT NULL,
   PRIMARY KEY(id_demande_besoin),
   FOREIGN KEY(id_poste) REFERENCES poste(id_poste),
   FOREIGN KEY(id_departement) REFERENCES departement(id_departement)
);

CREATE TABLE annonce(
   id_annonce INT AUTO_INCREMENT,
   date_annonce DATE NOT NULL,
   duree_exp_requise INT NOT NULL,
   id_travail INT NOT NULL,
   id_canal INT NOT NULL,
   id_poste INT NOT NULL,
   id_type_contrat INT,
   PRIMARY KEY(id_annonce),
   FOREIGN KEY(id_travail) REFERENCES travail(id_travail),
   FOREIGN KEY(id_canal) REFERENCES canal(id_canal),
   FOREIGN KEY(id_poste) REFERENCES poste(id_poste),
   FOREIGN KEY(id_type_contrat) REFERENCES type_contrat(id_type_contrat)
);

CREATE TABLE personnel(
   id_personnel INT AUTO_INCREMENT,
   id_cnaps VARCHAR(7)  NOT NULL,
   nom VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   date_naissance DATE NOT NULL,
   date_embauche DATE NOT NULL,
   id_poste INT NOT NULL,
   id_categorie_pesonnel INT NOT NULL,
   PRIMARY KEY(id_personnel),
   FOREIGN KEY(id_poste) REFERENCES poste(id_poste),
   FOREIGN KEY(id_categorie_pesonnel) REFERENCES categorie_personnel(id_categorie_pesonnel)
);

CREATE TABLE contrat(
   id_contrat INT AUTO_INCREMENT,
   date_debut DATE NOT NULL,
   date_fin DATE,
   date_renvoie DATE,
   id_personnel INT NOT NULL,
   id_type_contrat INT NOT NULL,
   id_poste INT NOT NULL,

   PRIMARY KEY(id_contrat),
   FOREIGN KEY(id_personnel) REFERENCES personnel(id_personnel),
   FOREIGN KEY(id_type_contrat) REFERENCES type_contrat(id_type_contrat),
   FOREIGN KEY(id_poste) REFERENCES poste(id_poste)
);

CREATE TABLE notification(
   id_notification INT AUTO_INCREMENT,
   date_notification DATE NOT NULL,
   vu BOOLEAN NOT NULL,
   id_candidature INT NOT NULL,
   id_annonce INT,
   id_test INT,
   id_resultat_test INT,
   id_rendez_vous INT,
   PRIMARY KEY(id_notification),
   FOREIGN KEY(id_candidature) REFERENCES candidature(id_candidature),
   FOREIGN KEY(id_annonce) REFERENCES annonce(id_annonce),
   FOREIGN KEY(id_test) REFERENCES test(id_test),
   FOREIGN KEY(id_resultat_test) REFERENCES resultat_test(id_resultat_test),
   FOREIGN KEY(id_rendez_vous) REFERENCES rendez_vous(id_rendez_vous)
);

CREATE TABLE question_simulation(
   id_question_simulation INT AUTO_INCREMENT,
   question VARCHAR(500)  NOT NULL,
   id_reponse_simulation INT NOT NULL,
   PRIMARY KEY(id_question_simulation),
   FOREIGN KEY(id_reponse_simulation) REFERENCES reponse_simulation(id_reponse_simulation)
);

CREATE TABLE resultat_simulation(
   id_resultat_simulation INT AUTO_INCREMENT,
   score DECIMAL(15,2)   NOT NULL,
   id_simulation INT NOT NULL,
   id_candidature INT NOT NULL,
   PRIMARY KEY(id_resultat_simulation),
   FOREIGN KEY(id_simulation) REFERENCES simulation(id_simulation),
   FOREIGN KEY(id_candidature) REFERENCES candidature(id_candidature)
);

CREATE TABLE rupture_contrat(
   id_rupture_contrat INT AUTO_INCREMENT,
   date_rupture_contrat DATE NOT NULL,
   id_type_rupture_contrat INT NOT NULL,
   id_personnel INT NOT NULL,
   PRIMARY KEY(id_rupture_contrat),
   FOREIGN KEY(id_type_rupture_contrat) REFERENCES type_rupture_contrat(id_type_rupture_contrat),
   FOREIGN KEY(id_personnel) REFERENCES personnel(id_personnel)
);

CREATE TABLE droit_conge_cumule(
   id_droit_conge_cumule INT AUTO_INCREMENT PRIMARY KEY,
   id_personnel INT NOT NULL,
   droit_de_conge DECIMAL(5, 2) DEFAULT 0, -- Droits cumulés
   -- atao update io rehefa par mois na isakin aka conge dia verifier-na
   taux_accumulation DECIMAL(5, 2) DEFAULT 2.5, -- Exemple : 2.5 jours par mois
   last_update DATE,
   FOREIGN KEY (id_personnel) REFERENCES personnel(id_personnel) ON DELETE CASCADE
);

CREATE TABLE conge(
   id_conge INT AUTO_INCREMENT,
   date_debut DATE NOT NULL,
   date_fin DATE NOT NULL,
   id_type_conge INT NOT NULL,
   id_personnel INT NOT NULL,
   nb_j_conge INT NOT NULL,
   status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
   PRIMARY KEY(id_conge),
   FOREIGN KEY(id_type_conge) REFERENCES type_conge(id_type_conge),
   FOREIGN KEY(id_personnel) REFERENCES personnel(id_personnel)
);

CREATE TABLE candidature_in_annonce(
   id_annonce INT,
   id_candidature INT,
   date_candidature DATE NOT NULL,
   PRIMARY KEY(id_annonce, id_candidature),
   FOREIGN KEY(id_annonce) REFERENCES annonce(id_annonce),
   FOREIGN KEY(id_candidature) REFERENCES candidature(id_candidature)
);

CREATE TABLE experience_travail(
   id_travail INT,
   id_candidature INT,
   duree INT NOT NULL,
   PRIMARY KEY(id_travail, id_candidature),
   FOREIGN KEY(id_travail) REFERENCES travail(id_travail),
   FOREIGN KEY(id_candidature) REFERENCES candidature(id_candidature)
);

-- CREATE TABLE mot_cle_domaine(
--    id_domaine INT,
--    id_mot_cle INT,
--    PRIMARY KEY(id_domaine, id_mot_cle),
--    FOREIGN KEY(id_domaine) REFERENCES domaine(id_domaine),
--    FOREIGN KEY(id_mot_cle) REFERENCES mot_cle(id_mot_cle)
-- );

CREATE TABLE reponses_question(
   id_question_simulation INT,
   id_reponse_simulation INT,
   PRIMARY KEY(id_question_simulation, id_reponse_simulation),
   FOREIGN KEY(id_question_simulation) REFERENCES question_simulation(id_question_simulation),
   FOREIGN KEY(id_reponse_simulation) REFERENCES reponse_simulation(id_reponse_simulation)
);

CREATE TABLE simulation_questions(
   id_question_simulation INT,
   id_simulation INT,
   PRIMARY KEY(id_question_simulation, id_simulation),
   FOREIGN KEY(id_question_simulation) REFERENCES question_simulation(id_question_simulation),
   FOREIGN KEY(id_simulation) REFERENCES simulation(id_simulation)
);

CREATE TABLE personnel_salaire(
   id_personnel INT,
   id_salaire INT,
   date_salaire DATE NOT NULL,
   PRIMARY KEY(id_personnel, id_salaire),
   FOREIGN KEY(id_personnel) REFERENCES personnel(id_personnel),
   FOREIGN KEY(id_salaire) REFERENCES salaire(id_salaire)
);

CREATE TABLE contrat_avenant(
   id_contrat INT,
   id_avenant INT,
   PRIMARY KEY(id_contrat, id_avenant),
   FOREIGN KEY(id_contrat) REFERENCES contrat(id_contrat),
   FOREIGN KEY(id_avenant) REFERENCES avenant(id_avenant)
);


-- CREATE TABLE mot_cle_reponse(
--    id_reponses_chatbot INT,
--    id_mot_cle INT,
--    PRIMARY KEY(id_reponses_chatbot, id_mot_cle),
--    FOREIGN KEY(id_reponses_chatbot) REFERENCES reponses_chatbot(id_reponses_chatbot),
--    FOREIGN KEY(id_mot_cle) REFERENCES mot_cle(id_mot_cle)
-- );



-- DONNEES FIXE
-- INSERT INTO departement (id_departement, nom_departement, mdp_departement)
-- VALUES
--    (1, 'informatique', 'informatique'),
--    (2, 'administration', 'administration'),
--    (3, 'usine', 'usine');

INSERT INTO canal (nom)
VALUES
   ('LinkedIn'),
   ('Facebook'),
   ('Radio'),
   ('Pole emploi'),
   ('Television'),
   ('Journal');

INSERT INTO poste (nom, id_centre)
VALUES
   ('Boulanger', 1),
   ('Patissier', 1),
   ('Chef Boulanger', 1),
   ('Vendeur', 4),
   ('Caissier', 4),
   ('Apprenti Boulanger', 1),
   ('Responsable de Production', 3),
   ('Responsable des Ventes', 3),
   ('Preparateur de Commandes', 3),
   ('Livreur', 4);

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
   ('Commande des matieres premieres');
   -- ('Gestion des invendus'),
   -- ('Accueil des clients'),
   -- ('Conseil sur les produits'),
   -- ('Encaissement des ventes'),
   -- ('Organisation des livraisons'),
   -- ('Rangement du magasin'),
   -- ('Entretien de l espace de vente'),
   -- ('Creation de nouvelles recettes'),
   -- ('Verification des normes de securite'),
   -- ('Gestion des employes'),
   -- ('Formation des apprentis'),
   -- ('Suivi des commandes clients'),
   -- ('Preparation des commandes clients'),
   -- ('Prise de commande telephonique'),
   -- ('Gestion des reseaux sociaux');

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


INSERT INTO categorie_personnel (nom_categorie_pesonnel)
VALUES
   ('Ouvriers'),
   ('Employes'),
   ('Technicien et Agent de maitrise'),
   ('Cadres'),
   ('Dirigeants'),
   ('Hors categorie');


-- INSERT INTO centre VALUES
-- (null, "Courses"),
-- (null, "Usine"),
<<<<<<< HEAD
-- (null, "Administ²ration"),
=======
-- (null, "Administration"),
>>>>>>> ee10b292e65132b5609c0c1f6d5a8faf16c24d38
-- (null, "Livraison");



INSERT INTO type_conge VALUES
(null, "Payes"),
(null, "Sans solde"),
(null, "Speciaux"),
(null, "Maternites, paternite, adoption"),
(null, "Sabbatiques"),
(null, "Formation");



INSERT INTO type_rupture_contrat VALUES
(null, "Commun accord"),
(null, "Demission"),
(null, "Licenciement");


CREATE TABLE regles_preavis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_type_contrat INT NOT NULL,
    anciennete_min INT NOT NULL, -- en mois
    anciennete_max INT DEFAULT NULL, -- en mois, NULL pour illimité
    preavis_duree INT NOT NULL, -- en jours
    FOREIGN KEY (id_type_contrat) REFERENCES type_contrat(id_type_contrat)
);
INSERT INTO regles_preavis (id_type_contrat, anciennete_min, anciennete_max, preavis_duree)
VALUES
(3, 0, 6, 7), -- Moins de 6 mois d'ancienneté : 7 jours
(3, 6, 24, 30), -- Entre 6 mois et 2 ans : 30 jours
(3, 24, NULL, 60), -- Plus de 2 ans : 60 jours
(2, 0, NULL, 15), -- Toujours 15 jours pour CDD
(1, 0, NULL, 5); -- Toujours 5 jours pour intérim

CREATE TABLE regles_indemnites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_type_rupture_contrat INT NOT NULL,
    id_type_contrat INT NOT NULL,
    anciennete_min INT NOT NULL, -- en mois
    anciennete_max INT DEFAULT NULL, -- NULL pour illimité
    pourcentage_salaire FLOAT NOT NULL, -- % du salaire par mois d'ancienneté
    FOREIGN KEY (id_type_rupture_contrat) REFERENCES type_rupture_contrat(id_type_rupture_contrat),
    FOREIGN KEY (id_type_contrat) REFERENCES type_contrat(id_type_contrat)
);
INSERT INTO regles_indemnites (id_type_rupture_contrat, id_type_contrat, anciennete_min, anciennete_max, pourcentage_salaire)
VALUES
(3, 3, 0, 12, 10),  -- Licenciement, CDI, ancienneté < 1 an : 10% du salaire par mois
(3, 3, 12, NULL, 20); -- Licenciement, CDI, ancienneté > 1 an : 20% du salaire par mois

CREATE TABLE smig(
   id_smig INT PRIMARY KEY AUTO_INCREMENT,
   montant DECIMAL(10,2) NOT NULL,
   date_update DATE
);

INSERT INTO smig(montant, date_update) VALUES(250000, '2000-01-01');

CREATE TABLE tranche_irsa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seuil_min DECIMAL(10,2) NOT NULL, -- Limite inférieure de la tranche
    seuil_max DECIMAL(10,2),          -- Limite supérieure de la tranche (NULL si illimité)
    taux DECIMAL(5,2) NOT NULL,       -- Taux d'imposition (en %)
    montant_fixe DECIMAL(10,2) NOT NULL -- Montant fixe pour cette tranche
);

-- Insertion des données des tranches
INSERT INTO tranche_irsa (seuil_min, seuil_max, taux, montant_fixe)
VALUES
(0, 350000, 0, 0),                  -- Pas d'IRSA pour les salaires <= 350000
(350001, 400000, 5, 2500),          -- 5% entre 350001 et 400000
(400001, 500000, 10, 10000),        -- 10% entre 400001 et 500000
(500001, 600000, 15, 15000),        -- 15% entre 500001 et 600000
(600001, NULL, 20, 0);              -- 20% au-delà de 600000
