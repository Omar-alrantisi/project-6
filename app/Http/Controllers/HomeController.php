<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){

            $categories=Category::all();
            return view('dashboard.manage_category',compact('categories'));

        }else{
            $categories=Category::all();
            return view('public_site.category_cards',compact('categories'));
        }
    }
}
