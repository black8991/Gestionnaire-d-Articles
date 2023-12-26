CREATE TABLE personns (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    password VARCHAR(255),
    email VARCHAR(100),
    type VARCHAR(20)
) ENGINE=InnoDB;



CREATE TABLE utilisateurs (
     id INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT,
   
    FOREIGN KEY (id_personne) REFERENCES personns(id)
) ENGINE=InnoDB;

CREATE TABLE administrateurs (
     id INT PRIMARY KEY AUTO_INCREMENT,
    phone VARCHAR(15),
    CIN VARCHAR(20),
    id_person INT,
    FOREIGN KEY (id_person) REFERENCES personns(id)
) ENGINE=InnoDB;

CREATE TABLE articles (
     id INT PRIMARY KEY AUTO_INCREMENT,
    articleId INT,
    titre VARCHAR(255),
    contenu TEXT,
    date_de_creation DATE,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id)
) ENGINE=InnoDB;