-- Création de la base de données
CREATE DATABASE IF NOT EXISTS aprodej;
USE aprodej;

-- Table des projets
CREATE TABLE IF NOT EXISTS projets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    lieu VARCHAR(150) NOT NULL,
    date_projet DATE NOT NULL,
    description TEXT
) ENGINE=InnoDB;

-- Table des employés (actuels ou anciens)
CREATE TABLE IF NOT EXISTS employes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    fonction VARCHAR(150) NOT NULL,
    membre_fondateur BOOLEAN DEFAULT FALSE,
    membre_adherent BOOLEAN DEFAULT FALSE,
    ville_service VARCHAR(150) NOT NULL,
    date_embauche DATE NOT NULL,
    date_depart DATE NULL,  -- champ ajouté pour les anciens employés
    statut ENUM('actif', 'ancien') DEFAULT 'actif',  -- état actuel de l'employé
    photo VARCHAR(255) DEFAULT 'images/default.png'  -- chemin de la photo
) ENGINE=InnoDB;

-- Table de liaison entre employés et projets (relation plusieurs-à-plusieurs)
CREATE TABLE IF NOT EXISTS employe_projet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employe_id INT NOT NULL,
    projet_id INT NOT NULL,
    date_affectation DATE NOT NULL,
    role_dans_projet VARCHAR(150),
    FOREIGN KEY (employe_id) REFERENCES employes(id) ON DELETE CASCADE,
    FOREIGN KEY (projet_id) REFERENCES projets(id) ON DELETE CASCADE
) ENGINE=InnoDB;