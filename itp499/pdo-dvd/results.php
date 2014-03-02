
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 3/2/14
 * Time: 12:12 PM
 */
<?php



?>
<!DOCTYPE html>
<html>
<head>
    <title> <h1>Search Results </h1></title>
</head>
<body>

    You searched for: <?php echo $_GET["searchtitle"]; ?> <br>
    <?php
        $host = 'itp460.usc.edu';
        $dbname = 'dvd';
        $user = 'student';
        $pass = 'ttrojan';
        $searchtitle = $_GET["searchtitle"];
        $pdo = new PDO("mysql:host=$host dbname=$dbname", $user, $pass);

        $sql = "SELECT dvds.title AS title, rating_name, genre_name, format_name
        FROM dvds WHERE title LIKE '%$serachtitle%'
        INNER JOIN ratings ON songs.rating_id = ratings.id
        INNER JOIN genres ON songs.genre_id = genres.id
        INNER JOIN formats ON formats.format_id = formats.id";


        $statement = $pdo->prepare($sql);
        $statement->execute();
        $dvds = $statement->fetchAll();

        var_dump($dvds);

    echo "<table border='1'>
    <tr>
    <th>Title</th>
    <th>Rating</th>
    <th>Genre</th>
    <th>Format</th>
    </tr>";
?>
    <?php foreach ($dvds as $dvd) : ?>
        <div class = "dvd">
            <h4>
                <?php echo $dvd->title; ?> by <?php echo $song->artist_name; ?>
            </h4>
            <div> Rating: <?php echo $dvd->rating; ?> </div>
            <div>Genre: <?php echo $dvd->genre; ?> </div>
            <div> Format: <?php echo $dvd->format; ?> </div>



        </div>
    <?php endforeach; ?>



</body>
</html>