@extends('layouts.app')


@section('content')

<header class="pb-4 position-relative mb-5">
    <!-- start navbar -->
    <nav class="navbar navbar-expand-md navbar-dark py-3 text-capitalize mb-5 mb-md-0">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="images/logo-light.png" alt="logo" id="logo"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0 d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown mx-md-2">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genre</a>
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
                        <a class="nav-link" href="#">Movies</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="#">tv show</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="#">top IMDB</a>
                    </li>  
                </ul>
                <form class="d-flex my-2 my-lg-0 justify-content-center">
                    <a href="{{ route('login') }}" class="btn btn-light my-2 my-sm-0 btn-sm text-center px-2" type="submit">
                        <i class="fa-regular fa-user me-2"></i>
                        <span class="d-linline d-md-none d-lg-inline">Login</span>
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <h5 class="py-5 text-center text-light h3">Find Movies, TV shows and more</h5>

    <!-- search input -->
    <div class="input-group mb-3 position-absolute w-75 shadow-sm" id="search-input">
        <span class="input-group-text bg-white border-0" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
        <input type="text" class="form-control py-3 border-0" placeholder="Enter Keywords..." aria-label="Username" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
    </div>

</header>

    <!-- social media -->
    <section id="social-media" class="my-4">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center text-center">
                <a href="#" class="text-decoration-none text-light mb-2">
                    <small style="background-color: #1DA1F2;" class="py-1 px-3 rounded me-2"><i class="fa-brands fa-twitter me-2"></i>twitter</small>
                </a>
                <a href="#" class="text-decoration-none text-light mb-2">
                    <small style="background-color: #3B5998;" class="py-1 px-3 rounded me-2"><i class="fa-brands fa-facebook me-2"></i>facebook</small>
                </a>
                <a href="#" class="text-decoration-none text-light mb-2">
                    <small style="background-color: #ea00a6;" class="py-1 px-3 rounded me-2"><i class="fa-brands fa-instagram me-2"></i>instagram</small>
                </a>
                <a href="#" class="text-decoration-none text-light mb-2">
                    <small style="background-color: #CB2027;" class="py-1 px-3 rounded me-2"><i class="fa-brands fa-pinterest me-2"></i>pinterest</small>
                </a>
                <a href="#" class="text-decoration-none text-light mb-2">
                    <small style="background-color: #0088CC;" class="py-1 px-3 rounded me-2"><i class="fa-brands fa-telegram me-2"></i>telegram</small>
                </a>
                <a href="#" class="text-decoration-none text-light mb-2">
                    <small style="background-color: #FF4500;" class="py-1 px-3 rounded me-2"><i class="fa-brands fa-reddit me-2"></i>reddit</small>
                </a>
            </div>
        </div>
    </section>
    

    <!-- trending -->
    <section id="trending" class="mb-5">
        <div class="container">
            <div class="d-flex align-items-center mb-3">
                <h2 class="me-4 text-light">Trending</h2>
                <button class="btn btn-sm btn-primary me-3 btn-movies"><i class="fa-solid fa-circle-play me-2"></i>Movies</button>
                <button class="btn btn-sm  btn-light btn-tv-show"><i class="fa-solid fa-list-ul me-2"></i>Tv Show</button>
            </div>
            <!-- trending movies -->
            <div id="trending-movies">
                <div class="row episodes px-3">
                    <x-poster 
                        title="train bullet" 
                        type="movie" 
                        year="2022" 
                        duration="122" 
                        quality="HD"
                        poster="https://m.media-amazon.com/images/M/MV5BMDU2ZmM2OTYtNzIxYy00NjM5LTliNGQtN2JmOWQzYTBmZWUzXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg">
                    </x-poster>
                </div>
            </div>
            <!-- trending tv show -->
            <div id="trending-tv-show" class="d-none">
                <div class="row episodes px-3">
                    <x-poster 
                        title="house of dragon" 
                        type="tv show" 
                        season="1" 
                        episode="5" 
                        quality="HD"
                        poster="https://flxt.tmsimg.com/assets/p22229698_b_v13_ac.jpg">
                    </x-poster>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')
    <script>
        // toggle trending movies and trending tv show
        const doc = document
        const [ trendingMoviesContainer, moviesBtn, trendingTvShowContainer, tvShowBtn ] = [ doc.querySelector('#trending-movies'), doc.querySelector('#trending .btn-movies'), doc.querySelector('#trending-tv-show'), doc.querySelector('#trending button.btn-tv-show') ]
        console.log(moviesBtn.innerHTML)
        moviesBtn.addEventListener('click', () => toggleMoviesAndTvShow(trendingMoviesContainer, moviesBtn,  trendingTvShowContainer, tvShowBtn))
        tvShowBtn.addEventListener('click', () => toggleMoviesAndTvShow(trendingTvShowContainer, tvShowBtn, trendingMoviesContainer, moviesBtn))
        function toggleMoviesAndTvShow(firstSection, firstBtn, secondSection, secondBtn) {
            // console.log('LOOL')
            // const container = firstSection.parentElement
            if (firstSection.classList.contains('d-none')) {
                // console.log('lool')
                firstSection.classList.remove('d-none')
                secondSection.classList.add('d-none')
                firstBtn.classList.replace('btn-light', 'btn-primary')
                secondBtn.classList.replace('btn-primary', 'btn-light')
            }
        }
        
        function fetchByTmdbId(type, id) {
            // console.log(`${api_url}/${type}/${id}?api_key=${api_key}`)
            fetch(`${api_url}/${type}/${id}?api_key=${api_key}`)
            .then(res => res.json())
            .then(data => console.log(data))
        }

        fetchByTmdbId('movie', 333)
        
        const url = window.location.host
        fetch(`trending`)
        .then(r => r.json())
        .then(res => {
            // console.log(res.trendingMovies)
            for (let movie of res.trendingMovies) {
                // console.log(movie.tmdb_id)
                fetchByTmdbId('movie', movie.tmdb_id)
                
            }
        })
    </script>
@endsection