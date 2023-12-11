@extends('frontend.layouts.master')


@section('title','Order Track Page')

@section('main-content')
    <!-- goto home button and spotted place name -->
    {{-- <div class="breadcrumbs  bg-secondary" style="height: 7vh;">
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
    </div> --}}
    <!-- End goto home button and spotted place name -->


    <!-- Shop Login -->
    <div>
            <section class="log_reg_back">
                <div class="container-flued ">
                    <div class="log_reg_card mt-1 shadow bg-white  rounded d-flex flex-row">
                        <div class="col-6">
                             <img class="log_reg_img" src="{{asset('images/logreg.png')}}" alt="">
                        </div>
                        <div class="col-6 d-block flex-column ms-5 mt-2">
                            {{-- login header divition --}}
                                <div class="d-flex flex-row justify-content-center">
                                    <h4 class="fw-bold ps-2">Sign Up</h4>
                                    <div class="socil_log">
                                        <i class="fa-brands fa-facebook"></i>
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </div>
                                </div>
                                {{-- login form --}}
                                <form action="{{route('register.submit')}}" method="post" class="form log-reg-form">
                                    @csrf
                                        {{-- user name divition --}}
                                        <div class="mt-2 mb-2">
                                            <div class="form-group has-search">
                                                <label for="name" class="form-label">User Name <span class="text-danger">*</span></label>
                                                <span class="fa fa-user form-control-feedback" id="name"></span>
                                                <input type="text" class="form-control" name="name" placeholder="User Name" id="name" required="required" value="{{old('name')}}">
                                                @error('name')
                                                  <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                          {{-- Email divition --}}
                                        <div class="mt-2 mb-2">
                                            <div class="form-group has-search">
                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <span class="fa fa-search form-control-feedback" id="email"></span>
                                                <input type="text" class="form-control" name="email" placeholder="Email" id="email" required="required" value="{{old('email')}}">
                                                @error('email')
                                                  <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- password divition --}}
                                        <div class="mt-2 mb-2">
                                            <div class="form-group has-search">
                                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                <span class="fa fa-key form-control-feedback" class="password"></span>
                                                <input type="password" name="password" class="form-control" placeholder="Password" id="password" value="{{old('password')}}">
                                            </div>
                                            @error('password')
                                             <span class="text-danger">{{$message}}</span>
                                             @enderror
                                        </div>
                                        {{-- conform password divition --}}
                                        <div class="mt-2 mb-2">
                                            <div class="form-group has-search">
                                                <label for="password_confirmation" class="form-label">Conform Password <span class="text-danger">*</span></label>
                                                <span class="fa fa-lock form-control-feedback" class="password"></span>
                                                <input class="form-control" type="password" name="password_confirmation" placeholder="Conform PAssword" required="required" value="{{old('password_confirmation')}}">
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- button divition --}}
                                        <div>
                                            <div class="col-md-4 col-sm-6 mb-3 ">
                                                <button class="btn  log-reg-btn" type="submit">Register</button>
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
                                    <p class="ms-2"><a href="{{route('login.form')}}" class="text-success">Sign In</a></p>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <!--/ End Login -->
@endsection
