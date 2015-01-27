<?php

if (!isset($_GET['rating_name'])) {
    header('Location:search.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ratings Page</title>
   <link href="css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>
<?php


		$rating = $_GET['rating_name'];

	    $host = 'itp460.usc.edu';
        $dbname = 'dvd';
        $user = 'student';
        $pass = 'ttrojan';

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        $sql = "

			SELECT title, rating_name, genre_name, format_name
			FROM dvds
			INNER JOIN ratings
			ON ratings.id = dvds.rating_id
			INNER JOIN genres
            ON dvds.genre_id = genres.id 
            INNER JOIN formats
            ON dvds.format_id = formats.id
			WHERE rating_name = ?

	";

$statement = $pdo->prepare($sql);
$statement->bindParam(1, $rating);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_OBJ);

	?>

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
                <h1> All Movies with Rating: <?php echo $_GET['rating_name']; ?></h1>
            </div>
        <div class = panel-body>
		    <script type="text/javascript">
		    $(function () {
		        $('.footable').footable();
		    });
		    </script>

			<div>
			    <table class="footable table">
			        <thead>
			            <tr>
			                <th>Title</th>
			                <th>Rating</th>
			                <th >Genre</th>
			                <th>Format</th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php foreach ($results as $result) : ?>
			            <tr>
			                <td> <h4><?php echo $result->title; ?> </h4></td>
			                <td><?php echo $result->rating_name; ?> </a></td>
			                <td><?php echo $result->genre_name; ?> </td>
			                <td><?php echo $result->format_name; ?> </td>
			            </tr>
			                <?php endforeach; ?>
			        </tbody>
			    </table>
			</div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/footable.js" type="text/javascript"></script>


</body>

</html>