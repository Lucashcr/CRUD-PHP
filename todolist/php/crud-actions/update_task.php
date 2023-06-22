<?php
require_once "../classes/dbconn.php";

header("Content-Type: application/json");

$task = new Task(
    $_POST["id"],
    $_POST["title"],
    $_POST["description"],
    $_POST["priority"],
    $_POST["deadline"],
    $_POST["status"]
);

$conn = new DBConn();
$result = $conn->update_task($task->toArray());
if ($result) {
    echo json_encode($task->toHTML());
} else {
    echo json_encode(["error" => "Failed to update task"]);
}
?>