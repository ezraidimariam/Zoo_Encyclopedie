<?php
include("../config/db.php");

$id = $_GET['id'] ?? '';
if($id){
    
    mysqli_query($conn, "UPDATE animals SET IdHab=NULL WHERE IdHab='$id'");

    mysqli_query($conn, "DELETE FROM habitats WHERE IdHab='$id'");
}

header("Location: list.php");
exit();
