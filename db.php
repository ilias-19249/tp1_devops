<?php
    $connexion = new mysqli("localhost", "root", "","tp_php");
    if($connexion  ->connect_error){
        die("Connection erronée: " . $connexion->connect_error);
}
?>