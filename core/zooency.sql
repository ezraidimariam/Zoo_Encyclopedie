
CREATE DATABASE zooency;


CREATE TABLE habitats (
    IdHab INT AUTO_INCREMENT PRIMARY KEY,
    NomHab VARCHAR(50) NOT NULL,
    Description_Hab TEXT
);


CREATE TABLE animals (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Type_alimentaire ENUM('Carnivore', 'Herbivore', 'Omnivore') NOT NULL,
    Image VARCHAR(255),
    IdHab INT,
    FOREIGN KEY (IdHab) REFERENCES habitats(IdHab) ON DELETE SET NULL
);


INSERT INTO habitats (NomHab, Description_Hab)
VALUES
('Savane', 'Habitat avec herbes hautes et quelques arbres'),
('Jungle', 'Forêt dense avec beaucoup de végétation et animaux'),
('Désert', 'Région aride avec peu d’eau'),
('Océan', 'Grande étendue d’eau salée avec faune marine');


INSERT INTO animals (Nom, Type_alimentaire, Image, IdHab)
VALUES
('Lion', 'Carnivore', 'lion.jpg', 1),
('Éléphant', 'Herbivore', 'elephant.jpg', 1),
('Singe', 'Omnivore', 'singe.jpg', 2),
('Requin', 'Carnivore', 'requin.jpg', 4),
('Chameau', 'Herbivore', 'chameau.jpg', 3);


-- Afficher tous les animaux avec habitat
SELECT a.ID, a.Nom, a.Type_alimentaire, a.Image, h.NomHab
FROM animals a
LEFT JOIN habitats h ON a.IdHab = h.IdHab;
 


-- Modifier le type alimentaire d'un animal
UPDATE animals
SET Type_alimentaire = 'Omnivore'
WHERE Nom = 'Éléphant';



-- Modifier l'habitat d'un animal
UPDATE animals
SET IdHab = 2
WHERE Nom = 'Chameau';

-- Modifier un habitat
UPDATE habitats
SET Description_Hab = 'Nouvelle description'
WHERE NomHab = 'Savane';
    

-- Supprimer un animal
DELETE FROM animals
WHERE Nom = 'Singe';



-- Supprimer un habitat
DELETE FROM habitats
WHERE NomHab = 'Désert';

-- Tous les carnivores
SELECT * FROM animals
WHERE Type_alimentaire = 'Carnivore';

-- Tous les animaux d'une habitat spécifique
SELECT a.Nom, h.NomHab
FROM animals a
JOIN habitats h ON a.IdHab = h.IdHab
WHERE h.NomHab = 'Savane';


-- Nombre d'animaux par type alimentaire
SELECT Type_alimentaire, COUNT(*) AS total
FROM animals
GROUP BY Type_alimentaire;

-- Nombre d'animaux par habitat
SELECT h.NomHab, COUNT(a.ID) AS total
FROM habitats h
LEFT JOIN animals a ON a.IdHab = h.IdHab
GROUP BY h.NomHab;




