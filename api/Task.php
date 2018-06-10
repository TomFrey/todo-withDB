<?php
require __DIR__ .'/vendor/autoload.php';


class Task
{

    private $id;
    private $name;
    private $description;
    private $state;
    private $userId;
    private $dueDate;

    public function __construct($id = false)
    {

        if ($id) {
            $statement = DB::get()->prepare(
                "select * from task where id = :identifier"
            );

            $statement->execute([
                ':identifier' => $id
            ]);

            $task = $statement->fetch(PDO::FETCH_ASSOC);

            $this->setId($task['id']);
            $this->setName($task['name']);
            $this->setDescription($task['description']);
            $this->setState($task['state']);
            $this->setUserId($task['userId']);
            $this->setDueDate(\Carbon\Carbon::parse($task['dueDate']));
        }
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }


    public function update(){
        $statement = DB::get()->prepare("update task 
                                            set name        = :name,
                                                description = :description,
                                                state       = :state,
                                                dueDate     = :dueDate
                                            where id = :id");

        $statement->execute(array(
            ':id' => $this->getId(),
            ':name' => $this->getName(),
            ':description' => $this->getDescription(),
            ':state' => $this->getState(),
            ':dueDate' => $this->getDueDate()
        ));
    }


    public function create(){
        $statement = DB::get()->prepare("insert into task (name, description, state, dueDate, userId)".
                                        "values (:name, :description, :state, :dueDate, :userId)");

        $statement->execute(array(
            ':userId' => $this->getUserId(),
            ':name' => $this->getName(),
            ':description' => $this->getDescription(),
            ':state' => $this->getState(),
            ':dueDate' => $this->getDueDate()
        ));
    }


    public function delete(){
        $statement = DB::get()->prepare("delete from task where id = :id");

        $statement->execute(array(':id' => $this->getId()));
    }



}