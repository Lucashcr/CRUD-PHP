<?php
require_once "dbconn.php";

header("Content-Type: application/json");

$task = new Task(
    null,
    $_POST["title"],
    $_POST["description"],
    $_POST["priority"],
    $_POST["deadline"],
    $_POST["status"]
);

$conn = new DBConn();
$result = $conn->insert_task($task->toArray());
if ($result) {
    echo json_encode($task->toHTML());
} else {
    echo json_encode(["error" => "Failed to insert task"]);
}
?>