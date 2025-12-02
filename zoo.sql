CREATE DATABASE zoo_encycloedie;
USE zoo_encycloedie;

CREATE TABLE habitats (
    IdHab INT AUTO_INCREMENT PRIMARY KEY,
    NomHab VARCHAR(50) NOT NULL,
    Description_Hab TEXT
);


CREATE TABLE animals (
    IdAnimal INT AUTO_INCREMENT PRIMARY KEY,
    NomAnimal VARCHAR(50) NOT NULL,
    Type_alimentaire ENUM('Carnivore','Herbivore','Omnivore') NOT NULL,
    Image VARCHAR(255),
    IdHab INT,
    FOREIGN KEY (IdHab) REFERENCES habitats(IdHab) ON DELETE SET NULL
);

INSERT INTO habitats (NomHab, Description_Hab)
VALUES 
('Savane', 'Grandes plaines avec herbes et quelques arbres.'),
('Jungle', 'Forêt dense avec beaucoup de végétation.'),
('Désert', 'Région aride avec peu de végétation.'),
('Océan', 'Vaste étendue d’eau salée.');


INSERT INTO animals (NomAnimal, Type_alimentaire, Image, IdHab)
VALUES
('Lion', 'Carnivore', 'lion.jpg', 1),
('Éléphant', 'Herbivore', 'elephant.jpg', 1),
('Crocodile', 'Carnivore', 'crocodile.jpg', 4),
('Perroquet', 'Omnivore', 'perroquet.jpg', 2);

UPDATE animals
SET NomAnimal = 'Lion',
    Type_alimentaire = 'Carnivore',
    Image = 'nouvelle_image.jpg',
    IdHab = 2
WHERE IdAnimal = 1;



DELETE FROM animals
WHERE IdAnimal = 3;


SELECT * FROM animals;
