<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song; 

class ArtistController extends Controller
{
    protected $groupedSongs;
    protected $groupedLyrics;

    public function __construct()
    {
        $this->initializeGroupedSongsAndLyrics();
    }

    protected function initializeGroupedSongsAndLyrics()
    {
        $songs = Song::all();
        $this->groupedSongs = $songs->groupBy('artistname')->take(6);
        $this->groupedLyrics = $songs->groupBy('songname')->take(5);
    }

    public function index(Request $request)
    {
        $artistName = $request->input('artistName');
        $songs = Song::where('artistname', $artistName)->get();
        
        $artistImage = $songs->isNotEmpty() ? $songs->first()->artistimage : null;

        return view('home.artists', [
            'artistName' => $artistName,
            'artistImage' => $artistImage,
            'songs' => $songs,
            'groupedSongs' => $this->groupedSongs,
            'groupedLyrics' => $this->groupedLyrics,
        ]);
    }

    public function search(Request $request)
    {
        $letter = $request->input('letter');
        $ranges = explode('-', $letter);
        $start = $ranges[0];
        $end = count($ranges) > 1 ? $ranges[1] : $start;

        $songs = Song::where('artistname', '>=', $start)
                     ->where('artistname', '<=', $end . 'z') 
                     ->get();
        
        $groupedArtists = $songs->groupBy('artistname'); 
        
        return view('home.hero', [
            'groupedArtists' => $groupedArtists,
            'letter' => $letter,
            'groupedSongs' => $this->groupedSongs,
            'groupedLyrics' => $this->groupedLyrics,
        ]);
    }
}