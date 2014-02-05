<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/28/14
 * Time: 6:12 PM
 */

class ArtistMenu{
    public $artists;
    public $selVal;

    public function __construct($selVal, $artist) { //magic method. called behind the scenes for you
        $this->artists = $artist;
        $this->selVal = $selVal;
    }

    public function __toString() {
        $statement = "<select name='$this->selVal'>";
        foreach ($this->artists as $artist) {
            $statement = $statement . "<option value='$artist->id'>" . $artist->artist_name . "</option>";
        }
        $statement = $statement. "</select>";

        return $statement;
    }
}

