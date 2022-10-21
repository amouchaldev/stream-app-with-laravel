@extends('layouts.app')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/lux/bootstrap.min.css" integrity="sha512-c92Fgo6BOkdn6SLfXJQb1gBV26zNssZQwtkLPFoMX0B5JXd+yeOo0nx5v3rEYsjvMy97CpIRdsV4HA+AysY2Eg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

@section('style')
    <style>     
        main {
            height: 90vh!important;
        }

        nav  {
            background-color: #000;
            /* background-image: url("{{ asset('images/Curve-Line.svg') }}");
            background-size: cover;
            background-position: left; */
        }
    </style>
@endsection
@section('content')


<main class="position-relative">
<div id="mv-cover" class="h-100 w-100" 
{{-- style="background-image: url('{{ asset('images/cover.jpg') }}');" --}}
></div>
<div class="overlay position-absolute w-100 h-100 bg-black opacity-50 top-0 start-0"></div>
<a href="#seasonAndEp" class="btn btn-primary position-absolute" id="cover-btn"><i class="fa-solid fa-play fa-2xl"></i></a>

<!-- info -->
    <div class="info bg-white rounded container position-absolute p-4 shadow">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 mb-3 mb-lg-0 ">
                <div class="poster">
                    <img src="" id="mv-poster" alt="poster" class="w-100 h-100 rounded">
                </div>

            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="d-flex justify-content-between mb-3 align-items-center">
                    <a href="#seasonAndEp" class="btn btn-primary btn-sm px-3" id="watch-now"><i class="fa-solid fa-play m-2"></i>watch now</a>
                    <a href="#" class="btn btn-light btn-sm px-3 py-2"><i class="fa-solid fa-plus me-2"></i>Add to favorite</a>
                </div>
                <h2 class="mb-3"><a href="#" class="text-decoration-none text-black" id="mv-name">Bullet Train</a></h2>
                <div class="mb-3">
                    <a class="btn btn-outline-dark btn-sm me-2" href="" id="mv-trailler"><i class="fa-solid fa-video me-1"></i> trailler</a>
                    <button class="btn btn-outline-dark btn-sm fw-bold me-2" id="mv-quality">HD</button>
                    <button class="btn btn-outline-warning btn-sm fw-bold" >IMDB: <span class="quality" id="mv-rate">8.5</span></button>
                </div>
                <p class="mb-3" id="mv-description">Unlucky assassin Ladybug is determined to do his job peacefully after one too many gigs gone off the rails. Fate, however, may have other plans, as Ladybug's latest mission puts him on a collision course with lethal adversaries from around the globe—all with connected, yet conflicting, objectives—on the world's fastest train.</p>
                <div>
                    <div class="row">
                        <ul class="list-unstyled col-12 col-lg-6">
                            <li class="mb-1"><strong>Released:</strong> <span class="text-muted" id="mv-release_date"> 2022</span></li>
                            <li class="pe-5 mb-1"><strong>Genre:</strong> 
                                <a href="#" class="text-decoration-none text-black text-muted">Action</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Drama</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">Comedy</a>,
                            </li>
                           
                        </ul>
                        <ul class="list-unstyled col-12 col-lg-6">
                            <li class="mb-1"><strong>Duration:</strong><span class="text-muted" id="mv-runtime"> 129</span></li>
                            <li class="mb-1"><strong>Casts:</strong> 
                                <a href="#" class="text-decoration-none text-black text-muted">travis fimmel</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">emelia clarck</a>,
                                <a href="#" class="text-decoration-none text-black text-muted">gal gadot</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@if(Route::currentRouteName() == "series.show")
    <section id="seasonAndEp" class="container rounded text-light mb-4 p-5 shadow-sm rounded bg-dark">
        <!-- select season -->
        <select class="form-select" aria-label="Default select example" id="seasons">
            {{-- <option value="1" selected>Season 1</option>
            <option value="2">Season 2</option>
            <option value="3">Season 3</option>
            <option value="4">Season 4</option> --}}
        </select>
        <h2 class="my-3">Episodes</h2>
        <div id="seasonEp">
            <div class="row">
                <!-- start movie -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 episode episode-num m-0 p-0" data-aos="fade-up">
                    <div class="card bg-transparent border-0 position-relative px-1">
                        <div class="img-container position-relative w-100">
                            <img class="card-img-top rounded position-absolute w-100 h-100" src="assets/images/posters/s-l1600.jpg" alt="Title">
                            <div class="overlay bg-dark position-absolute w-100 h-100 top-0 start-0 rounded"></div>
                            <button class="btn btn-primary position-absolute" style="transform: transalte(-50%, -50%);"><i class="fa-solid fa-circle-play"></i></button>
                        </div>
                    <div class="card-body p-0 mt-2">
                        <h4 class="card-title h6 m-0 text-capitalize text-center">Episode 1</h4>
                    </div>
                    <strong class="quality position-absolute bg-white p-1 rounded end-0 top-0 m-2 text-capitalize text-secondary">HD</strong>
                    </div>
                </div>
                <!-- end movie -->
            </div>
        </div>
    </section>
@endif




@endsection

@section('script')
<script>
    function show(objt, type) {
        const LINK = `${API_URL}/${type}/${objt.tmdb_id}?api_key=${API_KEY}`
        fetch(LINK)
        .then(res => res.json())
        .then(data => {
           
            // console.log(data)
            doc.querySelector('#watch-now').href = ""
            doc.querySelector('#mv-cover').style.backgroundImage = `url(https://image.tmdb.org/t/p/w500${data.poster_path})`
            // doc.querySelector('#mv-cover').style.backgroundColor = "#000"
            doc.querySelector('#mv-poster').src = `https://image.tmdb.org/t/p/w500${data.poster_path}`
            doc.querySelector('#mv-name').innerHTML = type == "movie" ? data.title : data.name
            doc.querySelector('#mv-description').innerHTML = data.overview
            // doc.querySelector('#mv-homepage').href = data.homepage
            doc.querySelector('#mv-rate').innerHTML = (data.vote_average).toFixed(2)
            doc.querySelector('#mv-runtime').innerHTML = data.runtime
            doc.querySelector('#mv-runtime').innerHTML = " " + data.runtime + " min"
            if(type == "tv") {
                doc.querySelector('#mv-runtime').previousElementSibling.innerHTML = "Status:" 
                doc.querySelector('#mv-runtime').innerHTML = " " + data.status
            }
            doc.querySelector('#mv-release_date').innerHTML = type == "movie" ? new Date(data.release_date).toLocaleDateString() : new Date(data.first_air_date).toLocaleDateString()
            doc.querySelector('#mv-quality').innerHTML = objt.quality
        })
    }

    @if(Route::currentRouteName() == "movies.show") 
    let movie = @php echo $movie @endphp;
        console.log('lool')
        show(movie, "movie")
    @endif


    @if(Route::currentRouteName() == "series.show") 
    const serie = @php echo $serie @endphp;
    const seasons = @php echo $serie->seasons()->get() @endphp;
    // const episodes = @php echo $serie->season @endphp;
        // console.log('lool')
        // console.log(seasons.length)
        const seasonList = document.getElementById('seasons')
        for (let ss of seasons) {
            seasonList.innerHTML += `<option value="${ss.id}">Season ${ss.season_num}</option>` 
        }
        show(serie, "tv")
    @endif
    //  console.log() 
</script>
@endsection