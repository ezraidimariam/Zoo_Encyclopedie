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
