<?php
require('../src/controller/GetToDo.php');
require('../src/database/database.php');
$data = [];

global $conn;
$data['data'] = [];

$query = "SELECT * FROM todo ORDER BY id DESC";

$result = $conn->query($query);
$toDoData = $result->fetch_all(MYSQLI_ASSOC);

foreach ($toDoData as $row) {
    $data[] = array(
        'id' => $row["id"],
        'title' => $row["task"],
        'start' => $row["start_date"],
        'end' => $row["end_date"]
    );
}
unset($data["data"]);
header('Content-Type: application/json');

echo json_encode($data);
