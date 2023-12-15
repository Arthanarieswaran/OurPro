{{-- @extends('frontend.layouts.master')<!--used for loder, Header, Footer, Notification--> --}}
{{-- @section('main-content') --}}
{{-- write u r code --}}
        {{-- first category part --}}
        <section class="catogory">
            <div class="container-fluid">
                <div class="d-flex flex-row ml-2 mr-2" style="justify-content: center">
                    @php
                        $category_list=DB::table('categories')->where('status','active')->get();
                    @endphp
                    @if ($category_list)
                        @foreach ($category_list as $category)
                            <div class="" style="margin-left: 2vh">
                                <a href="{{route('product-cat',$category->slug)}}" class="ml-2 mr-2"><img class="shadow p-1 mb-2 cat-img ml-2 mr-2" src="" alt="">a</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        {{-- <section class="product-list">
            <div class="container-fluid">
                <div class="d-flex flex-row ml-2 mr-2" style="margin-left: 30vh">
                    @php
                    $product_list=DB::table('product_info')->where('status','active')->get();
                    @endphp
                    @if ($product_list)
                        @foreach ($product_list as $product)
                            <div class="card p-2 d-flex flex-column">
                                <div class="">
                                    <img class="mb-2 p-1" src="" alt="test">
                                </div>
                                <div class="d-flex flex-column">
                                    <h3>{{$product->product_name}}</h3>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section> --}}

{{-- @endsection --}}
