@extends('layouts.app')
@php 
    $current_route = Route::currentRouteName();
@endphp

@section('style')
<style>
    #seasonAndEp {
        margin-top: 0;
        background-image: none;
    }
</style>
@endsection

@section('content')
    <!-- stream servers -->
<section class="container-fluid mt-3 mb-2" >
    <div class="alert alert-warning">If you get any error message when trying to stream, please Refresh the page or switch to another streaming server.
    </div>
    <div class="d-flex flex-column rounded" id="stream-servers">
            <ul class="d-flex text-light list-unstyled justify-content-around">
                @if($current_route == "movie") 
                    @foreach($movie->streams as $server)
                        <li class="pt-3 pb-1" data-link="{{ $server->link }}">{{ $server->name }}</li>
                    @endforeach
                @else 
                    @foreach($episode->streams as $server)
                        <li class="pt-3 pb-1" data-link="{{ $server->link }}">{{ $server->name }}</li>
                    @endforeach
                @endif
            </ul>
        <div id="player">
            <iframe src="{{ $current_route == "movie" ? $movie->streams[0]->link ?? null : $episode->streams[0]->link ?? null}}" frameborder="0" class="w-100 h-100"></iframe>
        </div>
    </div>
</section>





<div class="container-fluid">
    @if($current_route == "movie")
    @foreach($movie->genres as $genre)
        <x-genre :link="$genre->name" className="py-1 px-2 bg-dark">{{ $genre->name }}</x-genre>
    @endforeach    
    @else 
    @foreach($serie->genres as $genre)
        <x-genre :link="$genre->name" className="py-1 px-2 bg-dark">{{ $genre->name }}</x-genre>
    @endforeach  
    @endif
</div>

@if(Route::currentRouteName() == "tv") 
<div class="row mt-5">

    <div class="col-12 col-md-8">
        {{-- @if(Route::currentRouteName() == "tv")  --}}
            <x-season-and-ep className="container-fluid"></x-season-and-ep>
    </div>

    <div class="col-12 col-md-4">
        @endif

        <!-- download servers -->
        <section class="container-fluid @if(Route::currentRouteName() == "movie") mt-5 @endif" id="download-servers">
            <!-- <button class="btn btn-primary mb-3 py-2 px-4" >Download Servers</button> -->
            <h3 class="mb-3 text-light h2">Download Servers</h3>
            <div class="d-flex flex-column rounded" >
                <div class="">
                    <ul class="d-flex flex-wrap text-light list-unstyled justify-content-start">
                        @if($current_route == "movie")
                            @foreach($movie->downloads as $server)
                                <li class="py-3 px-5 rounded bg-dark-blue me-2 mb-2 text-center">
                                    <a href="{{ $server->link }}" target="_blank" class="d-flex align-items-center text-decoration-none text-light">
                                        <i class="fa-solid fa-cloud-arrow-down me-3"></i>
                                    <div>
                                        <span>{{ $server->name }}</span>
                                        <br>
                                        <span>{{ $server->quality }}</span>
                                    </div>
                                    </a>
                                </li>
                            @endforeach
                        @else 
                        @foreach($episode->downloads as $server)
                            <li class="py-3 px-5 rounded bg-dark-blue me-2 mb-2 text-center">
                                <a href="{{ $server->link }}" target="_blank" class="d-flex align-items-center text-decoration-none text-light">
                                    <i class="fa-solid fa-cloud-arrow-down me-3"></i>
                                <div>
                                    <span>{{ $server->name }}</span>
                                    <br>
                                    <span>{{ $server->quality }}</span>
                                </div>
                                </a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </section>     
        @if(Route::currentRouteName() == "tv")    
    </div>


</div>    
@endif




@endsection

@section('script')
    <script>
        // switch between streaming servers
        const streamingServers = doc.querySelectorAll('#stream-servers ul li')
        console.log(streamingServers)
        streamingServers.forEach(link => {
            link.addEventListener('click', () => {
                // console.log(link.getAttribute('data-link'))
                doc.querySelector('#player iframe').setAttribute('src', link.getAttribute('data-link'))
            })
        });
        console.log('from player')
    </script>
@endsection






