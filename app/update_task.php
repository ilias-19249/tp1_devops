<?php
require_once "db.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: index.php?error=invalid_id");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM task WHERE id = :id");
$stmt->execute(['id' => $id]);
$task = $stmt->fetch();

if (!$task) {
    header("Location: index.php?error=task_not_found");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une tache</title>
    <link rel="stylesheet" href="style/update_task.css">
</head>
<body>

<h1 class="title">Update task</h1>
<form method="POST" action="update_action.php">
    <input type="hidden" name="id" value="<?= htmlspecialchars((string) $task['id']) ?>">

    Name:<br>
    <input type="text" name="name" value="<?= htmlspecialchars($task['name']) ?>" required><br><br>

    Description:<br>
    <textarea name="descripton" rows="4" cols="50" required><?= htmlspecialchars($task['descripton']) ?></textarea><br><br>

    Executed:<br>
    <select name="executed">
        <option value="0" <?= (int) $task['executed'] === 0 ? "selected" : "" ?>>en cours</option>
        <option value="1" <?= (int) $task['executed'] === 1 ? "selected" : "" ?>>executee</option>
    </select><br><br>

    <button type="submit" class="submit">Update Task</button>
</form>

</body>
</html>
