<?php
include "db.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <link rel="stylesheet" href="style/add_task.css">
</head>
<body>

<h2>Ajouter une nouvelle tache</h2>

<form method="POST" action="add_action.php">
    Name:<br>
    <input type="text" name="name" required><br><br>

    Description:<br>
    <textarea name="descripton" rows="4" cols="50" required></textarea><br><br>

    Executed:<br>
    <select name="executed">
        <option value="0">No</option>
        <option value="1">Yes</option>
    </select><br><br>

    <button type="submit">Add Task</button>
</form>