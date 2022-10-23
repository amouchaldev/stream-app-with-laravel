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
@php
    $currentRoute = Route::currentRouteName(); 
@endphp

<main class="position-relative">
<div id="mv-cover" class="h-100 w-100" 
{{-- style="background-image: url('{{ asset('images/cover.jpg') }}');" --}}
></div>
<div class="overlay position-absolute w-100 h-100 bg-black opacity-50 top-0 start-0"></div>
<a href="{{ $currentRoute == "movies.show" ? route('movie', $movie->id) : "#seasonAndEp" }}" class="btn btn-primary position-absolute" id="cover-btn"><i class="fa-solid fa-play fa-2xl"></i></a>

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
                    <a href="{{ $currentRoute == "movies.show" ? route('movie', $movie->id) : "#seasonAndEp"}}" class="btn btn-primary btn-sm px-3" id="watch-now"><i class="fa-solid fa-play m-2"></i>watch now</a>
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
                                @if($currentRoute == "movies.show")
                                    @foreach($movie->genres as $genre)
                                        <x-genre :link="$genre->name">{{ $genre->name }}</x-genre>
                                    @endforeach   
                                @else 
                                    @foreach($serie->genres as $genre)
                                    <x-genre :link="$genre->name">{{ $genre->name }}</x-genre>
                                    @endforeach   
                                @endif
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
    <x-season-and-ep className="container rounded px-4 pt-3"></x-season-and-ep>
@endif




@endsection

@section('script')
<script>
 
// start movie
    @if(Route::currentRouteName() == "movies.show") 
    let movie = @php echo $movie @endphp;
        console.log('lool')
        show(movie, "movie")
    @endif
// end movie

    
    
    //  console.log() 
</script>
@endsection