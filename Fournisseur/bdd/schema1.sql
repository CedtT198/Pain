DROP DATABASE pain;
CREATE DATABASE pain;
USE pain;

CREATE TABLE type_charge(
    id_type_charge INT PRIMARY KEY auto_increment,
    nom_type_charge VARCHAR(255) not null
);

CREATE TABLE nature(
    id_nature INT PRIMARY KEY auto_increment,
    nom_nature VARCHAR(255) not null
);

CREATE TABLE unite_oeuvre(
    id_unite_oeuvre INT PRIMARY KEY auto_increment,
    nom_unite_oeuvre VARCHAR(255) not null,
    abreviation VARCHAR(50) not null
);

CREATE TABLE rubrique(
    id_rubrique INT PRIMARY KEY auto_increment,
    nom_rubrique VARCHAR(255) not null,
    id_unite_oeuvre INT not null
);
ALTER TABLE rubrique ADD FOREIGN KEY (id_unite_oeuvre) REFERENCES unite_oeuvre(id_unite_oeuvre); 


CREATE TABLE charge(
    id_charge INT PRIMARY KEY auto_increment,
    id_nature INT not null,
    id_rubrique INT not null,
    id_type INT not null,
    unite DECIMAL(15,5)not null,
    montant DECIMAL(15,2) not null,
    date_charge DATE not null
);

ALTER TABLE charge ADD FOREIGN KEY (id_nature) REFERENCES nature(id_nature); 
ALTER TABLE charge ADD FOREIGN KEY (id_rubrique) REFERENCES rubrique(id_rubrique); 
ALTER TABLE charge ADD FOREIGN KEY (id_type) REFERENCES type_charge(id_type_charge);


CREATE TABLE centre(
    id_centre INT PRIMARY KEY auto_increment,
    nom_centre VARCHAR(255) not null
);

CREATE TABLE repartition_centre(
    id_repartition INT not null,
    id_charge INT not null,
    id_centre INT not null,
    taux DECIMAL(15,3)
);
ALTER TABLE repartition_centre ADD FOREIGN KEY (id_charge) REFERENCES charge(id_charge); 
ALTER TABLE repartition_centre ADD FOREIGN KEY (id_centre) REFERENCES centre(id_centre); 

-- RETO STOCK DE PAIN FA TSY MATIERE PREMIERE
CREATE table input_stock(
    id_input_stock INT PRIMARY KEY auto_increment,
    quantite DECIMAL(15,2) not null,
    date_input DATE not null
);

CREATE table output_stock(
    id_output_stock INT PRIMARY KEY auto_increment,
    quantite DECIMAL(15,2) not null,
    date_output DATE not null
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
(null, "Livraison");


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











































    CREATE DATABASE jus;
USE jus;

-- creation type de charge_repartition
CREATE TABLE type_charge(
id_type_charge INT PRIMARY KEY auto_increment,
nom_type_charge VARCHAR(255) not null
);

-- creatio table nature(fixe ou variable)
CREATE TABLE nature(
    id_nature INT PRIMARY KEY auto_increment,
    nom_nature VARCHAR(255) not null
);

--CREATION TABLE unite_oeuvre
CREATE TABLE unite_oeuvre(
    id_unite_oeuvre INT PRIMARY KEY auto_increment,
    nom_unite_oeuvre VARCHAR(255) not null,
    abreviation VARCHAR(50) not null
);



-- CREATION TABLE Rubrique
CREATE TABLE rubrique(
    id_rubrique INT PRIMARY KEY auto_increment,
    nom_rubrique VARCHAR(255) not null,
    id_unite_oeuvre INT not null
);
ALTER TABLE rubrique ADD FOREIGN KEY (id_unite_oeuvre) REFERENCES unite_oeuvre(id_unite_oeuvre); 


-- creation table charge
CREATE TABLE charge(
    id_charge INT PRIMARY KEY auto_increment,
    id_nature INT not null,
    id_rubrique INT not null,
    id_type INT not null,
    unite DECIMAL(15,5)not null,
    montant DECIMAL(15,2) not null,
    date_charge DATE not null
);
ALTER TABLE charge ADD FOREIGN KEY (id_nature) REFERENCES nature(id_nature); 
ALTER TABLE charge ADD FOREIGN KEY (id_rubrique) REFERENCES rubrique(id_rubrique); 
ALTER TABLE charge ADD FOREIGN KEY (id_type) REFERENCES type_charge(id_type_charge);


-- creation table reartition
CREATE TABLE repartition(
    id_repartition INT PRIMARY KEY auto_increment,
    nom_repartition VARCHAR(255) not null
);


-- creation table liaison charge t repartition 
CREATE TABLE charge_repartition(
    id_charge_repartition INT PRIMARY KEY auto_increment,
    id_charge INT not null,
    id_repartition INT not null,
    taux DECIMAL(15,3)
);
ALTER TABLE charge_repartition ADD FOREIGN KEY (id_charge) REFERENCES charge(id_charge); 
ALTER TABLE charge_repartition ADD FOREIGN KEY (id_repartition) REFERENCES repartition(id_repartition); 



-- tables de gestion de stocks des jus
CREATE table input_stock(
    id_input_stock INT PRIMARY KEY auto_increment,
    quantite DECIMAL(15,2) not null,
    date_input DATE not null
);

CREATE table output_stock(
    id_output_stock INT PRIMARY KEY auto_increment,
    quantite DECIMAL(15,2) not null,
    date_output DATE not null
);

 

-- INSERTION DE donnee initiial
INSERT INTO type_charge (id_type_charge,nom_type_charge) VALUES 
            (null,"corporable"),
            (null,"non corporable"),
            (null,"suppletive");

INSERT INTO nature (id_nature,nom_nature) VALUES (null,"Variable"),
                                                                                                               (null,"Fixe");

INSERT INTO unite_oeuvre (nom_unite_oeuvre, abreviation)
VALUES
('Kilogramme', 'kg'),
('Litre', 'L'),
('Pièce', 'pc'),
('Mètre', 'm'),
('Heure', 'h'),
('Jour', 'j'),
('Kilowatt', 'kW'),
('Mètre cube', 'm³'),
('Tonne', 't'),
('Gramme', 'g'),
('Centimètre', 'cm'),
('Millilitre', 'ml'),
('Unité', 'u'),
('Boîte', 'bte'),
('Paquet', 'pkt');

INSERT INTO repartition VALUES (null,"Matiere Première"),
                                                                    (null,"transformation"),
                                                                    (null,"administration"),
                                                                    (null,"distribution"),
                                                                    (null,"magasin");

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
            charge_repartition.id_charge_repartition,
            charge_repartition.id_repartition,
            taux
        FROM
            charge_3
        JOIN
            charge_repartition
        ON
            charge_3.id_charge=charge_repartition.id_charge;

CREATE OR REPLACE VIEW v_depense AS
SELECT charge_4.* , nom_repartition FROM charge_4 JOIN repartition ON repartition.id_repartition=charge_4.id_repartition; 






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
    MAX(CASE WHEN repartition.nom_repartition = 'Matiere Premiere' THEN taux ELSE 0 END) AS 'Matiere_Premiere',
    MAX(CASE WHEN repartition.nom_repartition = 'transformation' THEN taux ELSE 0 END) AS 'transformation',
    MAX(CASE WHEN repartition.nom_repartition = 'administration' THEN taux ELSE 0 END) AS 'administration',
    MAX(CASE WHEN repartition.nom_repartition = 'distribution' THEN taux ELSE 0 END) AS 'distribution',
    MAX(CASE WHEN repartition.nom_repartition = 'magasin' THEN taux ELSE 0 END) AS 'magasin'
FROM 
    charge_repartition 
JOIN 
    repartition ON charge_repartition.id_repartition = repartition.id_repartition
GROUP BY 
    id_charge;

CREATE OR REPLACE VIEW v_all_charge AS
select 
    charge_3.*,
    v_repartition.Matiere_Premiere,
    v_repartition.transformation,
    v_repartition.administration,
    v_repartition.distribution,
    v_repartition.magasin 
from 
    charge_3 
JOIN 
    v_repartition 
ON 
    charge_3.id_charge=v_repartition.id_charge;

CREATE OR Replace VIEW v_total as  
SELECT 
    id_nature,
    nom_nature,
    SUM(montant) as montant,
    SUM((Matiere_Premiere*montant)/100) as t_Matiere_premiere,
    SUM((transformation*montant)/100) as t_transformation ,
    SUM((administration*montant)/100) as t_administration ,
    SUM((distribution*montant)/100) as t_distribution,
    SUM((magasin*montant)/100) as t_magasin
FROM 
    v_all_charge
GROUP BY id_nature;


CREATE OR Replace VIEW v_total_join as  
SELECT 
    n.id_nature,
    n.nom_nature,
    IFNULL(v.montant, 0) AS montant,
    IFNULL(v.t_Matiere_premiere, 0) AS t_Matiere_premiere,
    IFNULL(v.t_transformation, 0) AS t_transformation,
    IFNULL(v.t_administration, 0) AS t_administration,
    IFNULL(v.t_distribution, 0) AS t_distribution,
    IFNULL(v.t_magasin, 0) AS t_magasin
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
            IFNULL(v.t_Matiere_premiere, 0) +
            IFNULL(v.t_transformation, 0) +
            IFNULL(v.t_administration, 0) +
            IFNULL(v.t_distribution, 0) +
            IFNULL(v.t_magasin, 0)
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
    SUM(t_Matiere_Premiere) as s_matiere_premiere,
    SUM(t_transformation) as s_transformation,
    SUM(t_administration) as s_administration,
    SUM(t_distribution) as s_distribution,
     SUM(t_magasin) as s_magasin 
from 
    v_total;


CREATE OR REPLACE VIEW total_nature
AS
SELECT 
     id_nature,
     nom_nature,
    SUM(t_Matiere_Premiere+t_transformation+t_administration+t_distribution+t_magasin) as total 
FROM 
    v_total;

    SELECT SUM(montant) as montant FROM charge where id_type_charge = 2;