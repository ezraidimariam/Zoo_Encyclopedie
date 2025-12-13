<?php
include("../config/db.php");

$id = $_GET['id'] ?? '';
if($id){
    // Optional: set animals.IdHab to NULL when habitat deleted
    mysqli_query($conn, "UPDATE animals SET IdHab=NULL WHERE IdHab='$id'");

    // Delete habitat
    mysqli_query($conn, "DELETE FROM habitats WHERE IdHab='$id'");
}

header("Location: list.php");
exit();
