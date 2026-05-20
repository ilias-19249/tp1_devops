CREATE TABLE IF NOT EXISTS task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    descripton TEXT,
    executed TINYINT DEFAULT 0
);

INSERT INTO task (name, descripton, executed)
VALUES ('Première tâche', 'Test initial', 0);