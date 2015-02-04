<?php 

class Song extends Database {
    private $song_title;
    private $artist_id;
    private $genre_id;
    private $price
        
	public function setTitle($title){
        $song_title=$title;
    }
    
    public function setArtistId($id){
        $artist_id = $id;
    }
    
    public function setGenreId($id){
        $genre_id = $id;
    }
    
    public function setPrice($pri){
        $price = $pri;
    }
    
    public function getTitle(){
        return $song_title;
    }
    
    public function save(){        
        $sql = "
                INSERT INTO songs(title, artist_id, genre_id, price)
                VALUES $song_title, $artist_id, $genre_id, $price;
                ";

            $statement = $pdo->prepare($sql);
            $statement->execute();
	}
    
    public function getId(){
        return $pdo->lastInsertId();
        
    
    }