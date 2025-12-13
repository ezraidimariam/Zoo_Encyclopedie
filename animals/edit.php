<?php
include("../config/db.php");

$id = $_GET['id'] ?? '';
if(!$id){ header("Location: list.php"); exit; }

$habitats = mysqli_query($conn, "SELECT * FROM habitats");
$animal_res = mysqli_query($conn, "SELECT * FROM animals WHERE ID='$id'");
$animal = mysqli_fetch_assoc($animal_res);

if(isset($_POST['update'])){
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $habitat = mysqli_real_escape_string($conn, $_POST['habitat']);
    $image = $animal['Image'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image = str_replace(' ', '_', preg_replace("/[^a-zA-Z0-9_\.-]/", "", $_FILES['image']['name']));
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/".$image);
    }

    mysqli_query($conn, "UPDATE animals 
        SET Nom='$nom', Type_alimentaire='$type', Image='$image', IdHab='$habitat' 
        WHERE ID='$id'");

    header("Location: list.php");
    exit();
}
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <div class="card p-4">
        <h2 class="mb-3">Modifier Animal</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nom" class="form-control mb-2" value="<?= $animal['Nom']; ?>" required>
            <select name="type" class="form-select mb-2" required>
                <option value="">--Type Alimentaire--</option>
                <option value="Carnivore" <?= $animal['Type_alimentaire']=='Carnivore'?'selected':''; ?>>Carnivore</option>
                <option value="Herbivore" <?= $animal['Type_alimentaire']=='Herbivore'?'selected':''; ?>>Herbivore</option>
                <option value="Omnivore" <?= $animal['Type_alimentaire']=='Omnivore'?'selected':''; ?>>Omnivore</option>
            </select>
            <select name="habitat" class="form-select mb-2" required>
                <?php while($h = mysqli_fetch_assoc($habitats)){ ?>
                    <option value="<?= $h['IdHab']; ?>" <?= $animal['IdHab']==$h['IdHab']?'selected':''; ?>>
                        <?= $h['NomHab']; ?>
                    </option>
                <?php } ?>
            </select>
            <div class="mb-2">
                <p>Image actuelle:</p>
                <img src="../uploads/<?= $animal['Image']; ?>" width="150">
            </div>
            <input type="file" name="image" class="form-control mb-3">
            <button name="update" class="btn btn-warning w-100">Mettre à jour</button>
            <a href="list.php" class="btn btn-secondary w-100 mt-2">Retour à la liste.</a>
        </form>
    </div>
</div>
