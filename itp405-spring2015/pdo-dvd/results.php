<?php

if (!isset($_GET['searchtitle'])) {
    header('Location:search.php');
}

?>


<!DOCTYPE html>
<html>



<head>

    <title> Search Results</title>

    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/footable.core.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

          <div class="navbar-header ">
          <ul class="nav navbar-nav">
            <li><a class="active" href="../search.php"><strong>Paige's Website </strong></a></li>
            <li><a href="../search.php">Search Page</a></li>
            <li><a href="#">More to Come!</a></li>
          </ul>
        </div>
        </nav>
        
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

            <h4>You searched for: </h4> <h3 style ="color: darkgrey"> <?php echo $_GET['searchtitle']; ?> </h3> </br></br>
          
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
                ON dvds.format_id = formats.id
                WHERE title LIKE ?
            ";


            $statement = $pdo->prepare($sql);
            $like = '%'. $searchtitle .'%';
            $statement->bindParam(1, $like);
            $statement->execute();
            $dvds = $statement->fetchAll(PDO::FETCH_OBJ);
            ?>


           <?php if(empty($dvds)) : ?>
                <h3> Your search returned no results.  Please try again <a href="/search.php"> here</a> </h3>
           
           
            <?php else : ?>

    <script type="text/javascript">
    $(function () {
        $('.footable').footable();
    });
    </script>

<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Rating</th>
                <th >Genre</th>
                <th>Format</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dvds as $dvd) : ?>
            <tr>
                <td> <h4><?php echo $dvd->title; ?> </h4></td>
                <td><a href ="ratings.php?rating_name=<?php echo $dvd->rating_name?>"><?php echo $dvd->rating_name ?></a></td>
                <td><?php echo $dvd->genre_name; ?> </td>
                <td><?php echo $dvd->format_name; ?> </td>
            </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php endif; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/footable.js" type="text/javascript"></script>


</body>
</html>