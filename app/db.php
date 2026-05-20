<?php

$host = getenv('DB_HOST') ?: 'db';
$dbname = getenv('DB_NAME') ?: 'tasks';
$user = getenv('DB_USER') ?: 'task_user';
$pass = getenv('DB_PASSWORD') ?: 'task_password';

$maxAttempts = 10;
$attempt = 0;

while (true) {
    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

        break;
    } catch (PDOException $e) {
        $attempt++;

        if ($attempt >= $maxAttempts) {
            die("Erreur connexion DB: " . $e->getMessage());
        }

        sleep(2);
    }
}
