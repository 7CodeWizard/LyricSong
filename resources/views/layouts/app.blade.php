<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- import icons -->
     <!-- Add this in your <head> section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div style="width:100%;height:auto; min-height: 100vh;" id="app">
      
       <nav class="navbar navbar-expand-sm" >
         <div class="" style="z-index:120;background-color: white; color: black; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);position:fixed;display:flex;width:100%;justify-content:space-between;">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header" >
              <ul class="nav navbar-nav">
               <li class="nav-item"><a href="/"><image src="/images/logo.png" alt="logo" style="width:60px;"/></a></li>
               <li class="nav-item" style="padding:18px 0px;">
                 <a href="/songs" style="font-family: 'Yanone Kaffeesatz', sans-serif;font-weight: 700;color: #733e66;font-size: 27px;">Online Lyric Database</a>
               </li>
             </ul>
           </div>
           <div class="nav navbar-nav" style="padding:22px;">
                @if(Auth::check())
                    <a href="{{ route('logout')}}">
                      <button class="btn btn-success">
                        Logout
                      </button>
                    </a>
                @else
                      <a href="/login">
                        <button class="btn btn-success">
                          LogIn
                        </button>
                      </a>
                @endif
           </div>
         </div><!-- /.container-fluid -->
       </nav>
        
       @yield('content')  

    </div>
      <div class="footer"> 
          <div>
            <span >© Lyrics - <span>
            <span class = "pl-4"><i class="bi bi-facebook"></i></span>
            <span class = "pl-4"><i class="bi bi-twitter"></i></span>
            <span class = "pl-4"><i class="bi bi-instagram"></i></span>
            <span class = "pl-4"><i class="bi bi-youtube"></i></span>
            </div>
          <div  style="padding:12px">
            <a href = "#" class = "pl-4">EULA</a>
            <a href = "#" class = "pl-4">Privacy Policy</a>
            <a href = "#" class = "pl-4">Cookie Policy</a>
            <a href = "#" class = "pl-4">Copyright</a>
          </div>
          <div>All rights reserved.</div>
      </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</head>
<body>
    
</body>
</html>