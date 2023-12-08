<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function company(){
        $company=CompanyInfo::where('status','active')->get();
        return view('frontend.layouts.header')
        ->with('company',$company);
    }
}
