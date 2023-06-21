<?php

require_once "task.php";

class DBConn
{
    private $mysqli;

    public function __construct()
    {
        $mysqli = new mysqli("db", "mysql", "password", "todolist", 3306);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return;
        }
        $this->mysqli = $mysqli;
    }

    public function get_all_tasks()
    {
        $result = $this->mysqli->query("SELECT * FROM tasks")->fetch_all();
        if (!$result) {
            echo "Failed to get all tasks: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
            return;
        } else {
            return array_map(function ($task) {
                return new Task($task);
            }, $result);
        }
    }

    public function insert_task($task)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO tasks (title, description, priority, deadline) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $task->title, $task->description, $task->priority, $task->deadline);
        $stmt->execute();
        if ($stmt->errno) {
            echo "Failed to insert task: (" . $stmt->errno . ") " . $stmt->error;
            return;
        }
    }
}
?>