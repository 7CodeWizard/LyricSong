@extends('home.index')

@section('SongContent')
    <div style="width:60%;background-color:white;height:100%;">
        
         <div class="rightSec1">
            <div style="display:flex;width:100%;">
                <div style="text-align:left;width:100%;padding-top:30px;padding:20px;">
                   <h5>Famous lyrics by >></h5>
                    <h1>{{ $artistName }}</h1>
                    <h5 style="color:#830C66">Add a biography for this artist >></h5>
                    <button style="background:#733E66;color:white;border:none;border-radius:4px;font-size:12px;"><i class="bi bi-star-fill" style="margin-right:8px;"></i>Follow</button>
                    <button>0 fans</button>
                </div>
                <div style="width:100px;height:100px;display:flex;align-items:center;">
                    <img src="/images/{{$artistImage}}" style="width:80px;height:80px;object-fit: cover;" alt="artistImage"/>
                </div>
            </div>
        </div>

       @if(isset($songs))
        <table class="table table-hover" style="margin-top:12px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Song Name</th>
                    <th>Album</th>
                </tr>
            </thead>
            <tbody>
                @foreach($songs as $index => $song)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <a href="{{ route('lyrics', ['lyrics' =>$song->lyrics]) }}">    
                            {{ $song['songname'] }}
                        </a>
                    </td>
                    <td>{{ $song['album'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No songs available for this artist.</p>
        @endif
       
    </div>
    
@endsection
