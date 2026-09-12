DROP TABLE IF EXISTS reservation_tarif;
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS creneau;
DROP TABLE IF EXISTS tarif;

CREATE TABLE tarif (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    libelle             VARCHAR(80) NOT NULL,
    prix                DECIMAL(6,2) NOT NULL,
    description         VARCHAR(255),
    mention             VARCHAR(255),
    image               VARCHAR(120),
    compte_visite       TINYINT(1) NOT NULL DEFAULT 0,
    compte_vr           TINYINT(1) NOT NULL DEFAULT 0,
    quantite_min        TINYINT UNSIGNED NOT NULL DEFAULT 1
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE creneau (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    date_heure          DATETIME NOT NULL UNIQUE,
    capacite_visite     INT UNSIGNED NOT NULL,
    capacite_vr         INT UNSIGNED NOT NULL,
    actif               TINYINT(1) NOT NULL DEFAULT 1   
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE utilisateur (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    email               VARCHAR(255) NOT NULL UNIQUE, 
    mot_de_passe        VARCHAR(255) NOT NULL,
    role                VARCHAR(20) NOT NULL DEFAULT 'ROLE_EMPLOYE'
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE reservation (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    reference           CHAR(13) NOT NULL UNIQUE,
    nom                 VARCHAR(100) NOT NULL,
    email               VARCHAR(255) NOT NULL,
    date_reservation    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    creneau_id          INT NOT NULL,
    FOREIGN KEY (creneau_id) REFERENCES creneau(id)             
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE reservation_tarif (
    reservation_id      INT NOT NULL,
    tarif_id            INT NOT NULL,
    quantite            INT UNSIGNED NOT NULL,
    PRIMARY KEY (reservation_id, tarif_id),
    FOREIGN KEY (reservation_id) REFERENCES reservation(id) ON DELETE CASCADE,
    FOREIGN KEY (tarif_id) REFERENCES tarif(id)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;