@extends('control-panel.index')

@section('content')
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card w-75">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
@endsection
