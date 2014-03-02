<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|

all this shit will be posted online too

*/

Route::get('/', function()
{
	return View::make('songs/create');
});

Route::get('/songs/create', function(){
    $genres = Genre::all();
    $artists = Artist::all();

      return View::make('songs/create', [
        'artists'=> $artists ,
        'genres' => $genres

    ]);

});



Route::post('songs', funtion()
{
   $song = new Song();


});

Routes::get('artists/{id}', function(){

   $artist = Artist::find($id);
    dd($artist->songs->toArray);
});

Route::get('/songs/search', 'SongController@seach');


Route::get('/songs/', 'SongController@listSongs');