<form action="{{ route($route) }}" class="w-100 text-light p-4 rounded" method="POST">
    @csrf
    @method($method)
    @if(session()->has('status')) 
        <p class="alert alert-light">{{ session()->get('status') }}</p>
    @endif
    <h2>{{ $title }}</h2>
    {{-- tmdb id --}}
    <div class="mb-3">
        <label for="tmdb_id" class="form-label">tmdb id</label>
        <input type="text" class="form-control bg-transparent text-light" id="tmdb_id" name="tmdb_id" value="{{ old('tmdb_id') }}">
        @error('tmdb_id') <p class="text-warning">{{ $message }}</p> @enderror
        <x-button type="outline-light" bsClass="mt-3">GET</x-button>
    </div>

    {{-- name --}}
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control bg-transparent text-light" id="name" name="name" value="{{ old('name') }}">
        @error('name') <p class="text-warning">{{ $message }}</p> @enderror
    </div>

    {{-- quality --}}
    <div class="mb-3">
        <label for="quality" class="form-label">quality</label>
        <input type="text" class="form-control bg-transparent text-light" id="quality" name="quality" value="{{ old('quality') }}">
        @error('quality') <p class="text-warning">{{ $message }}</p> @enderror
    </div>

    <div class="d-grid">
        <x-button type="outline-light">add</x-button>
    </div>

</form> 