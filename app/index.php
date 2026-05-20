<?php
require_once "db.php";

$sql = "SELECT * FROM task ORDER BY id DESC";
$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des taches</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>

<h1>Liste des taches</h1>

<p>
    <a href="create_task.php">Ajouter une tache</a>
</p>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Etat</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>

<?php while ($row = $result->fetch()) { ?>

    <tr>
        <td><?= htmlspecialchars((string) $row['id']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['descripton']) ?></td>
        <td>
            <?= (int) $row['executed'] === 0 ? "Non executee" : "Executee" ?>
        </td>
        <td>
            <a href="delete_task.php?id=<?= urlencode((string) $row['id']) ?>">Delete</a>
        </td>
        <td>
            <a href="update_task.php?id=<?= urlencode((string) $row['id']) ?>">Update</a>
        </td>
    </tr>

<?php } ?>

</table>

</body>
</html>
