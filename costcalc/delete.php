<?php

include('db.php');


if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM record WHERE name = '".$id."'");
}

header("Location: index.php");

?>