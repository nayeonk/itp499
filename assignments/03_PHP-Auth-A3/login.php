<?php
require __DIR__  . '/vendor/autoload.php';
use \Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
// TODO: Show error message when logged in incorrectly
foreach ($session->getFlashBag()->get('error', array()) as $message) {
    echo "<div class='flash-error'>$message</div>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<form method="post" action="login-process.php">
    Username: <input type="text" name="username"/> Password: <input type="password" name="password"/> <input type="submit"/>
</form>
</body>
</html>

