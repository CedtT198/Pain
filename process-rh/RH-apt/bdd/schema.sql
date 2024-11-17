use pain;

DROP TABLE mot_cle_reponse; 
DROP TABLE simulation_questions; 
DROP TABLE reponses_question; 
DROP TABLE mot_cle_domaine; 
DROP TABLE experience_travail; 
DROP TABLE candidature_in_annonce;
DROP TABLE resultat_simulation;  
DROP TABLE question_simulation;  
DROP TABLE notification;  
DROP TABLE annonce;  
DROP TABLE simulation; 
DROP TABLE reponse_simulation; 
DROP TABLE mot_cle; 
DROP TABLE domaine; 
DROP TABLE reponses_chatbot; 
DROP TABLE demande_besoin_rh; 
DROP TABLE contrat; 
DROP TABLE personnel; 
DROP TABLE rendez_vous; 
DROP TABLE resultat_test; 
DROP TABLE test; 
DROP TABLE candidature; 
DROP TABLE diplome; 
DROP TABLE travail; 
DROP TABLE type_contrat;
DROP TABLE poste; 
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

CREATE TABLE poste(
   id_poste INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_poste)
);

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

CREATE TABLE personnel(
   id_personnel INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   date_naissance DATE NOT NULL,
   id_poste INT NOT NULL,
   PRIMARY KEY(id_personnel),
   FOREIGN KEY(id_poste) REFERENCES poste(id_poste)
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

CREATE TABLE resultat_test(
   id_resultat_test INT AUTO_INCREMENT,
   date_resultat_test DATE NOT NULL,
   note DECIMAL(15,2)   NOT NULL,
   id_test INT NOT NULL,
   PRIMARY KEY(id_resultat_test),
   FOREIGN KEY(id_test) REFERENCES test(id_test)
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

CREATE TABLE reponses_chatbot(
   id_reponses_chatbot INT AUTO_INCREMENT,
   texte VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_reponses_chatbot)
);

CREATE TABLE domaine(
   id_domaine INT AUTO_INCREMENT,
   nom_domaine VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_domaine)
);

CREATE TABLE mot_cle(
   id_mot_cle INT AUTO_INCREMENT,
   mot VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_mot_cle)
);

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

CREATE TABLE mot_cle_domaine(
   id_domaine INT,
   id_mot_cle INT,
   PRIMARY KEY(id_domaine, id_mot_cle),
   FOREIGN KEY(id_domaine) REFERENCES domaine(id_domaine),
   FOREIGN KEY(id_mot_cle) REFERENCES mot_cle(id_mot_cle)
);

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

CREATE TABLE mot_cle_reponse(
   id_reponses_chatbot INT,
   id_mot_cle INT,
   PRIMARY KEY(id_reponses_chatbot, id_mot_cle),
   FOREIGN KEY(id_reponses_chatbot) REFERENCES reponses_chatbot(id_reponses_chatbot),
   FOREIGN KEY(id_mot_cle) REFERENCES mot_cle(id_mot_cle)
);



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

