<?php

namespace Yelp\Reviews;

use DateTime;

class Review {
    protected $createdAt;

    public function __construct() {
        $date = new DateTime();
        $this->createdAt = $date->format('m-d-YY'); //object oriented format for date
    }
}