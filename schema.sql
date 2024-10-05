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
    id_repartition_centre INT PRIMARY KEY auto_increment,
    id_charge INT not null,
    id_centre INT not null,
    taux DECIMAL(15,3)
);
ALTER TABLE repartition_centre ADD FOREIGN KEY (id_charge) REFERENCES charge(id_charge); 
ALTER TABLE repartition_centre ADD FOREIGN KEY (id_centre) REFERENCES centre(id_centre); 


INSERT INTO type_charge (id_type_charge,nom_type_charge) VALUES 
(null,"Corporable"),
(null,"Incorporable"),
(null,"Suppletive");

INSERT INTO nature (id_nature,nom_nature) VALUES
(null, "Variable"),
(null, "Fixe");

INSERT INTO unite_oeuvre (nom_unite_oeuvre, abreviation) VALUES
("Kilogramme", "Kg");

INSERT INTO centre VALUES
(null, "Courses"),
(null, "Usine"),
(null, "Administration"),
(null, "Livraison");