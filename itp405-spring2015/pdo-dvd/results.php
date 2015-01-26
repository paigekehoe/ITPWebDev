<!DOCTYPE html>
<html>

<?php

if (!isset($_GET['searchtitle'])) {
    header('Location:search.php');
}

?>

<head>

    <title> Search Results</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>
        <div class="container">
            <div class="jumbotron">
                <style="background-image: url(../img/jumbotronBackground.png); background-size: cover;">
                <h1> DVD Database Search </h1>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1> Search Results</h1>
            </div>
        <div class = panel-body>

            <h4>You searched for: </h4> <h3> <?php echo $_GET['searchtitle']; ?> </h3> </br></br>
        
        <?php

            $host = 'itp460.usc.edu';
            $dbname = 'dvd';
            $user = 'student';
            $pass = 'ttrojan';
            $searchtitle = $_GET['searchtitle'];
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            $sql = "
                SELECT title, rating_name, genre_name, format_name
                FROM dvds
                INNER JOIN ratings 
                ON dvds.rating_id = ratings.id
                INNER JOIN genres 
                ON dvds.genre_id = genres.id
                INNER JOIN formats 
                ON dvd.format_id = formats.id
                WHERE title LIKE ?

            ";


            $statement = $pdo->prepare($sql);
            $like = '%'. $searchtitle .'%';
            $statement->bindParam(1, $like);
            $statement->execute();
            $dvds = $statement->fetchAll(PDO::FETCH_OBJ);

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
                <?php echo $dvd->title; ?>
            </h4>
            
            <div> Rating: <?php echo $dvd->rating; ?> </div>
            <div> Genre: <?php echo $dvd->genre; ?> </div>
            <div> Format: <?php echo $dvd->format; ?> </div>



        </div>
    <?php endforeach; ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</div>
</body>
</html>