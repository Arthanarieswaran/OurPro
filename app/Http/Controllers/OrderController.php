<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderTrack(){
        return view('frontend.pages.order-track');
    }
}
