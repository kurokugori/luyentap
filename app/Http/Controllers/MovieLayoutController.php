<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MovieLayoutController extends Controller
{
    function movie()
 {
    
    $data = DB::select("select * from movie where vote_average>7 and popularity>450 order by release_date desc limit 0,12"); 
    return view("movie.index", compact("data"));
    
 }
 function getGenres()
    {
        return DB::select("SELECT * FROM genre ORDER BY genre_name_vn");
    }

   
    function showGenre($id)
    {
        $currentGenre = DB::selectOne("SELECT id, genre_name_vn FROM genre WHERE id = ?", [$id]);

        $data = DB::select("
            SELECT m.*
            FROM movie m
            JOIN movie_genre mg ON m.id = mg.id_movie
            WHERE mg.id_genre = ?
            ORDER BY m.popularity DESC
            LIMIT 0, 12 
        ", [$id]);

        $genres = $this->getGenres(); 
        return view('movie.index', [
            'data' => $data,
            'genres' => $genres,
            'genreName' => $currentGenre->genre_name_vn 
        ]);
    }

    
    function showDetails($id)
    {
        $data = DB::selectOne("SELECT * FROM movie WHERE id = ?", [$id]);
        if (!$data) {
            abort(404);
        }
        $genres = $this->getGenres(); 

         $movieGenres = DB::table('genre')
                        ->join('movie_genre', 'genre.id', '=', 'movie_genre.id_genre')
                        ->where('movie_genre.id_movie', $data->id)
                        ->pluck('genre_name_vn')
                        ->implode(', ');

        return view('movie.details', compact('data', 'genres', 'movieGenres'));
}
}