ZooEncy – Application Web Éducative pour Enfants

📌 Description

--ZooEncy est une application web éducative destinée aux enfants en crèche.
Elle permet de découvrir les animaux du zoo, leurs habitats et leurs régimes alimentaires de manière interactive et ludique.

Le projet est réalisé avec PHP procédural, MySQL, et respecte les bonnes pratiques de développement et de modélisation de base de données.

🎯 Objectifs du projet

-Apprendre aux enfants à reconnaître les animaux et leurs habitats.

-Développer un site web simple, interactif et sécurisé.

-Implémenter un système CRUD complet pour gérer les animaux et habitats.

-Permettre des filtres et statistiques pour faciliter la navigation et la visualisation des données.

🛠 Technologies utilisées

-Back-end : PHP procédural

-Base de données : MySQL

-Modélisation : UML, ERD

-Méthodologie : Scrum / Agility

-UI/UX : Ergonomie et accessibilité

📂 Structure du projet
```
/config
    db.php          → connexion à la base de données
/animals
    list.php        → afficher tous les animaux
    add.php         → ajouter un animal
    edit.php        → modifier un animal
    delete.php      → supprimer un animal
/habitats
    list.php        → afficher tous les habitats
    add.php         → ajouter un habitat
    edit.php        → modifier un habitat
    delete.php      → supprimer un habitat
/assets
    images/         → images des animaux
README.md
```
🔧 Fonctionnalités

Gestion des animaux : ajout, modification, suppression et affichage.

Gestion des habitats : ajout, modification, suppression et affichage.

Filtres par habitat et type alimentaire.

Statistiques : nombre d’animaux par type et par habitat.

BONUS : possibilité d’ajouter jeu éducatif et changement de langue FR/EN.

💾 Base de données

Table habitats : IdHab, NomHab, Description_Hab

Table animals : ID, Nom, Type_alimentaire, Image, IdHab

Index ajoutés pour optimiser les recherches : Type_alimentaire, IdHab

🚀 Installation

Cloner le projet :

git clone https://github.com/ton-utilisateur/zooency.git


Créer la base de données MySQL et exécuter le script SQL fourni (zooency.sql).

Configurer la connexion à la base dans /config/db.php.

Placer le projet dans un serveur local (XAMPP, WAMP, MAMP, etc.).

Accéder au site via http://localhost/zooency.

📄 Auteur

Mariam Ezraidi

Développeuse Web & Web Mobile
