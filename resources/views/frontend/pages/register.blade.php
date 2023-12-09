@extends('frontend.layouts.master')


@section('title','Order Track Page')

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


    <!-- Shop Login -->
    <div>
            <section class="log_reg_back">
                <div class="container-flued ">
                    <div class="log_reg_card mt-5 shadow bg-white  rounded d-flex flex-row">
                        <div class="col-6">
                             <img class="log_reg_img" src="{{asset('images/logreg.png')}}" alt="">
                        </div>
                        <div class="col-6 d-block flex-column ms-5 mt-5">
                            {{-- login header divition --}}
                                <div class="d-flex flex-row justify-content-center">
                                    <h4 class="fw-bold ps-2">Sign Up</h4>
                                    <div class="socil_log">
                                        <i class="fa-brands fa-facebook"></i>
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </div>
                                </div>
                                {{-- login form --}}
                                <form action="{{route('register.submit')}}" method="post" class="log-reg-form">
                                    @csrf
                                        {{-- user name divition --}}
                                        <div class="mt-3 mb-3">
                                            <div class="form-group has-search">
                                                <label for="user_name" class="form-label">User Name</label>
                                                <span class="fa fa-user form-control-feedback" id="user_name"></span>
                                                <input type="text" class="form-control" placeholder="User Name" id="name">
                                                {{-- @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror --}}
                                            </div>
                                        </div>
                                          {{-- Email divition --}}
                                        <div class="mt-3 mb-3">
                                            <div class="form-group has-search">
                                                <label for="email" class="form-label">Email</label>
                                                <span class="fa fa-search form-control-feedback" id="email"></span>
                                                <input type="text" class="form-control" placeholder="Email" id="email">
                                            </div>
                                        </div>
                                        {{-- password divition --}}
                                        <div class="mt-3 mb-3">
                                            <div class="form-group has-search">
                                                <label for="password" class="form-label">Password</label>
                                                <span class="fa fa-key form-control-feedback" class="password"></span>
                                                <input type="text" class="form-control" placeholder="Password" id="password">
                                            </div>
                                        </div>
                                        {{-- button divition --}}
                                        <div>
                                            <div class="col-md-4 col-sm-6 mb-3 ">
                                                <button class="btn  log-reg-btn" type="submit">Sign Up</button>
                                            </div>
                                        </div>
                                </form>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="form-check float-left">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Remember Me
                                        </label>
                                    </div>
                                    {{-- <div style="margin-left: 20vh;">
                                        <a href="">Forget Password</a>
                                    </div> --}}
                                </div>
                                <div class="d-flex flex-row justify-content-center mt-3">
                                    <p>I already have a account ? </p>
                                    <p class="ms-2"><a href="" class="text-success">Sign In</a></p>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <!--/ End Login -->
@endsection
