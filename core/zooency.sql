
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


