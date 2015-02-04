<?php 

class ArtistQuery extends Database {
	public function getAll(){
        		  $sql = "
                SELECT *
                FROM artists
                ORDER BY artist_name
                ";

            $statement = $pdo->prepare($sql);
            $statement->execute();
            $dvds = $statement->fetchAll(PDO::FETCH_OBJ);
            var_dump($statement);

	}
    
}