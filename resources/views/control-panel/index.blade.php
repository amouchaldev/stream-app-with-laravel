<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])
    <style>
        body {
            background: #000000;
        }
        main .content{
            height: 100vh;
            overflow-y: scroll;
        }
    </style>
</head>
<body>
    <main class="row h-100">
        <div class="col-2 bg-dark d-flex align-items-center justify-content-center">
            <ul class="p-0 text-center">
                <li class="py-2"><a href="{{ route('home') }}" class="text-decoration-none text-light">home</a></li>
                <li class="py-2"><a href="{{ route('movies.create') }}" class="text-decoration-none text-light">add movie</a></li>
                <li class="py-2"><a href="{{ route('series.create') }}" class="text-decoration-none text-light">add serie</a></li>
                <li class="py-2"><a href="#" class="text-decoration-none text-light">add season</a></li>
                <li class="py-2"><a href="#" class="text-decoration-none text-light">add episode</a></li>
                <li class="py-2"><a href="#" class="text-decoration-none text-light">add movie</a></li>
                <li class="py-2"><a href="#" class="text-decoration-none text-light">log out</a></li>
            </ul>
        </div>
        <div class="col-10 content">
            @yield('content')
        </div>
    </main>

<script>        
    const api_key = "4e1ba29d0bd265e3f3eb30d63b771b12";
    const api_url = "https://api.themoviedb.org/3";

    function fetchByTmdbId(type) {  
        const tmdb_id = document.querySelector('#tmdb_id')
        document.querySelector('form button').addEventListener('click', e => {
            e.preventDefault()
            fetch(`${api_url}/${type}/${tmdb_id.value}?api_key=${api_key}`)
                .then(res => res.json())
                .then(data => {
                    document.querySelector('#name').value = type == "movie" ? data.title : data.original_name
                })
        })
    }
</script>
    @yield('script')
</body>
</html>