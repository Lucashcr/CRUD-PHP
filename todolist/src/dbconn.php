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
        $q = $this->mysqli->query("SELECT id, title, description, priority, deadline, status FROM tasks");
        $result = $q->fetch_all();
        if ($result) {
            return array_map(function ($task) {
                return new Task(...$task);
            }, $result);
        } else {
            return [];
        }
    }

    public function insert_task($task)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO tasks (title, description, priority, deadline, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",
            $task["title"],
            $task["description"], 
            $task["priority"], 
            $task["deadline"],
            $task["status"]
        );
        $stmt->execute();
        if ($stmt->errno) {
            echo "Failed to insert task: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        }
        return true;
    }
}
?>