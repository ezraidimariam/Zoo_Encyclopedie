<?php
include("config/db.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Zoo Encyclopedia</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #f1f8ff);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            min-height: 100vh;
        }

        .page {
            min-height: calc(100vh - 56px); /* navbar */
            display: flex;
            flex-direction: column;
        }

        .hero {
            text-align: center;
            padding: 35px 15px;
        }

        .hero h1 {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1e3c72;
        }

        .hero p {
            font-size: 1.05rem;
            color: #444;
            max-width: 650px;
            margin: auto;
        }

    
        .cards-section {
            flex: 1;
            display: flex;
            align-items: center;
        }

        /* Cards */
        .zoo-card {
            height: 100%;
            border: none;
            border-radius: 20px;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.35s ease;
        }

        .zoo-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .icon-box {
            font-size: 2.6rem;
            margin-bottom: 10px;
        }

        .btn {
            border-radius: 30px;
            font-weight: 600;
        }

        footer {
            text-align: center;
            color: #666;
            font-size: 0.85rem;
            padding: 10px;
        }
    </style>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">🐾 Zoo Encyclopedia</a>
    </div>
</nav>

<div class="page">
    <section class="hero">
        <h1>Zoo Encyclopedia</h1>
        <p>
            Une plateforme éducative interactive pour découvrir les animaux,
            leurs habitats et analyser les données.
        </p>
    </section>

    <!-- Cards -->
    <section class="cards-section">
        <div class="container">
            <div class="row g-4 justify-content-center">

                <div class="col-md-6 col-lg-3">
                    <div class="card zoo-card text-center p-4">
                        <div class="icon-box text-primary">
                            <i class="bi bi-bug-fill"></i>
                        </div>
                        <h5>Voir les Animaux</h5>
                        <p>Consulter la liste complète des animaux.</p>
                        <a href="animals/list.php" class="btn btn-primary w-100">Explorer</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card zoo-card text-center p-4">
                        <div class="icon-box text-success">
                            <i class="bi bi-tree-fill"></i>
                        </div>
                        <h5>Voir les Habitats</h5>
                        <p>Découvrir les habitats naturels.</p>
                        <a href="habitats/list.php" class="btn btn-success w-100">Explorer</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card zoo-card text-center p-4">
                        <div class="icon-box text-primary">
                            <i class="bi bi-plus-circle-fill"></i>
                        </div>
                        <h5>Ajouter un Animal</h5>
                        <p>Enrichir la base de données.</p>
                        <a href="animals/add.php" class="btn btn-primary w-100">Ajouter</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card zoo-card text-center p-4">
                        <div class="icon-box text-success">
                            <i class="bi bi-house-heart-fill"></i>
                        </div>
                        <h5>Ajouter un Habitat</h5>
                        <p>Créer de nouveaux habitats.</p>
                        <a href="habitats/add.php" class="btn btn-success w-100">Ajouter</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card zoo-card text-center p-4 border border-warning">
                        <div class="icon-box text-warning">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                        <h5>Statistiques</h5>
                        <p>Visualiser les données des animaux.</p>
                        <a href="stats.php" class="btn btn-warning w-100">Voir Stats</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

<footer>
    © 2025 Zoo Encyclopedia · Projet éducatif PHP & MySQL
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
