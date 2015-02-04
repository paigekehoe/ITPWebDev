<?php 

class GenreQuery extends Database {
	public function getAll(){
        		  $sql = "
                SELECT *
                FROM genres
                ORDER BY genre_name
                ";

            $statement = $pdo->prepare($sql);
            $statement->execute();
            $dvds = $statement->fetchAll(PDO::FETCH_OBJ);
            var_dump($statement);

	}
    
    }