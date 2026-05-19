<?php
include "db.php";

$name = $_POST['name'];
$descripton = $_POST['descripton'];
$executed = intval($_POST['executed']);

$sql = "INSERT INTO task (name, descripton, executed) VALUES ('$name', '$descripton', $executed)";
$connexion->query($sql);

header("Location: index.php");

?>