<?php
include "db.php";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <link rel="stylesheet" href="style/update_task.css">
</head>
<body>

<?php

$id = $_GET['id'];

if(!$id){
    echo "il y a pas une tache avec cet id";
    exit;
}

$result = $connexion->query("SELECT * FROM task WHERE id = $id");
$task = $result->fetch_assoc();
?>
<h1 class="title">Update task</h1>
<form method="POST" action="update_action.php">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">

    Name:<br>
    <input type="text" name="name" value="<?= $task['name'] ?>" required><br><br>

    Description:<br>
    <textarea name="descripton" rows="4" cols="50" required><?= $task['descripton'] ?></textarea><br><br>

    Executed:<br>
    <select name="executed">
        <option value="0" <?= $task['executed'] == 0 ? "selected" : "" ?>>en cours</option>
        <option value="1" <?= $task['executed'] == 1 ? "selected" : "" ?>>executée</option>
    </select><br><br>

    <button type="submit" class="submit">Update Task</button>
</form>

