drop database chatTest;
create database chatTest;
use chatTest;

CREATE TABLE domaine(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE mot_cle(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    id_domaine INT NOT NULL,
    FOREIGN KEY (id_domaine) REFERENCES domaine(id)
)ENGINE=InnoDB;

CREATE TABLE synonymes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    id_mot_cle INT NOT NULL,
    FOREIGN KEY (id_mot_cle) REFERENCES mot_cle (id)
)ENGINE=InnoDB;

CREATE TABLE reponse(
    id INT PRIMARY KEY AUTO_INCREMENT,
    reponse_to_mot_cle VARCHAR(255) NOT NULL,
    id_mot_cle INT NOT NULL,
    FOREIGN KEY (id_mot_cle) REFERENCES mot_cle (id)
)ENGINE=InnoDB;

-- Insertion des données dans la table 'domaine'
INSERT INTO domaine (id, nom) VALUES
(1, 'Recrutement'),
(2, 'Formation'),
(3, 'Gestion des Talents');

-- Insertion des données dans la table 'mot_cle'
INSERT INTO mot_cle (id, nom, id_domaine) VALUES
(1, 'Entretien', 1),
(2, 'CV', 1),
(3, 'Formation continue', 2),
(4, 'Plan de carrière', 3);

-- Insertion des données dans la table 'synonymes'
INSERT INTO synonymes (id, nom, id_mot_cle) VALUES
(1, 'Interview', 1),
(2, 'Curriculum Vitae', 2),
(3, 'Apprentissage', 3),
(4, 'Développement professionnel', 3),
(5, 'Projection de carrière', 4);

-- Insertion des données dans la table 'reponse'
INSERT INTO reponse (id, reponse_to_mot_cle, id_mot_cle) VALUES
(1, 'Préparez-vous bien à l\'entretien en recherchant des informations sur l\'entreprise.', 1),
(2, 'Un CV doit être clair, précis et adapté à l\'offre.', 2),
(3, 'La formation continue aide à maintenir et à améliorer vos compétences.', 3),
(4, 'Le plan de carrière permet de définir les étapes pour atteindre vos objectifs professionnels.', 4);
