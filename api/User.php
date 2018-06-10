<?php
//require_once "DB.php";
require __DIR__ .'/vendor/autoload.php';


class User
{

    private $username;
    private $firstname;
    private $lastname;
    private $password;
    private $email;
    private $id;


    public function __construct($username = false)
    {
        if ($username) {
            $statement = DB::get()->prepare(
                "select * from user where username = :username"
            );

            $statement->execute([
                ':username' => $username
            ]);

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            $this->setUsername($user['username']);
            $this->setFirstname($user['firstname']);
            $this->setLastname($user['lastname']);
            $this->setEmail($user['email']);
            $this->setPassword($user['password']);
            $this->setId($user['id']);
        }
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function create(){

        $statement = DB::get()->prepare("insert into user (username, password, email, firstname, lastname)".
            "values (:username, :password, :email, :firstname, :lastname)");

        $statement->execute(array(
            ':username' => $this->getUsername(),
            ':password' => $this->getPassword(),
            ':email' => $this->getEmail(),
            ':firstname' => $this->getFirstname(),
            ':lastname' => $this->getLastname()));
    }



    public function getTasks(){

        $stmtTask = DB::get()->prepare(
            "SELECT id FROM task where userId=:userIdentifier"
        );
        $stmtTask->execute([
            ':userIdentifier' =>  $this->getId()
        ]);

        $tasks = [];

        foreach($stmtTask->fetchAll(PDO::FETCH_ASSOC) as $task){
            $tasks[] = new Task($task['id']);
        }
        return $tasks;

    }


    public function getTask($id){

        $stmtTask = DB::get()->prepare(
            "SELECT id FROM task where userId=:userIdentifier and id=:idIdentifier"
        );
        $stmtTask->execute([
            ':userIdentifier' =>  $this->getId(),
            ':idIdentifier' => $id
        ]);
        $taskArray = $stmtTask->fetch();
        $task = new Task($taskArray['id']);

        return $task;
    }

}