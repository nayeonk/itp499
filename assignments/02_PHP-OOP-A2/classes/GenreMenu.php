<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/28/14
 * Time: 6:12 PM
 */

class GenreMenu{
    public $genres;
    public $selVal;

    public function __construct($selVal, $genre) { //magic method. called behind the scenes for you
        $this->genres = $genre;
        $this->selVal = $selVal;
    }

    public function __toString() {
        $statement = "<select name='$this->selVal'>";
        foreach ($this->genres as $genre) {
            $statement = $statement . "<option value='$genre->id'>" . $genre->genre . "</option>";
        }
        $statement = $statement. "</select>";

        return $statement;
    }
}