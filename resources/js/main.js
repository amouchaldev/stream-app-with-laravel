// // console.log('sssqqqoooddd')
// const doc = document;
// const API_KEY = "4e1ba29d0bd265e3f3eb30d63b771b12";
// const API_URL = "https://api.themoviedb.org/3";
// const URL = window.location.host
// // console.log(doc)
//   //function fetch tmdb id from db and then fetch each poster from tmdb
//   function fetchPoster(route, container, containerType, type, routeName, callback = () => {}) {
//     fetch(route)
//     .then(r => r.json())
//     .then(res => {
//         for (let movie of res) {
//             // console.log(movie.tmdb_id)
//             fetch(`${API_URL}/${type}/${movie.tmdb_id}?api_key=${API_KEY}`)
//             .then(res => res.json())
//             .then(data => {
//                 console.log("type")
//                 // container type => if it's true then container is a slider if it's false then it's not a slide 
//                 if (!containerType) {
//                     document.querySelector(container).innerHTML += `
//                     <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 episode m-0 p-0" data-aos="fade-up">
//                         <div class="card border-0 position-relative px-1 bg-transparent">
//                             <a href="/${routeName}/${movie.id}" class="d-block">
//                                 <div class="img-container position-relative w-100">
//                                     <img class="card-img-top rounded position-absolute w-100 h-100" src="https://image.tmdb.org/t/p/w500${data.poster_path}" alt="poster">
//                                     <div class="overlay bg-dark position-absolute w-100 h-100 top-0 start-0 rounded"></div>
//                                     <button class="btn btn-primary position-absolute" style="transform: transalte(-50%, -50%);"><i class="fa-solid fa-circle-play"></i></button>
//                                 </div>
//                             </a>
//                         <div class="card-body p-0 mt-2">
//                             <h4 class="card-title h6 m-0 text-capitalize text-light title">${type == 'movie' ? data.title : data.name}</h4>
//                             <div class="info d-flex justify-content-between text-muted mt-1">
//                                 <div class="d-flex align-items-center mt-1">
//                                     <small class="text-light">${type == 'movie' ? new Date(data.release_date).getFullYear() : new Date(data.first_air_date).getFullYear()}</small>
//                                     <span class="d-inline-block bg-secondary dot mx-2"></span>
//                                     <small class="text-light">${type == "movie" ? data.runtime + "m" : (data.vote_average).toFixed(2) + '<i class="fa-solid fa-star fa-xs ms-1"></i>'}</small>
//                                 </div>
//                                 <small class="border rounded text-light" style="padding: 1px 3px;">${type == "movie" ? "movie" : "tv show"}</small>
//                             </div>
//                         </div>
//                         <strong class="quality position-absolute bg-white p-1 rounded end-0 top-0 m-2 text-capitalize">${movie.quality}</strong>
//                         </div>
//                     </div>`
//                 }
//                 else {
//                     document.querySelector(container).innerHTML += `
//                     <li class="splide__slide me-2 pb-2" style="width: 195px;">
//                         <div class="card border-0 position-relative bg-transparent">
//                             <a href="/${routeName}/${movie.id}" class="d-block">
//                             <div class="img-container position-relative w-100">
//                                 <img class="card-img-top rounded position-absolute w-100 h-100" src="https://image.tmdb.org/t/p/w500${data.poster_path}" alt="Title">
//                                 <div class="overlay bg-dark position-absolute w-100 h-100 top-0 start-0 rounded"></div>
//                                 <button class="btn btn-primary position-absolute" style="transform: transalte(-50%, -50%);"><i class="fa-solid fa-circle-play"></i></button>
//                                 </div>
//                             </a>
//                           <div class="card-body p-0 mt-2">
//                             <h4 class="card-title h6 m-0 text-capitalize text-light title">${data.title}</h4>
//                             <div class="info d-flex justify-content-between text-muted mt-1">
//                                 <div class="d-flex align-items-center mt-1">
//                                     <small class="text-light">${new Date(data.release_date).getFullYear()}</small>
//                                     <span class="d-inline-block bg-secondary dot mx-2"></span>
//                                     <small class="text-light">${data.runtime}m</small>
//                                 </div>
//                                 <small class="border rounded text-light" style="padding: 1px 3px;">${type}</small>
//                             </div>
//                           </div>
//                           <strong class="quality position-absolute bg-white p-1 rounded end-0 top-0 m-2 text-capitalize">${movie.quality}</strong>
//                         </div>
//                       </li>`  
//                       callback()
//                 }
//             })
//         }
//     })
// }

// console.log('mmm')