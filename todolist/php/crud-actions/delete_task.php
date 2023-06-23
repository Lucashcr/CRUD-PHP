<?php
require_once "../classes/dbconn.php";

header("Content-Type: application/json");

$conn = new DBConn();
$result = $conn->delete_task($_GET["id"]);
?>