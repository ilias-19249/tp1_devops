<?php
include "db.php";
$id = $_GET['id'];

if($id){
    $query = "DELETE FROM task WHERE id =".$_GET['id'];
    $result = $connexion->query($query);

    header("Location: index.php?deleted=1&id=$id");
    exit;
}else{
    echo "il y a pas une tache avec cet id";
}

?>