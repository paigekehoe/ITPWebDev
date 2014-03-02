<?php
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 2/11/14
 * Time: 5:57 PM
 */

class Song extends Eloquent {

    public function artist(){

        return $this->belongsTo('Artist');

    }


    public static function search($song_title, $artist)
    {
        /**
         *	SELECT * FROM songs
         * 	INNER JOIN artists
         *	ON songs.artist_id = artists.id
         **/

        /**
         *
         * /way to transform the date
        // SELET title, artist_name, added AS added
        // DATE_FORMAT(added, '%b %d %Y %h:%i %p') AS added
         FROM songs
         INNER JOIN artists
         ON songs.artist_id = artists.id

         *
         *
         */

        $query = DB::table('songs')
            ->select('title', 'artist_name', 'genre', DB::raw("DATE_FORMAT(added, '%b %d %Y %h:%i %p') AS added"))  //raw is prone to SQL injection attacks
            ->join('artists', 'artists.id', '=', 'songs.artist_id')
            ->join('genres', 'songs.genre_id', '=', 'genre.id');

         if($song_title){
             $query->where('title', 'LIKE' , "%$song_title%"); // if you type in blank you'd get back everything so that is a check

         }

        if($artist){
            $query->where('artist_name', 'LIKE', "%$artist%");
        }

         $songs = $query->get();

        return $songs;
    }
} 