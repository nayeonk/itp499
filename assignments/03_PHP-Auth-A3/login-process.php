<?php
require __DIR__  . '/vendor/autoload.php';
require_once 'db.php';

use ITP\Auth as Auth;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;

$request = Request::createFromGlobals();

$username =  $request->request->get('username'); //$_POST['username']
$password = $request->request->get('password'); //$_POST['password']

$auth = new Auth($pdo);

if ($auth->attempt($username,$password) == true) {
    echo "Yay you logged in!";
}
else {
    echo "Wrong username and password combination. Please try again";
}

