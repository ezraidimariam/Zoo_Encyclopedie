<?php
include("../config/db.php");

$id = $_GET['id'] ?? '';
if($id){
    // Optionally delete image file
    $res = mysqli_query($conn, "SELECT Image FROM animals WHERE ID='$id'");
    $animal = mysqli_fetch_assoc($res);
    if($animal && file_exists("../uploads/".$animal['Image'])){
        unlink("../uploads/".$animal['Image']);
    }

    // Delete from DB
    mysqli_query($conn, "DELETE FROM animals WHERE ID='$id'");
}

header("Location: list.php");
exit();
