<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // home page controller include the header and footer in side of the index.blade.php at master.blade.php
    public function home(){
        return view('frontend.index')->with('error');
    }
}
