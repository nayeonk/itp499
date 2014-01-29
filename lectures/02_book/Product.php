<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/28/14
 * Time: 5:25 PM
 */

class Product {
    public $title;
    public $price;

    public function __construct($title = 'NA') { //magic method. called beind the scenes for you
        $this->title = $title;
    }

    public function __toString() {
        return $this->title;
    }

    public function isValid() {
        if($this->title) {
            return true;
        }

        return false;
    }
}