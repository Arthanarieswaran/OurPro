{{-- the header part have a two nav bar 1). sub navbar 2). main navbar --}}
<div>
    <div>
        {{-- company info getting php code --}}
        @php
            $company=DB::table('company_info')->where('status','active')->get();
        @endphp
        {{-- first navabr (sub navbar)--}}
        <nav class="first-nav">
            <div class="container-fluid nav bg-dark" style="height: 4vh; width:100%;">
                {{-- support and mail --}}
               @if ($company)
                @foreach ($company as $company_data)
                    <div class="col-lg-4">
                        <ul class="d-flex flex-row justify-content-center mt-1">
                            <li class="mr-2"><i class="fa-solid fa-headset me-2"></i>Support : {{$company_data->ph_no}} /</li>
                            <li class="ms-2"><i class="fa-regular fa-envelope me-2"></i>&nbsp;{{$company_data->email}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-4"></div>
                    {{-- track order and login/reg --}}
                    <div class="col-lg-4">
                        <ul class="d-flex flex-row justify-content-center nav-log">
                            <li class="mr-2 mt-1"><i class="fa-solid fa-headset me-2"></i><a href="{{route('order.track')}}">Track Order</a></li>
                            {{-- log/reg --}}
                            <div class="log-reg">
                                {{-- this auth funtion call for login register.once login user show user name and logout otherwise show login and register --}}
                                @auth
                                    <div class="d-flex flex-row mt-1 ms-5">
                                        @if (Auth::user()->role=='admin')
                                            <li><i class="ti-user"></i> <a href="{{route('admin')}}" >Dashboard</a></li>
                                        @else
                                            <li><i class="ti-user"></i> <a href="{{route('user.profile')}}"  ><i class="fa-solid fa-user me-2"></i>{{Auth()->user()->name}}<span class="ms-2">/</span></a></li>
                                        @endif
                                            <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">&nbsp;&nbsp;<i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a></li>
                                        @else
                                            <ul class="d-flex flex-row mr-2 mt-1 position-fixed">
                                                <i class="fa-solid fa-right-to-bracket text-light me-2 mt-1"></i>
                                                <li><a href="{{route('login.form')}}">Login /</a> </li>
                                                <li>&nbsp;<a href="{{route('register.form')}}">Register</a></li>
                                            </ul>
                                    </div>
                                @endauth

                            </div>
                        </ul>
                    </div>
                @endforeach
               @endif
            </div>
        </nav>
        {{-- first navbar end --}}
        {{-- second nav bar (main navbar)--}}
        <nav class="second-nav">
            <div class="shadow-sm p-3  bg-white rounded second-nav d-flex flex-row">
                {{-- logo divition --}}
                <div class="col-2">
                    <img class="nav-logo ms-4" src="{{asset('images/nature.png')}}" alt="">
                </div>
                {{-- search and list divition --}}
                <div class="col-lg-2 ms-5 d-block flex-column serch-div">
                    {{-- serch divtion --}}
                    <div class="form-group has-search">
                        {{-- <label for="email" class="form-label">Email <span class="text-danger">*</span></label> --}}
                        <span class="fa fa-search form-control-feedback" id="email"></span>
                        <input type="text" name="email" required="required" class="form-control" placeholder="Email" value="{{old('email')}}" style="width: 90vh">
                        {{-- <span class="fa fa-search form-control-feedback" id="email"></span> --}}
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    {{-- list divition --}}
                    <div class="d-flex flex-row">
                        <div class="mt-2" style="margin-left: 20vh;">
                            <ul class="list-group d-flex flex-row  list-unstyled">
                              <li class="nav-item me-4 text-dark">Home</li>
                              <li class="nav-item me-4 text-dark ">Shop</li>
                              {{-- <li class="nav-item me-4 text-dark">Account</li> --}}
                              <li class="nav-item me-4 text-dark">Pages</li>
                              <li class="nav-item me-4 text-dark">Blog</li>
                              <li class="nav-item me-4 text-dark">Docs/Components</li>
                            </ul>
                          </div>
                          <div class="d-flex flex-row mt-2 " style="margin-left: 10vh;">
                              <ul class="list-group d-flex flex-row list-unstyled">
                                <li class="nav-item text-dark">Spacial/offer</li><div class="vr ms-3 me-3 mt-1"></div>
                                <li class="nav-item text-dark">Spacial/Purchase</li>
                              </ul>
                          </div>
                    </div>
                </div>
                {{-- cart wishlist divitoin --}}
                <div class="d-flex flex-row cart-div">
                    {{-- cart div --}}
                    <div class="badge  rounded-circle mt-3 " style="background-color: #f9f7f7; height: 35px; width: 35px; margin-left: 30vh;">
                        <a href="cart" class="list-unstyled text-dark">
                          <span class="position-absolute  translate-middle p-1 ms-4 bg-danger border border-light rounded-circle">
                            <span class="">4</span>
                          </span>
                          <i class="fa-solid fa-cart-shopping pt-1 text-dark fs-6"></i>
                        </a>
                    </div>
                    {{-- wishlist div --}}
                    <div class="badge  rounded-circle mt-3 " style="background-color: #f9f7f7; height: 35px; width: 35px; margin-left: 4vh; ">
                        <span class="position-absolute  translate-middle p-1 ms-4 bg-danger border border-light rounded-circle">
                          <span class="">4</span>
                        </span>
                        <i class="fa-regular fa-heart pt-1 text-dark fs-6"></i>
                    </div>
                </div>

            </div>
        </nav>,
    </div>
</div>
