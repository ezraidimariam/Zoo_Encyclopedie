<?php
include("../config/db.php");

if(isset($_POST['add'])){
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query($conn, "INSERT INTO habitats (NomHab, Description_Hab) VALUES ('$nom','$desc')");
    header("Location: list.php");
    exit();
}
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
    <div class="card p-4">
        <h2 class="mb-3">Ajouter un Habitat</h2>
        <form method="POST">
            <input type="text" name="nom" class="form-control mb-2" placeholder="Nom de l'Habitat" required>
            <textarea name="description" class="form-control mb-3" placeholder="Description" required></textarea>
            <button name="add" class="btn btn-primary w-100">Ajouter</button>
            <a href="list.php" class="btn btn-secondary w-100 mt-2">Retour à la liste</a>
        </form>
    </div>
</div>
