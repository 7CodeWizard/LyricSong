<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
class HomeController extends Controller
{

    public function home()
    {
        $songs = Song::all();
        $groupedSongs = $songs->groupBy('artistname')->sortByDesc(function ($group) {
            return $group->count(); // Sort by the number of songs per artist
        }) ->take(6);
         $groupedLyrics = $songs->groupBy('songname')->take(5);
        return view('home.app', compact('groupedSongs','groupedLyrics'));
    }
}
