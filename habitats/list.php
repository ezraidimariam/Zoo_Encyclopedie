<?php
include("../config/db.php");

$habitats = mysqli_query($conn, "SELECT * FROM habitats ORDER BY IdHab DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Animaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f8ff; font-family: Arial, sans-serif; }
       
        .home-btn {
            text-decoration:none; 
            background:#0d6efd; 
            color:white; 
            padding:5px 12px; 
            border-radius:20px;
            font-weight:bold;
            font-size: 2rem;
        }
        .card:hover {
            transform: scale(1.03);
            transition: 0.3s;
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<!-- Small Home Button -->
<div class="text-end p-2">
    <a href="../index.php" class="home-btn">🏠 Home</a>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Liste des Habitats</h2>
    <a href="add.php" class="btn btn-primary mb-3">Ajouter un Habitat</a>

    <div class="row g-4">
        <?php if(mysqli_num_rows($habitats) > 0): ?>
            <?php while($h = mysqli_fetch_assoc($habitats)): ?>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5 class="card-title"><?= $h['NomHab']; ?></h5>
                        <p class="card-text"><?= $h['Description_Hab']; ?></p>
                        <a href="edit.php?id=<?= $h['IdHab']; ?>" class="btn btn-warning">Modifier</a>
                        <a href="delete.php?id=<?= $h['IdHab']; ?>" onclick="return confirm('Supprimer cet habitat ?');" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center mt-3">Aucun habitat trouvé.</p>
        <?php endif; ?>
    </div>
</div>
