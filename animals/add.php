<?php
include '../db.php';
include '../includes/header.php';

if (isset($_POST['submit'])) {
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $type = $_POST['type'];
    $habitat = $_POST['habitat'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../assets/img/" . $image);

    $sql = "INSERT INTO animals (NomAnimal, Type_alimentaire, Image, IdHab)
            VALUES ('$nom', '$type', '$image', '$habitat')";
    mysqli_query($conn, $sql);

    echo "<p style='color:green'>✔ Animal ajouté avec succès !</p>";
}
?>

<h2>Ajouter un Animal</h2>

<form method="post" enctype="multipart/form-data">
    <label>Nom :</label>
    <input type="text" name="nom" required><br><br>

    <label>Type alimentaire :</label>
    <select name="type" required>
        <option value="Carnivore">Carnivore</option>
        <option value="Herbivore">Herbivore</option>
        <option value="Omnivore">Omnivore</option>
    </select><br><br>

    <label>Habitat :</label>
    <select name="habitat">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM habitats");
        while ($h = mysqli_fetch_assoc($res)) {
            echo "<option value='" . $h['IdHab'] . "'>" . $h['NomHab'] . "</option>";
        }
        ?>
    </select><br><br>

    <label>Image :</label>
    <input type="file" name="image" required><br><br>

    <button type="submit" name="submit">Ajouter</button>
</form>

<?php include '../includes/footer.php'; ?>
