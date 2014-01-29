<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/28/14
 * Time: 5:17 PM
 */

require_once 'Product.php';

class Book extends Product { //inheriting class

    // public, protected, private
    public $pages;
    public $authors;
    protected $listedAt;

    static $createdCount = 0; //belong at the class level rather than as an instance. shared among all instances

    public function __construct($title, $pages) {
        static::$createdCount++;
        $this->listedAt = time();
        $this->pages = $pages;
        parent::__construct($title); //parent is product. calling it to get title from the parent.
    }

    public static function count() {
        return static::$createdCount;
    }
}