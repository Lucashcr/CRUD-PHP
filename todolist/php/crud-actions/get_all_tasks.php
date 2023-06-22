<?php
require_once "../classes/dbconn.php";

header("Content-Type: application/json");

$conn = new DBConn();
$tasks = $conn->get_all_tasks();

echo json_encode(array_map(function ($task) {
    return $task->toHTML();
}, $tasks))
?>