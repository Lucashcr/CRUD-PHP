<?php
require_once "../classes/dbconn.php";

header("Content-Type: application/json");

$conn = new DBConn();
$result = $conn->get_task($_GET["id"]);
echo json_encode($result);
?>