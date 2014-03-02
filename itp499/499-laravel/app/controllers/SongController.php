<?php
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 2/11/14
 * Time: 6:11 PM
 */

class SongController extends BaseController {


    public function search()
    {
        return View::make('songs/search');

    }

    public function listSongs()
    {
        $song_title = Input::get('song_title');  //$_GET['song_title]
        $artist = Input::get('artist');

        //dd($artist);

        $songs = Song::search($song_title, $artist);

        return View::make('songs/songs-list', [
            'songs' => $songs
        ]);
    }

} 