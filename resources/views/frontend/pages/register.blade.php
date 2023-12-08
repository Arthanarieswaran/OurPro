@extends('frontend.layouts.master')

@section('main-content')
    <!-- goto home button and spotted place name -->
    <div class="breadcrumbs  bg-secondary" style="height: 7vh;">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list d-flex flex-row mt-3 ">
                            <li><a href="{{route('home')}}">Home<i class="fa-solid fa-arrow-right ms-2"></i></a></li>
                            <li class="active ms-2"><a href="javascript:void(0);">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End goto home button and spotted place name -->
@endsection
