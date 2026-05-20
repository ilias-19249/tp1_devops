<?php
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$name = trim($_POST['name'] ?? '');
$descripton = trim($_POST['descripton'] ?? '');
$executed = isset($_POST['executed']) ? (int) $_POST['executed'] : 0;
$executed = $executed === 1 ? 1 : 0;

if (!$id || $name === '' || $descripton === '') {
    header("Location: index.php?error=invalid_task");
    exit;
}

$sql = "UPDATE task
        SET name = :name, descripton = :descripton, executed = :executed
        WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id' => $id,
    'name' => $name,
    'descripton' => $descripton,
    'executed' => $executed,
]);

header("Location: index.php");
exit;
