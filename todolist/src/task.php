<?php

class Task
{
    public $title;
    public $description;
    public $status;
    public $priority;
    public $deadline;

    private static $priority_map = [
        "low" => "Baixa",
        "medium" => "Média",
        "high" => "Alta"
    ];

    private function get_priority(){
        return self::$priority_map[$this->priority];
    }

    private function get_formatted_deadline(){
        if(!$this->deadline) 
            return "Sem prazo";
        
        return date_format($this->deadline, "d/m/Y H:i:s");
    }

    public function __construct($task)
    {
        $this->title = $task[1];
        $this->description = $task[2] ? $task[2] : "-";
        $this->priority = $task[3];
        $this->deadline = $task[4] ? new DateTime($task[4]) : null;
        $this->status = $task[5] ? "Concluída" : "Pendente";
    }

    public function toHTML()
    {
        return "<tr>
            <td>{$this->title}</td>
            <td>{$this->description}</td>
            <td>{$this->status}</td>
            <td>{$this->get_priority()}</td>
            <td>{$this->get_formatted_deadline()}</td>
        </tr>";
    }
}

?>