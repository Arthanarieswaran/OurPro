@extends('frontend.layouts.master')

@section('main-content')
    <div class="d-flex flex-row">
        {{-- sidbar divition --}}
        <div>
            @include('frontend.user.sidebar')
        </div>
        {{-- main dashboard divtion --}}
        <div class="d-block flex-column container-fluid ms-3 mt-1">

        </div>

    </div>
@endsection
