

<!DOCTYPE html>
<html>
<head>
    <title>DVD Seach</title>
   <link href="css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</br>
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
				Input part or all of a DVD title to search for its ratings, genre, and format.
			</div>
	    <form action="results.php" method="get">
	       <h3> Movie Title: <input type="text" name="searchtitle"> 
	        <input type = "submit"> </h3> 
	    </form>

	     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>

		</div>
	</body>
</html>

