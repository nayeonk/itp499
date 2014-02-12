<?php

namespace ITP;


class Auth {
    protected $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function attempt($username, $password) {
        $this->sql="SELECT * FROM users WHERE username='$username' and password=SHA1('$password')";
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();

        var_dump($statement->rowCount());

        if($statement->rowCount() > 0){
            return true;
        } else {
            return false;
        }

    }
}