<?php

class Task
{
    private $title;
    private $description;
    private $status;
    private $priority;
    private $deadline;

    private static $priority_map = [
        "low" => "Baixa",
        "medium" => "Média",
        "high" => "Alta"
    ];

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

    public function get_title()
    {
        return $this->title;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_priority()
    {
        return self::$priority_map[$this->priority];
    }

    public function get_deadline()
    {
        return $this->get_formatted_deadline();
    }

    public function get_status()
    {
        return $this->status ? "Concluída" : "Pendente";
    }

    public function toHTML()
    {
        return "<tr>
            <td>{$this->title}</td>
            <td>{$this->description}</td>
            <td>{$this->get_status()}</td>
            <td>{$this->get_deadline()}</td>
            <td>{$this->get_formatted_deadline()}</td>
        </tr>";
    }

    public function toArray() {
        return [
            "title" => $this->title,
            "description" => $this->description,
            "priority" => $this->priority,
            "deadline" => $this->deadline->format("Y-m-d H:i:s"),
            "status" => $this->status
        ];
    }
}

?>