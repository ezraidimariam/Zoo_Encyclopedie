<?php
include("../config/db.php");

$habitats = mysqli_query($conn, "SELECT * FROM habitats");

if(isset($_POST['add'])){
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $habitat = mysqli_real_escape_string($conn, $_POST['habitat']);

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image = str_replace(' ', '_', preg_replace("/[^a-zA-Z0-9_\.-]/", "", $_FILES['image']['name']));
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "../uploads/".$image);

        mysqli_query($conn, "INSERT INTO animals (Nom, Type_alimentaire, Image, IdHab) 
            VALUES ('$nom','$type','$image','$habitat')");

        header("Location: list.php");
        exit();
    }
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


<div class="text-end p-2">
    <a href="../index.php" class="home-btn">🏠 Home</a>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <div class="card p-4">
        <h2 class="mb-3">Ajouter un Animal</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="Nom" class="form-control mb-2" required>
            <select name="type" class="form-select mb-2" required>
                <option value="">--Type Alimentaire--</option>
                <option value="Carnivore">Carnivore</option>
                <option value="Herbivore">Herbivore</option>
                <option value="Omnivore">Omnivore</option>
            </select>
            <select name="habitat" class="form-select mb-2" required>
                <option value="">--Choisir Habitat--</option>
                <?php while($h = mysqli_fetch_assoc($habitats)){ ?>
                    <option value="<?= $h['IdHab']; ?>"><?= $h['NomHab']; ?></option>
                <?php } ?>
            </select>
            <input type="file" name="image" class="form-control mb-3" required>
            <button name="add" class="btn btn-primary w-100">Ajouter</button>
            <a href="list.php" class="btn btn-secondary w-100 mt-2">Retour à la liste</a>
        </form>
    </div>
</div>
