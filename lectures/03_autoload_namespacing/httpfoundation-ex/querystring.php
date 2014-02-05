<?php

require __DIR__ . '/../vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;

$request = Request::createFromGlobals();

echo $request->query->get('fullname'); //$_GET['fullname']


// instead of: header('Location: index.php');
//$response = new RedirectResponse('http://google.com');
//return $response->send();

$session = new Session();
$session->start(); //session_start()
$session->set('fullname','DavidTang');
$session->set('email', 'dtang@usc.edu');
$session->set('loginTime', time());

$session->clear(); //session_destroy()

echo $session->get('fullname');
echo '<br/>';
echo $session->get('loginTime');

$session->getFlashBag()->set('statusMessage', 'Thanks!');

//var_dump($session=>getFlashBag()->get('statusMessage'));