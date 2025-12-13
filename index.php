<?php
include("config/db.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Zoo Encyclopedia</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f8ff;
        }
        .header {
            text-align: center;
            padding: 50px 0;
        }
        .header h1 {
            font-size: 3rem;
            color: #2c3e50;
        }
        .card:hover {
            transform: scale(1.05);
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header -->
    <div class="header">
        <h1>🐾 Zoo Encyclopedia 🐾</h1>
        <p class="lead">Explorez les animaux et leurs habitats de manière ludique et éducative!</p>
    </div>

    <!-- Sections -->
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Voir les Animaux</h5>
                    <p class="card-text">Découvrez tous les animaux du zoo.</p>
                    <a href="animals/list.php" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Voir les Habitats</h5>
                    <p class="card-text">Explorez les différents habitats des animaux.</p>
                    <a href="habitats/list.php" class="btn btn-success">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Ajouter un Animal</h5>
                    <p class="card-text">Ajoutez de nouveaux animaux au zoo.</p>
                    <a href="animals/add.php" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Ajouter un Habitat</h5>
                    <p class="card-text">Créez de nouveaux habitats pour les animaux.</p>
                    <a href="habitats/add.php" class="btn btn-success">Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
