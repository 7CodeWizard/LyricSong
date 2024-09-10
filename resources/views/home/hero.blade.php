@extends('home.index')

@section('SongContent')
    <div style="width:60%;background-color:white;height:100%;">  
         @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

            <h2 > Found {{ $groupedArtists->count() }} artists starting with <span style="color:#830c66;font-weight:800;">{{ $letter[0] }}:</span></h2>
            <div style="display:flex; border-bottom: 3px double black;padding:8px;" class="btn-group">
                <span>Skip to:</span>
                <a href="{{ route('search.artists', ['letter' => $letter[0]]) }}"><button type="button" class="order_btn active">{{ $letter[0] }}</button></a>
                <a href="{{ route('search.artists', ['letter' => $letter[0].'A']) }}"><button type="button" class="order_btn">{{ $letter[0] }}A</button></a>
                <a href="{{ route('search.artists', ['letter' => $letter[0].'B']) }}"><button type="button" class="order_btn" >{{ $letter[0] }}B</button></a>
                <a href="{{ route('search.artists', ['letter' => $letter[0].'C-'.$letter[0].'E']) }}">
                    <button type="button" class="order_btn">{{ $letter[0] }}C-{{ $letter[0] }}E</button>
                </a>
                <a href="{{ route('search.artists',  ['letter' => $letter[0].'F-'.$letter[0].'H']) }}"><button type="button" class="order_btn" >{{ $letter[0] }}F-{{ $letter[0] }}H</button></a>
                <a href="{{ route('search.artists', ['letter' => $letter[0].'I-'.$letter[0].'K']) }}"><button type="button" class="order_btn" >{{ $letter[0] }}I-{{ $letter[0] }}K</button></a>
                <a href="{{ route('search.artists',  ['letter' => $letter[0].'L-'.$letter[0].'N']) }}"><button type="button" class="order_btn" >{{ $letter[0] }}L-{{ $letter[0] }}N</button></a>
                <a href="{{ route('search.artists',  ['letter' => $letter[0].'O-'.$letter[0].'Q']) }}"><button type="button" class="order_btn" >{{ $letter[0] }}O-{{ $letter[0] }}Q</button></a>
                <a href="{{ route('search.artists',  ['letter' => $letter[0].'R-'.$letter[0].'T']) }}"><button type="button" class="order_btn" >{{ $letter[0] }}R-{{ $letter[0] }}T</button></a>
                <a href="{{ route('search.artists',  ['letter' => $letter[0].'U-'.$letter[0].'W']) }}"><button type="button" class="order_btn">{{ $letter[0] }}U-{{ $letter[0] }}W</button></a>
                <a href="{{ route('search.artists',  ['letter' => $letter[0].'X-'.$letter[0].'Z']) }}"><button type="button" class="order_btn" >{{ $letter[0] }}X-{{ $letter[0] }}Z</button></a>
            </div>

                <table class="table table-hover" style="margin-top:30px;text-align:center;">
                    <thead>
                        <tr style="border-bottom: 3px double black;">
                            <th style="width:70%;">Name</th>
                            <th># of Songs</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($groupedArtists as $artistName => $songs)
                        <tr style="border-bottom: 1px dotted #aaa; text-align:left; cursor:pointer;">
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.order_btn');
            buttons.forEach((button) => {
                button.addEventListener('click', () => {
                buttons.forEach((btn) => btn.classList.remove('active'));
                button.classList.add('active');
                });
            });
        });
    </script>
    
@endsection
