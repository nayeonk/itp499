<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/21/14
 * Time: 5:30 PM
 */

$host = "itp460.usc.edu";
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';

$artist = $_GET['artist'];//from search.php $_REQUEST['artist'] works too

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$sql = "
    SELECT title, price, play_count, artist_name
    FROM songs
    INNER JOIN artists
    ON songs.artist_id = artists.id
    WHERE artists.artist_name LIKE '%$artist%'
    ORDER BY play_count DESC

";
// artist_name works for where clause too since it is the only column named that
// LIKE is a fuzzy comparison. the % is a wild operator

$statement = $pdo->prepare($sql);
$statement->execute();
$songs = $statement->fetchAll(PDO::FETCH_OBJ);

//var_dump($songs);
?>

<?php foreach($songs as $song) : ?>
    <h3>
        <?php echo $song->title ?>
        by
        <?php echo $song->artist_name ?>
    </h3>
    <p>Play Count:<?php echo $song->play_count ?></p>
    <p>$<?php echo $song->price ?></p>
<?php endforeach ?>