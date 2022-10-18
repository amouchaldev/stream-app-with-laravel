
@extends('control-panel.index')
@section('content')
<div class="d-flex align-items-center h-100">
    <x-controlPanel.create route="movies.store" method="POST" title="ADD MOVIE"></x-controlPanel.create>
</div>
@endsection

@section('script')
<script>

fetchByTmdbId('movie')

</script>
@endsection