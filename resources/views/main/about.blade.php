@extends('layouts.app')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/lux/bootstrap.min.css" integrity="sha512-c92Fgo6BOkdn6SLfXJQb1gBV26zNssZQwtkLPFoMX0B5JXd+yeOo0nx5v3rEYsjvMy97CpIRdsV4HA+AysY2Eg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

@section('style')
    <style>     
        main {
            height: 90vh!important;
        }

        nav  {
            background-color: #000;
        }
    .modal-body {
        width: 787px;
        height: 439px;
        left: 50%;
        transform: translate(-50%, 0);
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
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-light btn-sm px-3 py-2" id="add-to-favorite"><i class="fa-solid fa-plus me-2"></i>Add to favorite</a>
                    @endguest
                    @auth
                        @if($isFav == null)
                            <button class="btn btn-light btn-sm px-3 py-2" id="add-to-favorite"><i class="fa-solid fa-plus me-2"></i>Add to favorite</button>
                        @endif

                        @if($isFav != null)
                            <button class="btn btn-light btn-sm px-3 py-2" id="remove-favorite"><i class="fa-solid fa-minus me-2"></i>remove from favorite</button>
                        @endif
                    @endauth

                </div>
                <h2 class="mb-3"><a href="#" class="text-decoration-none text-black" id="mv-name">Bullet Train</a></h2>
                <div class="mb-3">
                    <button class="btn btn-outline-dark btn-sm me-2"  data-bs-toggle="modal" data-bs-target="#trailler" id="mv-trailler"><i class="fa-solid fa-video me-1"></i> trailler</button>
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


<!-- Trailler Modal -->
<div class="modal fade" id="trailler" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-transparent">
        <div class="modal-body p-0">
          <iframe src="" frameborder="0" class="w-100 h-100"></iframe>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    {{-- jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
 
// start movie
    @if(Route::currentRouteName() == "movies.show") 
        let movie = @php echo $movie @endphp;
        // console.log('lool')
        show(movie, "movie")
    @endif

    @if(Route::currentRouteName() == "series.show") 
        let movie = @php echo $serie @endphp;        
    @endif
// end movie

// add to favorite     
// const addToFavBtn = doc.getElementById('add-to-favorite')
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const route = (window.location.href).split("/");
    // add to favorite:
    function addFav() {
        const addToFavBtn = $("#add-to-favorite");
        // console.log(removeFavBtn)
        addToFavBtn.on("click", function () {
            $.ajax({
                type: "POST",
                url: "/favorite/" + movie.id + "/store",
                data: {
                    route: route[3],
                },
                success: function (response) {
                    console.log(response)
                    if (response == "true") {
                        addToFavBtn.replaceWith(`<button class="btn btn-light btn-sm px-3 py-2" id="remove-favorite"><i class="fa-solid fa-minus me-2"></i>remove from favorite</button>`);
                        removeFav()
                        // sweetAlert("success", "Added To Favorite Successfully")
                        Swal.fire({
                        position: 'center',
                        icon: "success",
                        title: "Added To Favorite Successfully",
                        showConfirmButton: false,
                        timer: 1300
                        })
                    }
                }
            });
        });
    }
    // delete from favorite:
    function removeFav() {
            const removeFavBtn = $("#remove-favorite");
            removeFavBtn.on("click", function () {
                $.ajax({
                    type: "DELETE",
                    url: "/favorite/" + movie.id + "/delete",
                    data: {
                        route: route[3],
                    },
                    success: function (response) {
                        // console.log(response)
                        if (response == "success") {
                            removeFavBtn.replaceWith(`<button class="btn btn-light btn-sm px-3 py-2" id="add-to-favorite"><i class="fa-solid fa-plus me-2"></i>Add to favorite</button>`);
                            addFav()
                            Swal.fire({
                            position: 'center',
                            icon: "success",
                            title: "Removed From Favorite Successfully",
                            showConfirmButton: false,
                            timer: 1300
                            })
                        }
                    }
                });
        });
    }

    removeFav()
    addFav()
</script>
@endsection