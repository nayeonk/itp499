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

// start session
$session = new Session();
$session->start(); //session_start()

if ($auth->attempt($username,$password) == true) {

    $session->set('username',$username);
    $session->set('email', 'dtang@usc.edu');
    $session->set('loginTime', time());

    $session->getFlashBag()->set('success', 'You have sucessfully logged in!');

    $response = new RedirectResponse('dashboard.php');
    $response->send();

}
else {
    $session->getFlashBag()->set('error', 'Incorrect credentials. Try again.');

    //var_dump($session->getFlashBag()->get('statusMessage'));
    $response = new RedirectResponse('login.php');
    $response->send();
    foreach ($session->getFlashBag()->get('error', array()) as $message) {
        echo "<div class='flash-error'><script>alert($message)</script></div>";
    }
}

