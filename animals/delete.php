<?php
include("../config/db.php");

if(isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    $res = mysqli_query($conn, "SELECT Image FROM animals WHERE ID='$id'");
    $animal = mysqli_fetch_assoc($res);

    if($animal && file_exists("../uploads/".$animal['Image'])) {
        unlink("../uploads/".$animal['Image']);
    }

    mysqli_query($conn, "DELETE FROM animals WHERE ID='$id'");
}

header("Location: list.php");
exit();
