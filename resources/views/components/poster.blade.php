   <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4 episode m-0 p-0" data-aos="fade-up">
    <div class="card border-0 position-relative px-1 bg-transparent">
        <div class="img-container position-relative w-100">
            <img class="card-img-top rounded position-absolute w-100 h-100" src="{{ $poster }}" alt="{{ $title }}">
            <div class="overlay bg-dark position-absolute w-100 h-100 top-0 start-0 rounded"></div>
            <button class="btn btn-primary position-absolute" style="transform: transalte(-50%, -50%);"><i class="fa-solid fa-circle-play"></i></button>
        </div>
      <div class="card-body p-0 mt-2">
        <h4 class="card-title h6 m-0 text-capitalize text-light">{{ $title }}</h4>
        <div class="info d-flex justify-content-between text-muted mt-1">
            <div class="d-flex align-items-center mt-1">
                <small class="text-light">{{ $type == "movie" ? $year : 'SS ' . $season }}</small>
                <span class="d-inline-block bg-secondary dot mx-2"></span>
                <small class="text-light">{{ $type == "movie" ? $duration . 'm' : 'EPS ' . $episode }}</small>
            </div>
            <small class="border rounded text-light" style="padding: 1px 3px;">{{ $type }}</small>
        </div>
      </div>
      <strong class="quality position-absolute bg-white p-1 rounded end-0 top-0 m-2 text-capitalize">{{ $quality }}</strong>
    </div>
</div>
