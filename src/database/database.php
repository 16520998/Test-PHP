<?php
$host = 'database';
$user = 'user';
$pass = '123';
$database = 'ToDoList';

$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableName = 'todo';

$isTableExistQuery = "SHOW TABLES LIKE '$tableName'";
$result = $conn->query($isTableExistQuery);

if ($result->num_rows <= 0) {
    $query = "CREATE TABLE `todo` (
        `id` int(10) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `task` varchar(255) DEFAULT NULL,
        `start_date` DATETIME  DEFAULT NULL,
        `end_date` DATETIME  DEFAULT NULL
        )";
    if ($conn->query($query) === true) {
        echo "Table 'todo' created successfully.";
    }
    echo "Error creating table: " . $conn->error;
}