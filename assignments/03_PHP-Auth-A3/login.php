<?php
require __DIR__  . '/vendor/autoload.php';
use \Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="container">
<?php
    foreach ($session->getFlashBag()->get('error', array()) as $message) {
        echo "<div class='flash-error'>$message</div>";
    }
?>

<form class="login" method="post" action="login-process.php">
    Username: <input type="text" name="username"/> Password: <input type="password" name="password"/> <input type="submit"/>
</form>
</div>
</body>
</html>

