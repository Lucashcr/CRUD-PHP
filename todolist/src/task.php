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
        
        return date_format($this->deadline, "d/m/Y H:i");
    }

    public function __construct($title, $description, $priority, $deadline, $status)
    {
        $this->title = $title;
        $this->description = $description;
        $this->priority = $priority;
        $this->deadline = new DateTime($deadline);
        $this->status = $status;
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