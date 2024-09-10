@extends('home.index')

@section('SongContent')
    <div style="width:60%;background-color:white;height:auto;">
        <div class="rightSec1">
            <div style="display:flex;align-items:center;">
                
                <i class="bi bi-plus" style="font-size:12rem;"></i>
                
            </div>
            <div style="text-align:left;width:100%;padding-top:30px;">
                <h1>Add a New Song Lyrics</h1>
                <p>
                   Help us build the largest lyrics collection on the web!
                </p>
            </div>
        </div>
        <h3>Please fill in the form below:</h3>
        <div style="width:100%;display:flex;">
            <div style="width:60%;padding:12px;">
                <form role="form" method="POST" action="{{ url('/songs') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div style="margin:20px 0px;">
                        <label for="songname" class="form-label">Song name:</label>
                        <input type="text" class="form-control" id="songname" placeholder="Enter Songname" name="songname" required autofocus>
                    </div>
                    <div style="margin:20px 0px;">
                        <label for="album" class="form-label">Album:</label>
                        <input type="text" class="form-control" id="album" placeholder="Enter album" name="album" required autofocus>
                    </div>
                    <div style="margin:20px 0px;">
                        <label  class="form-label">Lyrics:</label>
                        <textarea class="form-control" id="lyrics" name="lyrics" style="height:300px;" required></textarea>    
                    </div>
                    <p>Tip: Check your lyrics spelling and grammar with our free grammar check.</p>
                    <div style="margin:20px 0px;">
                        <label for="artistname" class="form-label">Artist Name:</label>
                        <input type="text" class="form-control" id="artistname" placeholder="Enter Artistname" name="artistname" required autofocus>
                    </div>
                    <div style="margin: 20px 0;">
                        <label for="artistimage" class="form-label">Artist's photo:</label><br />
                        <img id="preview" style="width: 200px; height: 200px;display:none;padding:20px;" />
                        <!-- Hide the actual file input and style a custom button -->
                        <input type="file" id="artistimage" name="artistimage" required autofocus style="display: none;" onchange="displayFileName(this)" />
                        <label for="artistimage" class="custom-file-upload btn btn-primary">
                            Upload Artist Image
                        </label>
                        <span id="file-name" style="margin-left: 10px;"></span>
                    </div>

                    <button type="submit" class="btn btn-success " style="margin:10px 0px;width:200px;">Submit</button>
                    <button type="reset" class="btn btn-dark " style="margin:10px 0px;width:200px;">Cancel</button>
                </form>
            </div>
            <div style="width:5%;border-right:dotted 1px black;">

            </div>
        </div>
    </div>
    
    <script>
    // Display the selected file name
    function displayFileName(input) {
        const fileName = input.files[0]?.name;
        document.getElementById('file-name').textContent = fileName ? `Selected: ${fileName}` : '';
        
        // Optional: Display image preview
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection