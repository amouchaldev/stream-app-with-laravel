<section id="{{ $sectionId }}" class="mb-5">
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="me-4 text-light">{{ $sectionTitle }}</h2>
            <a href="#" class="text-decoration-none text-light">view more <i class="fa-solid fa-circle-chevron-right fa-sm ms-2"></i></a>
        </div>

        <div class="latest-movies">
            <section class="splide {{ $slideClassName }}" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                      <ul class="splide__list">
                        @foreach($slideData as $data)
                          <li class="splide__slide" style="width: 195px;">
                            @if($type = "movie")
                                <x-poster 
                                    title="train bullet" 
                                    type="movie" 
                                    year="2022" 
                                    duration="122" 
                                    quality="HD"
                                    poster="https://m.media-amazon.com/images/M/MV5BMDU2ZmM2OTYtNzIxYy00NjM5LTliNGQtN2JmOWQzYTBmZWUzXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg">
                                </x-poster>
                            @else
                                <x-poster 
                                    title="house of dragon" 
                                    type="tv show" 
                                    season="1" 
                                    episode="5" 
                                    quality="HD"
                                    poster="https://flxt.tmsimg.com/assets/p22229698_b_v13_ac.jpg">
                                </x-poster>
                            @endif
                          </li>
                        @endforeach
                      </ul>
                </div>
              </section> 
        </div>
    </div>
</section>