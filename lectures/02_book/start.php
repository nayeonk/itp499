<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/28/14
 * Time: 5:16 PM
 */

require_once 'Book.php';

$phpOOS = new Book('PHP Object Oriented Solutions', 300);
//echo $phpOOS->title;
//echo $phpOOS->pages;
//echo $phpOOS->listedAt; //phpStrom will note that you cannot access protected

//var_dump($phpOOS->isValid());

//echo $phpOOS;

$jsGoodParts = new Book('JS Good Parts', 145);
//echo Book::$createdCount;

echo Book::count();