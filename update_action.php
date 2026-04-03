<?php
include "db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$descripton = $_POST['descripton'];
$executed = $_POST['executed'];

$sql = "UPDATE task SET name='$name', descripton='$descripton', executed=$executed WHERE id=$id";
$connexion->query($sql);

header("Location: index.php");
?>