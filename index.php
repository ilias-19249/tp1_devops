<?php
include "db.php";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>

<?php

    if (isset($_GET['deleted']) && $_GET['deleted'] == 1) {
        $deletedId = intval($_GET['id']);
        echo "<p style='color: green;'> la tache  $deletedId est supprimée!</p>";
    }


    $sql = "SELECT * FROM task";
    $result = $connexion->query($sql);

    echo "<h1>La liste des taches</h2>";
    echo "<p><a href='create_task.php' class='btn_add'> Ajouter une tâche</a></p>";
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Executed</th>
            <th>Delete</th>
            <th>Update</th>
    </tr>";
    while($row = $result->fetch_assoc()){
        $tacheexecute = ($row['executed'] == 0) ? "Non executée" : "Executée";
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['descripton']."</td>
                <td>".$tacheexecute."</td>
                <td><a href='delete_task.php?id=".$row['id']." ' class='btn_delete'>Delete</a></td>
                <td><a href='update_task.php?id=".$row['id']." ' class='btn_update'>Update</a></td>
            </tr>";
    }

    
?>