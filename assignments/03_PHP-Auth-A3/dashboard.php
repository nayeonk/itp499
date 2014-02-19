<?php
require __DIR__  . '/vendor/autoload.php';
require_once 'db.php';
//require __DIR__  . '/ITP/SongQuery.php';

use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;
use Carbon\Carbon;

use ITP\Songs\SongQuery as SongQuery;

// Start session
$session = new Session();
$session->start();

// Check if session exists. If not, redirect to login.php
if ($session->get('username') == '') {
    $response = new RedirectResponse('login.php');
    $response->send();

// Carbon
    $carbon = new Carbon();
    $time = $session->get('loginTime');
    echo $carbon->createFromTimestamp($time)->toDateTimeString();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <div id="menubar">
        <div id="welcome">Welcome to the Dashboard!</div>
        <div id="info">
            Hi, you are logged in as <?php echo $session->get('username');?><br/>
            <strong>Email address:</strong> <?php echo $session->get('email');?> <br/>
            <strong>Last Login: </strong> <?php echo Carbon::createFromTimestamp($session->get('loginTime'))->diffForHumans();;?> <br/>
            <form action="logout.php"> <input type="submit" value="Logout"/> </form>
        </div>
        <div style="clear:both"></div>
    </div>

<?php
// Display success message
foreach ($session->getFlashBag()->get('success', array()) as $message) {
    echo "<div class='flash-success'>$message</div>";
}
?>
    <div id="main">
        <h2>List of All Songs</h2>
        <table width="100%">
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Genre</th>
                <th>Price</th>
            </tr>
        <?php
            $songQuery = new SongQuery($pdo);
            $songs = $songQuery->withArtist()->withGenre()->orderBy('title')->all();
            foreach ($songs as $song) {
        ?>
            <tr>
                <td><?php echo $song->title?></td>
                <td><?php echo $song->artist_name?></td>
                <td><?php echo $song->genre?></td>
                <td><?php echo $song->price?></td>
            </tr>

        <?php
            }

        ?>
        </table>
    </div>

</div>

</body>
</html>