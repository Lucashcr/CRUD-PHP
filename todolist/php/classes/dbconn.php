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

    public function get_task($id)
    {
        $stmt = $this->mysqli->prepare("SELECT id, title, description, priority, deadline, status FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();
        if ($result) {
            $task = new Task(...$result[0]);
            return $task->toArray();
        } else {
            return null;
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

    public function delete_task($id) {
        $stmt = $this->mysqli->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if ($stmt->errno) {
            echo "Failed to delete task: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        }
        return true;
    }

    public function update_task($task) {
        $stmt = $this->mysqli->prepare("UPDATE tasks SET title = ?, description = ?, priority = ?, deadline = ?, status = ? WHERE id = ?");
        $stmt->bind_param("sssssi",
            $task["title"],
            $task["description"],
            $task["priority"],
            $task["deadline"],
            $task["status"],
            $task["id"]
        );
        $stmt->execute();
        if ($stmt->errno) {
            echo "Failed to update task: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        }
        return true;
    }
}
?>