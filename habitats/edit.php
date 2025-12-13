<?php
include("../config/db.php");

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM habitats WHERE IdHab=$id");
$habitat = mysqli_fetch_assoc($res);

if(isset($_POST['update'])){
    $nom = $_POST['nom'];
    $desc = $_POST['desc'];

    mysqli_query($conn, "UPDATE habitats SET NomHab='$nom', Description_Hab='$desc' WHERE IdHab=$id");
    header("Location:list.php");
}
?>

<h2>Modifier Habitat</h2>
<form method="POST">
    <input type="text" name="nom" value="<?= $habitat['NomHab']; ?>" required><br><br>
    <textarea name="desc" required><?= $habitat['Description_Hab']; ?></textarea><br><br>
    <button name="update">Modifier</button>
</form>
