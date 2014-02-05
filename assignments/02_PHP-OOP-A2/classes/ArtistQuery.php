<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/28/14
 * Time: 6:12 PM
 */

class ArtistQuery {

    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
        $this->sql = "SELECT * FROM artists";
    }

    public function getAll() {
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}