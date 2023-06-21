<?php
require_once "dbconn.php";

if (isset($_POST["status"]))
    $_POST["status"] = true;
else
    $_POST["status"] = false;

$task = new Task([
    null,
    $_POST["title"],
    $_POST["description"],
    $_POST["priority"],
    $_POST["deadline"],
    $_POST["status"]
]);

$conn = new DBConn();
$conn->insert_task($task);

header("Location: /");
exit();
?>