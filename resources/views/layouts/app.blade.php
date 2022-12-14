<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

     <!-- FONT AWESOME -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  AOS MASTER -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Splide -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    <!-- Scripts -->
    @vite(['resources/js/app.js'])



    @yield('style')
</head>
<body>
    {{-- {{ dd(Route::currentRouteName()) }} --}}
    {{-- {{ die() }} --}}
    <div id="app">
        @if(Route::currentRouteName() != 'main')
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-light.png') }}" alt="logo" class="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0 d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="/" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown mx-md-2">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genre</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <div class="d-flex flex-wrap">
                                    @foreach(\App\Models\Genre::all() as $genre)
                                        <a class="dropdown-item mb-1 rounded text-center" href="{{ route('genre', $genre->name) }}">{{ $genre->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mx-md-2">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Country</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <div class="d-flex flex-wrap">
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                    <a class="dropdown-item mb-1" href="#">Action 1</a>
                                </div>
                        </li>
                        <li class="nav-item mx-md-2">
                            <a class="nav-link" href="{{ route('movies.index') }}">Movies</a>
                        </li>
                        <li class="nav-item mx-md-2">
                            <a class="nav-link" href="{{ route('series.index') }}">tv show</a>
                        </li>
                        @auth
                            <li class="nav-item mx-md-2">
                                <a class="nav-link" href="{{ route('favorite') }}"><i class="fa-solid fa-heart me-1"></i> My Favorite</a>
                            </li>  
                        @endauth
                    </ul>
                
                    <form class="d-flex flex-column flex-lg-row my-3 my-lg-0">
                        <div class="input-group me-4">
                            <span id="search-btn" class="input-group-text bg-white border bg-transparent text-light" id="basic-addon1" role="button"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input id="search-input" type="text" class="form-control border border-light bg-transparent text-light" placeholder="Enter Keyword" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </form>

                    @guest    
                        @if(!Route::currentRouteName() == "login")
                            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center text-decoration-none text-light mt-3 mt-lg-0 text-center">    
                                <i class="fa-regular fa-user me-2"></i>Login
                            </a>
                        @endif
                    @endguest


                </div>
                </div>
            </nav>
        @endif
        
        @yield('content')



        <!-- footer -->
        <footer class="text-light mt-4 pb-4" style="@if(Route::currentRouteName() == "movies.show") margin-top: 335px!important @endif">
          <!-- <div class="footer-bg position-absolute w-100 h-100 top-0 start-0"></div> -->
          <div class="container-fluid container-md content">
              <div class="row text-center text-sm-start">
                  <div class="col-12 col-sm-3 col-lg-2 text-center mb-3 mb-sm-0">
                      <img src="{{ asset('images/logo-light.png') }}" alt="LOGO" class="logo w-100"><br />
                      <small class="opacity-75">&copy; 2022</small>
                  </div>
                  <div class="col-12 col-sm-6 col-lg-8 px-lg-5 mb-3 mb-sm-0">
                      <p class="description opacity-75"><small>GoMovies is a Free Movies streaming site with zero ads. We let you watch movies online without having to register or paying, with over 10000 movies and TV-Series. You can also Download full movies from GoMovies and watch it later if you want</small></p>
                      <ul class="d-flex p-0 list-unstyled flex-column flex-md-row">
                          <li class="mb-2 mb-md-0"><a href="#" class="text-decoration-none text-light me-md-3 me-lg-4">Terms of service</a></li>
                          <li class="mb-2 mb-md-0"><a href="#" class="text-decoration-none text-light me-md-3 me-lg-4">Contact</a></li>
                          <li class="mb-2 mb-md-0"><a href="#" class="text-decoration-none text-light me-md-3 me-lg-4">Join Us</a></li>
                          <li class="mb-2 mb-md-0"><a href="#" class="text-decoration-none text-light me-md-3 me-lg-4">Donate</a></li>
                      </ul>
                  </div>
                  <div class="col-12 col-sm-3 col-lg-2">
                      <p class="border border-warning text-warning p-2 note opacity-75"><small>GoMovies does not store any files on our server, we only linked to the media which is hosted on 3rd party services.</small></p>
                  </div>
              </div>
          </div>
      </footer>

      
    </div>

    <script src="{{ asset('js/splide-extension-auto-scroll.min.js') }}"></script>
    <script src="{{ asset('js/splide.min.js') }}"></script> 
    {{-- AOS MASTER --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
    <script>
        AOS.init();
    </script>
    {{-- main js file --}}
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        
        function splide(className) { 
            const splide = new Splide( className, {
                autoplay:true, 
                // type   : 'loop',
                cover  : true,
                autoScroll: {
                    speed: 6,
                    autoStart: true
                },
                arrows: 'false',
                drag   : 'free',
                focus  : 'left',
                autoWidth: true,
                autoHeight: true,
                perPage: 1,
            } ).mount();
            }
            
           

            
    </script>
 @if(Route::currentRouteName() == "series.show" || Route::currentRouteName() == "tv") 
    <script>
        
        const serie = @php echo $serie @endphp;
        const seasonList = doc.getElementById('seasons')
        const episodesContainer = doc.querySelector('#seasonEp .row')
        const seasons = @php echo $serie->seasons()->get() @endphp;
            show(serie, "tv")

           

            // generateEpisodes("col-6 col-sm-4 col-md-3 col-lg-3 mb-4")
        </script>        
 @endif
 
 @if(Route::currentRouteName() == "series.show")
 <script>
     generateEpisodes("col-lg-2")
 </script>
 @endif

 @if(Route::currentRouteName() == "tv")
 <script>
     generateEpisodes("col-6 col-sm-4 col-md-4 col-lg-3 col-xxl-2")
 </script>
 @endif

<script>
     function showSearchResult(btn, val) {
                    btn.addEventListener('click', e => {
                        window.location.href = "/search/" + val.value
                    })
                }

    showSearchResult(doc.getElementById('search-btn'), doc.getElementById('search-input'))
</script>
    @yield("script")

</body>
</html>
