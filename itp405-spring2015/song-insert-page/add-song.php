
<?php 
	require_once __DIR__ . '/Song.php';
    require_once __DIR__ . '/GenreQuery.php';
    require_once __DIR__ . '/ArtistQuery.php';

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
		
		$song = new Song();
        
        $song->setTitle($_POST['song_title']);
        $song->setArtistId($_POST['artist_id']);
        $song->setGenreId($_POST['genre_id']);
        $song->setPrive($_POST['price']);
        $song->save();
        

/*		if ($auth->attempt($username, $password)) {
			header("Location: myaccount.php");
		} else {
			header("Location: login.php");
		}
	}*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Song</title>
    
<head>

<body>

    <div class="container">
    <form  method="post">
        <div class="form-group">
        <label for="song_title"> Song Title: </label>
            <input type="text" name="song_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="artist_id"> Artists: </label>
            <select>
                <?php $artists = ArtistQuery.getAll() ?>
                <?php foreach ($artists as $artist) : ?>
                    <option value = "<?php $artist->getId();?>"><?php echo $artist;?></option>
                <?php endforeach; ?>
            </select>
        <input type = "submit" name = "submit" class="btn btn-default" value = "Save">
        </div>   
           <div class="form-group">
        <label for="genre_id"> Genre ID: </label>
            <input type="text" name="genre_id" class="form-control">
        </div>
        <div class="form-group">
        <label for="prive"> Price: </label>
            <input type="text" name="price" class="form-control">
        </div>
    </form>
       
    </div>
 

<p>The song <?php echo $song->getTitle() ?>
   with an ID of <?php echo $song->getId() ?> was inserted successfully!</p>

</body>

</html>