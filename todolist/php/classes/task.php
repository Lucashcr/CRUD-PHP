<?php

class Task
{
    private $id;
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

    public function __construct($id, $title, $description, $priority, $deadline, $status)
    {
        $this->id = $id;
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
        return "<tr id='task-{$this->id}'>
        <td class='title'>{$this->title}</td>
        <td class-'description'>{$this->description}</td>
        <td class='status'>{$this->get_status()}</td>
        <td class='priority'>{$this->get_priority()}</td>
        <td class='deadline'>{$this->get_formatted_deadline()}</td>
        <td><button class='btn-update' onclick=\"fillTaskForm('update', $this->id)\"><i class='fa fa-pencil'></i><span>Atualizar</span></button></td>
        <td><button class='btn-delete' onclick=\"fillTaskForm('delete', $this->id)\"><i class='fa fa-trash'></i><span>Excluir</span></button></td>
        </tr>";
    }

    public function toArray() {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "priority" => $this->priority,
            "deadline" => $this->deadline->format("Y-m-d H:i"),
            "status" => $this->status
        ];
    }
}

?>