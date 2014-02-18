<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 2/17/14
 * Time: 10:51 PM
 */

//namespace ITP\Songs;


class SongQuery {
    protected $pdo;
    protected $sql;

    public function __construct($pdo){
        $this->pdo = $pdo;
        $this->sql = "SELECT songs.title, artists.artist_name, genres.genre FROM songs ";
    }
    public function withArtist() {
        $this->sql = $this->sql . "INNER JOIN artists ON songs.artist_id = artists.id";

        return $this;
    }
    public function withGenre() {
        $this->sql = $this->sql . " INNER JOIN genres ON songs.genre_id = genres.id";
        return $this;
    }
    public function orderBy($query) {
        $this->sql = $this->sql .  " ORDER BY $query DESC";
        return $this;
    }
    public function all() {
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

} 