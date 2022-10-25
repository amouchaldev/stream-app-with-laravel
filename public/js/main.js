// console.log('sssqqqoooddd')
const doc = document;
const API_KEY = "4e1ba29d0bd265e3f3eb30d63b771b12";
const API_URL = "https://api.themoviedb.org/3";
const URL = window.location.host
// console.log(doc)
  //function fetch tmdb id from db and then fetch each poster from tmdb
  function fetchPoster(objt, container, containerType, type, routeName, callback = () => {}) {
    // fetch(route)
    // .then(r => r.json())
    // .then(res => {
        for (let movie of objt) {
            // console.log(movie.tmdb_id)
            fetch(`${API_URL}/${type}/${movie.tmdb_id}?api_key=${API_KEY}`)
            .then(res => res.json())
            .then(data => {
                // console.log("type")
                // container type => if it's true then container is a slider if it's false then it's not a slide 
                if (!containerType) {
                    document.querySelector(container).innerHTML += `
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 episode m-0 p-0" data-aos="fade-up">
                        <div class="card border-0 position-relative px-1 bg-transparent">
                            <a href="/${routeName}/${movie.id}" class="d-block">
                                <div class="img-container position-relative w-100">
                                    <img class="card-img-top rounded position-absolute w-100 h-100" src="https://image.tmdb.org/t/p/w500${data.poster_path}" alt="poster">
                                    <div class="overlay bg-dark position-absolute w-100 h-100 top-0 start-0 rounded"></div>
                                    <button class="btn btn-primary position-absolute" style="transform: transalte(-50%, -50%);"><i class="fa-solid fa-circle-play"></i></button>
                                </div>
                            </a>
                        <div class="card-body p-0 mt-2">
                            <h4 class="card-title h6 m-0 text-capitalize text-light title">${type == 'movie' ? data.title : data.name}</h4>
                            <div class="info d-flex justify-content-between text-muted mt-1">
                                <div class="d-flex align-items-center mt-1">
                                    <small class="text-light">${type == 'movie' ? new Date(data.release_date).getFullYear() : new Date(data.first_air_date).getFullYear()}</small>
                                    <span class="d-inline-block bg-secondary dot mx-2"></span>
                                    <small class="text-light">${type == "movie" ? data.runtime + "m" : (data.vote_average).toFixed(2) + '<i class="fa-solid fa-star fa-xs ms-1"></i>'}</small>
                                </div>
                                <small class="border rounded text-light" style="padding: 1px 3px;">${type == "movie" ? "movie" : "tv show"}</small>
                            </div>
                        </div>
                        <strong class="quality position-absolute bg-white p-1 rounded end-0 top-0 m-2 text-capitalize">${movie.quality}</strong>
                        </div>
                    </div>`
                }
                else {
                    document.querySelector(container).innerHTML += `
                    <li class="splide__slide me-2 pb-2" style="width: 195px;">
                        <div class="card border-0 position-relative bg-transparent">
                            <a href="/${routeName}/${movie.id}" class="d-block">
                            <div class="img-container position-relative w-100">
                                <img class="card-img-top rounded position-absolute w-100 h-100" src="https://image.tmdb.org/t/p/w500${data.poster_path}" alt="Title">
                                <div class="overlay bg-dark position-absolute w-100 h-100 top-0 start-0 rounded"></div>
                                <button class="btn btn-primary position-absolute" style="transform: transalte(-50%, -50%);"><i class="fa-solid fa-circle-play"></i></button>
                                </div>
                            </a>
                          <div class="card-body p-0 mt-2">
                            <h4 class="card-title h6 m-0 text-capitalize text-light title">${data.title}</h4>
                            <div class="info d-flex justify-content-between text-muted mt-1">
                                <div class="d-flex align-items-center mt-1">
                                    <small class="text-light">${new Date(data.release_date).getFullYear()}</small>
                                    <span class="d-inline-block bg-secondary dot mx-2"></span>
                                    <small class="text-light">${data.runtime}m</small>
                                </div>
                                <small class="border rounded text-light" style="padding: 1px 3px;">${type}</small>
                            </div>
                          </div>
                          <strong class="quality position-absolute bg-white p-1 rounded end-0 top-0 m-2 text-capitalize">${movie.quality}</strong>
                        </div>
                      </li>`  
                      callback()
                }
            })
        }
    // })
}


// function get informations of type given as argument
function show(objt, type) {
    const LINK = `${API_URL}/${type}/${objt.tmdb_id}?api_key=${API_KEY}`
    fetch(LINK)
    .then(res => res.json())
    .then(data => {
       
        // console.log(data)
        // doc.querySelector('#watch-now').href = ""
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
        doc.querySelector('#trailler .modal-body iframe').src = objt.trailler

    })
}


// function call only in pages that contain serie, this function check if serie has season and episodes and then call fetchBySeason function
function generateEpisodes(className) {    
    if (seasons.length > 0) {
        let current_season = seasons[0];
        fetchEpBySeason(null, current_season, className)
        for (let ss of seasons) {
            seasonList.innerHTML += `<option value="${ss.id}">Season ${ss.season_num}</option>` 
        }
        seasonList.addEventListener('change', e => {
            fetchEpBySeason(e)
        })
    }
    else doc.getElementById('seasonAndEp').innerHTML = "<h3>THIS SERIE HAS NO EPISODE YET</h3>"
}



// function fetch episodes of season that take as argument
function fetchEpBySeason(e = null, current_season, className) {
        episodesContainer.innerHTML = ""
        e != null ? current_season = seasons.find(ss => ss.id == e.target.value) : ""
        fetch(`/episodes/${serie.id}/${ e != null ? e.target.value : current_season.id }`)
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // try {
                    console.log(data.episodes.length)
                    if (data.episodes.length > 0) {
                        for (let ep of data.episodes) {
                            episodesContainer.innerHTML += `
                                <div class="col-6 col-sm-4 col-md-3 ${className} episode episode-num m-0 p-0" data-aos="fade-up">
                                    <a href="/tv/${ep.id}" class="text-decoration-none text-light">
                                    <div class="card bg-transparent border-0 position-relative px-1">       
                                        <div class="img-container position-relative w-100">
                                            <img class="card-img-top rounded position-absolute w-100 h-100" src="${current_season.poster}" alt="Title">
                                            <div class="overlay bg-dark position-absolute w-100 h-100 top-0 start-0 rounded"></div>
                                            <button class="btn btn-primary position-absolute" style="transform: transalte(-50%, -50%);"><i class="fa-solid fa-circle-play"></i></button>
                                        </div>
                                    <div class="card-body p-0 mt-2">
                                        <h4 class="card-title h6 m-0 text-capitalize text-center">Episode ${ep.episode_num}</h4>
                                    </div>
                                    <strong class="quality position-absolute bg-white p-1 rounded end-0 top-0 m-2 text-capitalize text-secondary">${ep.quality}</strong>
                                    </div>
                                </a>
                                </div>
                            ` 
                        }
                    }
                    else {

                        episodesContainer.innerHTML = "<h3 class='pt-2 pb-3 text-capitalize'>this season has no episodes yet</h3>"
                    }
                // }
                // catch ($e) {
                    //  console.log($e)
                // }
            }
        })
    }