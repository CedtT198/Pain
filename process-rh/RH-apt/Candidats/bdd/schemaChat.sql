    -- drop database chatTest;
    -- create database chatTest;
    -- use chatTest;

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

    CREATE TABLE conversation(
        id INT PRIMARY KEY AUTO_INCREMENT,
        message VARCHAR(255) NOT NULL,
        isChat BOOLEAN NOT NULL,
        id_domaine INT NOT NULL,
        id_candidature INT NOT NULL,
        FOREIGN KEY (id_candidature) REFERENCES candidature(id_candidature),
        FOREIGN KEY (id_domaine) REFERENCES domaine(id)
    )ENGINE=InnoDB;

    -- Insertion des donnees dans la table 'domaine'
    INSERT INTO domaine (id, nom) VALUES
    (1, 'Recrutement'),
    (2, 'Formation'),
    (3, 'Gestion des Talents');

    -- Insertion des donnees dans la table 'mot_cle'
    INSERT INTO mot_cle (id, nom, id_domaine) VALUES
    (1, 'Entretien', 1),
    (2, 'CV', 1),
    (3, 'Formation continue', 2),
    (4, 'Plan de carriere', 3);

    -- Insertion des donnees dans la table 'synonymes'
    INSERT INTO synonymes (id, nom, id_mot_cle) VALUES
    (1, 'Interview', 1),
    (2, 'Curriculum Vitae', 2),
    (3, 'Apprentissage', 3),
    (4, 'Developpement professionnel', 3),
    (5, 'Projection de carriere', 4);

    -- Insertion des donnees dans la table 'reponse'
    INSERT INTO reponse (id, reponse_to_mot_cle, id_mot_cle) VALUES
    (1, 'Preparez-vous bien a lentretien en recherchant des informations sur lentreprise.', 1),
    (2, 'Un CV doit être clair, precis et adapte a loffre.', 2),
    (3, 'La formation continue aide a maintenir et a ameliorer vos competences.', 3),
    (4, 'Le plan de carriere permet de definir les etapes pour atteindre vos objectifs professionnels.', 4);
