<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

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
            $data= $request->all();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
                Session::put('user',$data['email']);
                // request()->session()->flash('success','Successfully login');
                return redirect()->route('home');
            }
            else{
                // request()->session()->flash('error','Invalid email and password pleas try again!');
                return redirect()->back();
            }
        }


        // register user
        public function registerSubmit(Request $request){
            // return $request->all();
            $this->validate($request,[
                'name'=>'string|required|min:2',
                'email'=>'string|required|unique:users,email',
                'password'=>'required|min:6|confirmed',
            ]);
            $data=$request->all();
            // dd($data);
            $check=$this->create($data);
            Session::put('user',$data['email']);
            if($check){
                request()->session()->flash('success','Successfully registered');
                return redirect()->route('home');
            }
            else{
                request()->session()->flash('error','Please try again!');
                return back();
            }
        }

        public function create(array $data){
            return User::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>Hash::make($data['password']),
                'status'=>'active'
                ]);
        }

        public function logout(){
            Session::forget('user');
            Auth::logout();
            request()->session()->flash('success','Logout successfully');
            return back();
        }

}
