<?php
    $connexion = new mysqli("db", "root", "root","tp_php");
    if($connexion  ->connect_error){
        die("Connection erronée: " . $connexion->connect_error);
}
?>