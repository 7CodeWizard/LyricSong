<?php

namespace App\Http\Controllers;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
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

    public function search_songs(Request $request){
        $lyrics = $request->input('lyrics');
        $artist = Song::where('lyrics',$lyrics)->first();
        return view('home.lyrics',[
            'artist'=>$artist,
            'groupedSongs' => $this->groupedSongs,
            'groupedLyrics' => $this->groupedLyrics,
        ]);
    }
    public function create()
    {
        $songs = Song::all();
        $groupedSongs = $songs->groupBy('artistname')->take(6);
        $groupedLyrics = $songs->groupBy('songname')->take(5);
        return view('songs.create', compact('groupedSongs','groupedLyrics'));
    }

    public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'songname' => 'required|string|max:255',
                'album' => 'required|string|max:255',
                'lyrics' => 'required|string',
                'artistname' => 'required|string|max:255',
                'artistimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $song = new Song();
            $song->songname = $request->input('songname');
            $song->album = $request->input('album');
            $song->lyrics = $request->input('lyrics');
            $song->artistname = $request->input('artistname');

            if ($request->hasFile('artistimage')) {
                $file = $request->file('artistimage');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $fileName);
                $song->artistimage = $fileName;
            }
            
            $song->save();

            return redirect('/'); 
        }

}
