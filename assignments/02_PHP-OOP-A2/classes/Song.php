<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/28/14
 * Time: 6:13 PM
 */
require_once 'db.php';
class Song {
    protected $pdo;
    public  $title;
    public $artistID;
    public $genreID;
    public $price;
    public $id;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    public function setArtistID($id) {
        $this->artistID = $id;
    }
    public function setGenreID($id) {
        $this->genreID = $id;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    public function save() {
        $this->sql = "INSERT INTO songs (title, artist_id, genre_id, price)
                VALUES('$this->title', '$this->artistID', '$this->genreID', '$this->price')";
        $statement = $this->pdo->prepare($this->sql);
        return $statement->execute();
    }
    public function getTitle(){
        return $this->title;
    }
    public function getID() {
        return $this->pdo->lastInsertId();
    }

}