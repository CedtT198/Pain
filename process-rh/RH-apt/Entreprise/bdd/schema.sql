-- AZA INSERENA TY FA LE ANY CANDIDAT ATAO




-- drop database pain;
-- create database pain;
use pain;

DROP TABLE salaire_personnel; 
DROP TABLE experience_travail; 
DROP TABLE candidature_in_annonce;
DROP TABLE annonce; 
DROP TABLE salaire; 
DROP TABLE categorie_personnel; 
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
   date_naissance DATE NOT NULL,
   date_candidature DATE NOT NULL,
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

CREATE TABLE resultat_test(
   id_resultat_test INT AUTO_INCREMENT,
   date_resultat_test DATE NOT NULL,
   note DECIMAL(15,2)   NOT NULL,
   id_test INT NOT NULL,
   PRIMARY KEY(id_resultat_test),
   FOREIGN KEY(id_test) REFERENCES test(id_test)
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

CREATE TABLE demande_besoin_rh(
   id_demande_besoin INT AUTO_INCREMENT,
   date_demande DATE NOT NULL,
   id_poste INT NOT NULL,
   id_departement INT NOT NULL,
   PRIMARY KEY(id_demande_besoin),
   FOREIGN KEY(id_poste) REFERENCES poste(id_poste),
   FOREIGN KEY(id_departement) REFERENCES departement(id_departement)
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

CREATE TABLE candidature_in_annonce(
   id_annonce INT,
   id_candidature INT,
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

CREATE TABLE salaire_personnel(
   id_personnel INT,
   id_salaire INT,
   date_salaire DATE NOT NULL,
   PRIMARY KEY(id_personnel, id_salaire),
   FOREIGN KEY(id_personnel) REFERENCES personnel(id_personnel),
   FOREIGN KEY(id_salaire) REFERENCES salaire(id_salaire)
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

INSERT INTO categorie_personnel (nom_categorie_pesonnel)
VALUES
   ('Ouvriers'),
   ('Employes'),
   ('Technicien et Agent de maitrise'),
   ('Cadres'),
   ('Dirigeants');

