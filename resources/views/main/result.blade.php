@extends('layouts.app')

@section('content')


@if (Route::currentRouteName() == 'genre')
<section id="trending" class="mb-5 mt-4">
    <div class="container-fluid">
        <div class="d-flex align-items-center mb-3">
            <h2 class="me-4 text-light text-uppercase">{{ $genre }}</h2>
            <button class="btn btn-sm btn-primary me-3 btn-movies"><i class="fa-solid fa-circle-play me-2"></i>Movies</button>
            <button class="btn btn-sm  btn-light btn-tv-show"><i class="fa-solid fa-list-ul me-2"></i>Tv Show</button>
        </div>
        <!-- trending movies -->
        <div id="trending-movies">
            <div class="row episodes px-3">
                {{-- @foreach ($randomMovies as $movie)        
                <x-poster 
                    :title="$movie['name']" 
                    type="movie" 
                    :year="$movie['release_date']" 
                    :runtime="$movie['runtime']" 
                    :quality="$movie['quality']"
                    :poster="$movie['poster']">
                </x-poster>
                @endforeach --}}
            </div>
        </div>
        <!-- trending tv show -->
        <div id="trending-tv-show" class="d-none">
            <div class="row episodes px-3">
                {{-- @foreach($randomEp as $ep)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 episode m-0 p-0" data-aos="fade-up">
                <x-poster 
                    :id="$ep->id"
                    :title="$ep->season()->with('serie')->first()->serie->name" 
                    type="tv show" 
                    :season="$ep->season()->first()->season_num" 
                    :episode="$ep->episode_num" 
                    :quality="$ep->quality"
                    :poster="$ep->season()->first()->poster">
                </x-poster>
            </div>
                @endforeach --}}
            </div>
        </div>
    </div>
</section>
@endif

@if(Route::currentRouteName() == 'movies.index')
<section id="trending" class="mb-5 mt-4">
    <div class="container-fluid">
        <div id="trending-movies">
            <div class="row episodes px-3">
                    {{--  --}}
            </div>
        </div>
    </div>
</section>
@endif

@if(Route::currentRouteName() == 'series.index')
<section id="trending" class="mb-5 mt-4">
    <div class="container-fluid">
        <div id="trending-movies">
            <div class="row episodes px-3">
                    {{--  --}}
            </div>
        </div>
    </div>
</section>
@endif




@endsection

@section('script')

@if(Route::currentRouteName() == 'genre')
<script>
        // toggle trending movies and trending tv show
        // const doc = document
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

    const movies = @php echo $movies; @endphp;
    const series = @php echo $series; @endphp;
        
    fetchPoster(movies, '#trending-movies > .row', false, 'movie', 'movies')
    fetchPoster(series, '#trending-tv-show > .row', false, 'tv', 'series');
</script>
@endif

@if(Route::currentRouteName() == 'movies.index')
<script>
    const movies = @php echo $movies; @endphp;
        
    fetchPoster(movies, '#trending-movies > .row', false, 'movie', 'movies')
</script>
@endif


@if(Route::currentRouteName() == 'series.index')
<script>
    const series = @php echo $series; @endphp;
    fetchPoster(series, '#trending-movies > .row', false, 'tv', 'series')
</script>
@endif

@endsection