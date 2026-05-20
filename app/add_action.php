<?php
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: create_task.php");
    exit;
}

$name = trim($_POST['name'] ?? '');
$descripton = trim($_POST['descripton'] ?? '');
$executed = isset($_POST['executed']) ? (int) $_POST['executed'] : 0;
$executed = $executed === 1 ? 1 : 0;

if ($name === '' || $descripton === '') {
    header("Location: create_task.php?error=missing_fields");
    exit;
}

$sql = "INSERT INTO task (name, descripton, executed)
        VALUES (:name, :descripton, :executed)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'name' => $name,
    'descripton' => $descripton,
    'executed' => $executed,
]);

header("Location: index.php");
exit;
