<?php

//require_once __DIR__ . '/Yelp/Review.php';
//require_once __DIR__ . '/OpenTable/Review.php';

//function __autoload($class) {
//    var_dump($class);
//    die();
//} //there is a better way to do this

//spl_autoload_register(function($class) {
//    var_dump($class);
//});
//spl_autoload_register(function($class) {
//    var_dump($class);
//}); //tedious. use composer instead.

require __DIR__ . '/vendor/autoload.php';

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

use Yelp\Reviews\Review as YelpReview;
use OpenTable\Reviews\Review as OpenTableReview;

$billing = new Hunger\Billing\PayPal();

//$review1 = new Yelp\Reviews\Review();
//$review2 = new OpenTable\Reviews\Review(); //namespace class thing so instead we can use keyword use
//
$review1 = new YelpReview();
$review2 = new OpenTableReview();
