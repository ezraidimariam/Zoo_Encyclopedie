<?php
include '../db.php';

$id = $_GET['id'];

$sql = "DELETE FROM animals WHERE IdAnimal = $id";
mysqli_query($conn, $sql);

header("Location: /index.php");
exit();
?>
