DROP DATABASE pain;
CREATE DATABASE pain;
USE pain;
CREATE TABLE type_charge(
   id_type_charge INT,
   nom_type_charge VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_type_charge)
);

CREATE TABLE nature(
   id_nature INT,
   nom_nature VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_nature)
);

CREATE TABLE unite_oeuvre(
   id_unite_oeuvre INT,
   nom_unite_oeuvre VARCHAR(50)  NOT NULL,
   abreviation VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_unite_oeuvre)
);

CREATE TABLE rubrique(
   id_rubrique INT,
   nom_rubrique VARCHAR(50)  NOT NULL,
   id_unite_oeuvre INT NOT NULL,
   PRIMARY KEY(id_rubrique),
   FOREIGN KEY(id_unite_oeuvre) REFERENCES unite_oeuvre(id_unite_oeuvre)
);

CREATE TABLE charge(
   id_charge INT,
   unite INT NOT NULL,
   montant DECIMAL(15,2)   NOT NULL,
   date_charge DATE NOT NULL,
   id_type_charge INT NOT NULL,
   id_rubrique INT NOT NULL,
   id_nature INT NOT NULL,
   PRIMARY KEY(id_charge),
   FOREIGN KEY(id_type_charge) REFERENCES type_charge(id_type_charge),
   FOREIGN KEY(id_rubrique) REFERENCES rubrique(id_rubrique),
   FOREIGN KEY(id_nature) REFERENCES nature(id_nature)
);

CREATE TABLE centre(
   id_centre INT,
   nom_centre VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_centre)
);

CREATE TABLE repartition_centre(
   id_repartition INT,
   taux DECIMAL(15,2)   NOT NULL,
   id_centre INT NOT NULL,
   id_charge INT NOT NULL,
   PRIMARY KEY(id_repartition),
   FOREIGN KEY(id_centre) REFERENCES centre(id_centre),
   FOREIGN KEY(id_charge) REFERENCES charge(id_charge)
);

CREATE TABLE input_stock(
   id_input_stock INT,
   quantite INT NOT NULL,
   data_input DATE NOT NULL,
   PRIMARY KEY(id_input_stock)
);

CREATE TABLE output_stock(
   id_output_stock INT,
   quantite INT NOT NULL,
   data_output DATE NOT NULL,
   PRIMARY KEY(id_output_stock)
);

CREATE TABLE departement(
   id_departement INT,
   nom_departement VARCHAR(50)  NOT NULL,
   mdp_departement VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_departement)
);

CREATE TABLE fournisseur(
   id_fournisseur INT,
   nom_fournisseur VARCHAR(50)  NOT NULL,
   attribution INT NOT NULL,
   PRIMARY KEY(id_fournisseur)
);

CREATE TABLE produit_stock(
   id_produit_stock INT,
   nom_produit VARCHAR(50)  NOT NULL,
   montant DECIMAL(15,2)   NOT NULL,
   PRIMARY KEY(id_produit_stock)
);

CREATE TABLE attestation(
   id_attestation INT,
   date_attestation DATE NOT NULL,
   libelle VARCHAR(50)  NOT NULL,
   accepte BOOLEAN,
   id_fournisseur INT NOT NULL,
   PRIMARY KEY(id_attestation),
   FOREIGN KEY(id_fournisseur) REFERENCES fournisseur(id_fournisseur)
);

CREATE TABLE produit(
   id_produit INT,
   nom_produit VARCHAR(50)  NOT NULL,
   montant DECIMAL(15,2)   NOT NULL,
   PRIMARY KEY(id_produit)
);

CREATE TABLE demande_besoin(
   id_demande_besoin INT,
   description VARCHAR(50)  NOT NULL,
   quantite INT NOT NULL,
   accepte BOOLEAN NOT NULL,
   id_centre INT NOT NULL,
   PRIMARY KEY(id_demande_besoin),
   FOREIGN KEY(id_centre) REFERENCES centre(id_centre)
);

CREATE TABLE type_attestation(
   id_type_attestation INT,
   nom_attestation VARCHAR(50)  NOT NULL,
   id_attestation INT NOT NULL,
   PRIMARY KEY(id_type_attestation),
   FOREIGN KEY(id_attestation) REFERENCES attestation(id_attestation)
);

CREATE TABLE produitInFournisseur(
   id_fournisseur INT,
   id_produit INT,
   PRIMARY KEY(id_fournisseur, id_produit),
   FOREIGN KEY(id_fournisseur) REFERENCES fournisseur(id_fournisseur),
   FOREIGN KEY(id_produit) REFERENCES produit(id_produit)
);

CREATE TABLE produitsInAttestation(
   id_attestation INT,
   id_produit INT,
   PRIMARY KEY(id_attestation, id_produit),
   FOREIGN KEY(id_attestation) REFERENCES attestation(id_attestation),
   FOREIGN KEY(id_produit) REFERENCES produit(id_produit)
);

CREATE TABLE produitInDemandeBesoin(
   id_produit INT,
   id_demande_besoin INT,
   PRIMARY KEY(id_produit, id_demande_besoin),
   FOREIGN KEY(id_produit) REFERENCES produit(id_produit),
   FOREIGN KEY(id_demande_besoin) REFERENCES demande_besoin(id_demande_besoin)
);


INSERT INTO unite_oeuvre (nom_unite_oeuvre, abreviation) VALUES
("Kilogramme", "Kg"),
("Litre", "L"),
("Nombre", "Nb"),
("Kilowatt", "KW"),
("Piece", "Pc"),
("Cons periodique", "CP");

INSERT INTO rubrique (id_rubrique, nom_rubrique, id_unite_oeuvre) VALUES 
(null, "Achat farine", 1),
(null, "Achat emballage", 3),
(null, "Eau et electricite", 4),
(null, "Telephone", 5);

INSERT INTO charge (id_nature, id_rubrique, id_type, unite, montant, date_charge) VALUES
(1, 1, 1, 1, 2000, '2024-10-20'),
(1, 2, 3, 1, 100000, '2024-10-31');

INSERT INTO repartition_centre (id_repartition, id_charge, id_centre, taux) VALUES
(null, 1, 1, 100),
(null, 1, 2, 0),
(null, 1, 3, 0),
(null, 1, 4, 0),
(null, 2, 1, 0),
(null, 2, 2, 50),
(null, 2, 3, 50),
(null, 2, 4, 0);

INSERT INTO type_charge (id_type_charge,nom_type_charge) VALUES 
(null,"Corporable"),
(null,"Incorporable"),
(null,"Suppletive");

INSERT INTO nature (id_nature,nom_nature) VALUES
(null, "Variable"),
(null, "Fixe");

INSERT INTO centre VALUES
(null, "Courses"),
(null, "Usine"),
(null, "Administration"),
(null, "Livraison"),
(null, "Achat"),
(null, "Finance");


SELECT rubrique.*  FROM rubrique JOIN unite_oeuvre on rubrique.id_unite_oeuvre=unite_oeuvre.id_unite_oeuvre;
SELECT * FROM rubrique JOIN charge ON rubrique.id_rubrique=charge.id_rubrique; 


CREATE OR REPLACE VIEW v_rubrique AS
SELECT rubrique.id_rubrique as id_r,
                rubrique.nom_rubrique as nom_r,
                unite_oeuvre.nom_unite_oeuvre as nom_u,
                unite_oeuvre.abreviation as abreviation_u
FROM 
                rubrique
JOIN 
                unite_oeuvre
ON 
                rubrique.id_unite_oeuvre=unite_oeuvre.id_unite_oeuvre;




SELECT 
    charge.*,
    nature.nom_nature 
FROM 
    charge
JOIN 
    nature
ON 
    charge.id_nature=nature.id_nature;




CREATE OR REPLACE
VIEW    
    charge_1 
AS SELECT 
    charge.*,
    nature.nom_nature 
FROM 
    charge
JOIN 
    nature
ON 
    charge.id_nature=nature.id_nature;


CREATE or REPLACE VIEW charge_2 AS
SELECT 
    charge_1.*,
    type_charge.nom_type_charge 
FROM 
    charge_1 
JOIN
    type_charge
ON
    charge_1.id_type=type_charge.id_type_charge;


    CREATE OR REPLACE VIEW charge_3 AS
    SELECT 
        charge_2.*,
        v_rubrique.nom_r as rubrique,
        v_rubrique.nom_u as unite_oeuvre,
        v_rubrique.abreviation_u as abreviation_unite_oeuvre
    FROM 
        charge_2
    JOIN 
        v_rubrique
    ON 
        charge_2.id_rubrique=v_rubrique.id_r;


CREATE OR REPLACE VIEW charge_4 AS
        SELECT 
            charge_3.*,
            repartition_centre.id_charge as charge_in_repartition,
            repartition_centre.id_centre,
            taux
        FROM
            charge_3
        JOIN
            repartition_centre
        ON
            charge_3.id_charge=repartition_centre.id_charge;

CREATE OR REPLACE VIEW v_depense AS
SELECT charge_4.* , nom_centre FROM charge_4 JOIN centre ON centre.id_centre=charge_4.id_centre;



SELECT 
    id_charge,
    rubrique,
    unite_oeuvre,
    montant,
    nom_nature,
    nom_type_charge,
    unite

FROM 
    v_depense
GROUP BY id_charge;

CREATE OR REPLACE view v_repartition as 
SELECT 
    id_charge,
    MAX(CASE WHEN centre.nom_centre = 'courses' THEN taux ELSE 0 END) AS 'courses',
    MAX(CASE WHEN centre.nom_centre = 'usine' THEN taux ELSE 0 END) AS 'usine',
    MAX(CASE WHEN centre.nom_centre = 'administration' THEN taux ELSE 0 END) AS 'administration',
    MAX(CASE WHEN centre.nom_centre = 'livraison' THEN taux ELSE 0 END) AS 'livraison'
FROM 
    repartition_centre 
JOIN 
    centre ON repartition_centre.id_centre = centre.id_centre
GROUP BY 
    id_charge;

CREATE OR REPLACE VIEW v_all_charge AS
select 
    charge_3.*,
    v_repartition.courses,
    v_repartition.usine,
    v_repartition.administration,
    v_repartition.livraison
from 
    charge_3 
JOIN 
    v_repartition 
ON 
    charge_3.id_charge=v_repartition.id_charge;

CREATE OR REPLACE VIEW total_montant AS
select
    sum(montant) as t_montant
from v_all_charge; 

CREATE OR Replace VIEW v_total as  
SELECT 
    id_nature,
    nom_nature,
    SUM(montant) as montant,
    SUM((courses*montant)/100) as t_courses,
    SUM((usine*montant)/100) as t_usine ,
    SUM((administration*montant)/100) as t_administration ,
    SUM((livraison*montant)/100) as t_livraison
FROM 
    v_all_charge
GROUP BY id_nature;

-- Total des variables et fixe par centre 
CREATE OR Replace VIEW v_total_join as  
SELECT 
    n.id_nature,
    n.nom_nature,
    IFNULL(v.montant, 0) AS montant,
    IFNULL(v.t_courses, 0) AS t_courses,
    IFNULL(v.t_usine, 0) AS t_usine,
    IFNULL(v.t_administration, 0) AS t_administration,
    IFNULL(v.t_livraison, 0) AS t_livraison
FROM 
    nature n
LEFT JOIN 
    v_total v ON n.id_nature = v.id_nature;


CREATE OR REPLACE VIEW total_nature AS
SELECT 
    n.id_nature,
    n.nom_nature,
    IFNULL(
        SUM(
            IFNULL(v.t_courses, 0) +
            IFNULL(v.t_usine, 0) +
            IFNULL(v.t_administration, 0) +
            IFNULL(v.t_livraison, 0)
        ), 0
    ) AS total
FROM 
    nature n
LEFT JOIN 
    v_total v ON n.id_nature = v.id_nature
GROUP BY 
    n.id_nature;


create or replace view total_repart AS
select 
    SUM(t_courses) as s_courses,
    SUM(t_usine) as s_usine,
    SUM(t_administration) as s_administration,
    SUM(t_livraison) as s_livraison
from 
    v_total;


-- CREATE OR REPLACE VIEW total_nature
-- AS
-- SELECT 
--      id_nature,
--      nom_nature,
--     SUM(t_courses+t_usine+t_administration+t_livraison) as total 
-- FROM 
--     v_total;


-- CREATE OR REPLACE VIEW stock_restant AS
-- SELECT 
--     IFNULL(SUM(i.quantite), 0) - IFNULL(SUM(o.quantite), 0) AS stock_restant
-- FROM 
--     (SELECT quantite FROM input_stock WHERE date_input <= '2024-10-14') i
-- JOIN 
--     (SELECT quantite FROM output_stock WHERE date_output <= '2024-10-14') o;

CREATE OR REPLACE VIEW stock_restant AS
SELECT 
    (COALESCE(SUM(i.quantite), 0) - COALESCE(SUM(o.quantite), 0)) AS stock_restant
FROM 
    input_stock i
LEFT JOIN 
    output_stock o ON 1 = 1;