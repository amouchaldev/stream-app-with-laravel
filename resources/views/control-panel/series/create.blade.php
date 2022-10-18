@extends('control-panel.index')
@section('content')
<div class="d-flex align-items-center h-100">
    <x-controlPanel.create route="series.store" method="POST" title="ADD TV SHOW"></x-controlPanel.serie>
</div>
@endsection

@section('script')
<script>

    fetchByTmdbId('tv')

</script>
@endsection