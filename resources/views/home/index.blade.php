@extends('layouts.app')

@section('content')
<div style="width: 100%; height: auto; min-height: 100vh;margin-top:70px;"> 
    @if(Auth::check())
        <div style="display: flex; align-items: center; height:60px; justify-content: space-between; padding: 1px; background-color: rgba(255,255,255,0.9); margin-top: -22px;">
            <div style="display: flex; width: 30vw;position:relative;">
                <div style="display: flex; align-items: center; padding: 0 12px;">
                    <span class="input-group-text bg-white border-right-0" style="font-size: 20px;">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
                <form action="{{ route('search.artists') }}" method="GET" style="display: flex; align-items: center;width:100%;">
                    <input 
                        type="text" 
                        name="letter" 
                        class="form-control border-left-0" 
                        placeholder="Search artist or song" 
                    />
                    <button class="btn btn-primary" style="margin-left: 2px;" type="submit">
                        Search
                    </button>
                </form>
            </div>
            <div style="display: flex; flex-wrap: wrap;">
                <a href="{{ route('search.artists', ['letter' => '']) }}" style="padding: 0px 8px;">#</a>
                @foreach(range('A', 'Z') as $char)
                    <a href="{{ route('search.artists', ['letter' => $char]) }}" style="padding: 0px 8px;">{{ $char }}</a>
                @endforeach
            </div>
        </div>
    @endif

    <div style="display: flex; justify-content: center;">
        <div class="container" style="background-color:rgba(255,255,255);box-shadow: 0 .5em 2em 0 rgba(0, 128, 0, 0.4);border-radius:30px;border:solid 1px green;position:relative;">
                <div style="position:absolute;left:20px;top:20px;border-radius:70%;z-index:100;box-shadow:0 .5em 2em 0 rgba(0, 128, 0, 0.7);">
                    <div style="box-shadow: inset 0 0 0 2px #fff;border: 2px solid green;border-radius:70%;background: green;">
                        <a href="/home">
                            <image src="/images/lion.png" alt="lion_logo" style="width:120px;margin:5px;border-radius:70%;"/>
                        </a>
                    </div>
                </div>
            <div class="leftSec">
                <div class="">
                    <div class="leftTopline">
                        <hr class="leftToplinePoint">
                    </div>

                    <div class="leftTopM">
                        <h3>The Web's Largest Resource for</h3>
                        <h2>Music, Songs <span>&</span> Lyrics</h2>
                    </div>

                    <div class="nsep">
                        <hr style="width: 20%;"/>
                        <span>A Member Of The STANDS4 Network</span>
                        <hr style="width: 20%;"/>
                    </div>

                    <div class="leftTopIcons">
                        <div class="leftTopIcon">
                            <i class="bi bi-facebook"></i>
                        </div>
                        <div class="leftTopIcon">
                            <i class="bi bi-twitter"></i>
                        </div>
                        <div class="leftTopIcon">
                            <i class="bi bi-reddit"></i>
                        </div>
                        <div class="leftTopIcon">
                            <i class="bi bi-plus-circle-fill"></i>
                        </div>
                    </div>

                    <div class="leftTopline">
                        <hr class="leftToplinePoint">
                    </div>
                </div>

                <div class="l-b1">
                    <div class="hgroup">
                        <h4>Our favorite collection of</h4>
                        <h3>Popular Artists</h3>
                    </div>
                    <span class="more">
                        <a href="#"><i class="bi bi-chevron-double-right"></i></a>
                    </span>
                    <div class="cblock_int">
                        <table class="table table-hover">
                            <tbody>
                                @foreach($groupedSongs as $artistName => $songs)
                                    <tr style="border-bottom: 1px dotted #aaa; text-align: left; cursor: pointer;">
                                        <td>
                                            <img src="/images/{{ $songs->first()->artistimage }}" alt="{{ $artistName }}" style="width: 50px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <a href="{{ route('artists', ['artistName' => $artistName]) }}">    
                                                {{ $artistName }}
                                            </a>
                                        </td>
                                        <td>{{ $songs->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="l-b1">
                    <div class="hgroup">
                        <h4>Our favorite collection of</h4>
                        <h3>Popular Lyrics</h3>
                    </div>
                    <div class="cblock_int">
                        <table class="table table-hover">
                            <tbody>
                                @foreach($groupedLyrics as $lyricsName => $songs)
                                    <tr style="border-bottom: 1px dotted #aaa; text-align: left; cursor: pointer;font-size:15px;">
                                        <td>
                                             <a href="{{ route('lyrics', ['lyrics' =>$songs->first()->lyrics]) }}"> 
                                                {{ $lyricsName }}
                                            </a><br/>
                                           
                                                {{ $songs->first()->artistname }}
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @yield('SongContent')
        </div>
    </div>
</div>
@endsection
