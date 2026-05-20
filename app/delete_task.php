<?php
require_once "db.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: index.php?error=invalid_id");
    exit;
}

$stmt = $pdo->prepare("DELETE FROM task WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php?deleted=1");
exit;
