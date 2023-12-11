{{-- the header part have a two nav bar 1). sub navbar 2). main navbar --}}
<div>
    <div>
        {{-- company info getting php code --}}
        @php
            $company=DB::table('company_info')->where('status','active')->get();
        @endphp
        {{-- first navabr (sub navbar)--}}
        <nav>
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
                                            <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">Dashboard</a></li>
                                        @else
                                            <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank"><i class="fa-solid fa-user me-2"></i>{{Auth()->user()->name}}<span class="ms-2">/</span></a></li>
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
        <nav>
            <div>

            </div>
        </nav>
    </div>
</div>
