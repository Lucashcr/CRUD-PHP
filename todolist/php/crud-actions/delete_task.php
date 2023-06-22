<?php
require_once "../classes/dbconn.php";

header("Content-Type: application/json");

$conn = new DBConn();
$result = $conn->delete_task($_GET["id"]);
if ($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>