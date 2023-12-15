<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    // goto home page route controller
    public function index(Request $request){
        return redirect()->route($request->user()->role);
    }

    // home page controller include the header and footer in side of the index.blade.php at master.blade.php
    public function home(){
        $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();
        $product=Product::where('status','active')->get();
        return view('frontend.index')->with('category_lists',$category)
                                        ->with('product_list',$product);
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



        public function productCat(Request $request){
            $products=Category::getProductByCat($request->slug);
            // return $request->slug;
            $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

            if(request()->is('e-shop.loc/product-grids')){
                return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
            }
            else{
                return view('frontend.pages.cat-pro-lists')->with('products',$products->products)->with('recent_products',$recent_products);
            }

        }


        public function productFilter(Request $request){
            $data= $request->all();
            // return $data;
            $showURL="";
            if(!empty($data['show'])){
                $showURL .='&show='.$data['show'];
            }

            $sortByURL='';
            if(!empty($data['sortBy'])){
                $sortByURL .='&sortBy='.$data['sortBy'];
            }

            $catURL="";
            if(!empty($data['category'])){
                foreach($data['category'] as $category){
                    if(empty($catURL)){
                        $catURL .='&category='.$category;
                    }
                    else{
                        $catURL .=','.$category;
                    }
                }
            }

            $brandURL="";
            if(!empty($data['brand'])){
                foreach($data['brand'] as $brand){
                    if(empty($brandURL)){
                        $brandURL .='&brand='.$brand;
                    }
                    else{
                        $brandURL .=','.$brand;
                    }
                }
            }
            // return $brandURL;

            $priceRangeURL="";
            if(!empty($data['price_range'])){
                $priceRangeURL .='&price='.$data['price_range'];
            }
            if(request()->is('e-shop.loc/product-grids')){
                return redirect()->route('product-grids',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
            else{
                return redirect()->route('product-lists',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
    }


    public function productDetail($slug){
        // $product_detail= Product::getProductBySlug($slug);
        // dd($product_detail);
        return view('frontend.pages.product-details');//->with('product_detail',$product_detail);
    }

    public function productBrand(Request $request){
        $products=Brand::getProductByBrand($request->slug);
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }

    }

    public function productSubCat(Request $request){
        $products=Category::getProductBySubCat($request->sub_slug);
        // return $products;
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->sub_products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->sub_products)->with('recent_products',$recent_products);
        }

    }


    public function productGrids(){
        $products=Product::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids);
            // return $products;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(9);
        }
        // Sort by name , price, category


        return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }
}
