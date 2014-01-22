<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 1/21/14
 * Time: 7:13 PM
 */

$host = "itp460.usc.edu";
$dbname = 'dvd';
$user = 'student';
$pass = 'ttrojan';

$title = $_GET['title'];

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$sql = "
    SELECT title, rating, genre,format
    FROM dvd_titles
    INNER JOIN ratings
    ON dvd_titles.rating_id = ratings.id
	INNER JOIN genres
    ON dvd_titles.genre_id = genres.id
	INNER JOIN formats
    ON dvd_titles.format_id = formats.id
    WHERE dvd_titles.title LIKE ?
    ORDER BY release_date DESC
";

$statement = $pdo->prepare($sql);
$like = '%' . $title . '%';
$statement->bindParam(1, $like); //adding this to prevent sql injections

$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);
if (!$dvds) {
    echo "Cannot find results. Try again.";
    echo "<br/>";
    echo "<a href='search.php'> &laquo; Go back to search page</a>";
}
else{
//var_dump($dvds);
?>
<style>
    body {
        font-family: "Helvetica Neue", Helvetica, arial, freesans, clean, sans-serif;
    }
    .title {
        font-weight: bold;
        font-size:18px;
    }
    td {
        border-bottom: 1px black solid;
    }
</style>


<table>
    <tr>
        <td class="title">Title</td>
        <td class="title"> Rating </td>
        <td class="title"> Genre </td>
        <td class="title"> Format </td>
    </tr>
    <?php foreach ($dvds as $dvd ) : ?>
        <tr>
            <td>
                <?php echo $dvd->title ?>
            </td>
            <td>
                <?php echo $dvd->rating ?>
            </td>
            <td>
                <?php echo $dvd->genre ?>
            </td>
            <td>
                <?php echo $dvd->format ?>
            </td>
        </tr>
    <?php endforeach?>
    <?php } ?>
</table>