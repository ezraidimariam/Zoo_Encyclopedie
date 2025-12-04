<?php
include '../db.php';
include '../includes/header.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM animals WHERE IdAnimal = $id");
$animal = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $habitat = $_POST['habitat'];

    // Si user bddl image
    if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "../assets/img/" . $image);

        $sql = "UPDATE animals SET NomAnimal='$nom', Type_alimentaire='$type', IdHab='$habitat', Image='$image'
                WHERE IdAnimal=$id";
    } else {
        $sql = "UPDATE animals SET NomAnimal='$nom', Type_alimentaire='$type', IdHab='$habitat'
                WHERE IdAnimal=$id";
    }

    mysqli_query($conn, $sql);
    echo "<p style='color:green'>✔ Animal modifié !</p>";
}
?>

<h2>Modifier Animal</h2>

<form method="post" enctype="multipart/form-data">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= $animal['NomAnimal'] ?>" required><br><br>

    <label>Type alimentaire :</label>
    <select name="type">
        <option <?= $animal['Type_alimentaire']=="Carnivore"?"selected":"" ?>>Carnivore</option>
        <option <?= $animal['Type_alimentaire']=="Herbivore"?"selected":"" ?>>Herbivore</option>
        <option <?= $animal['Type_alimentaire']=="Omnivore"?"selected":"" ?>>Omnivore</option>
    </select><br><br>

    <label>Habitat :</label>
    <select name="habitat">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM habitats");
        while ($h = mysqli_fetch_assoc($res)) {
            $sel = ($animal['IdHab'] == $h['IdHab']) ? "selected" : "";
            echo "<option value='".$h['IdHab']."' $sel>".$h['NomHab']."</option>";
        }
        ?>
    </select><br><br>

    <label>Image actuelle :</label><br>
    <img src="../assets/img/<?= $animal['Image'] ?>" width="120"><br><br>

    <label>Changer Image :</label>
    <input type="file" name="image"><br><br>

    <button type="submit" name="submit">Modifier</button>
</form>

<?php include '../includes/footer.php'; ?>
