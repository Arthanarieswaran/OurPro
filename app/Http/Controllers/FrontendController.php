<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // goto home page route controller
    public function index(Request $request){
        return redirect()->route($request->user()->role);
    }

    // home page controller include the header and footer in side of the index.blade.php at master.blade.php
    public function home(){
        return view('frontend.index')->with('error');
    }

        // move to login page
        public function login(){
            return view('frontend.pages.login');
        }
        // move to register page
        public function register(){
            return view('frontend.pages.register');
        }


        // login validation
        public function loginSubmit(Request $request){
                return redirect()->back();
        }

}
