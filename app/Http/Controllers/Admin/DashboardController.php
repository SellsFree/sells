<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function seller_ads($id){
        $ads= Post::where('user_id',$id)->orderBy('id','DESC')->get();
        return view('admin.seller.ads')->with('ads',$ads);
    }

    public function all_ads(){
        $ads=Post::orderBy('id','DESC')->get();
        return view('admin.ads.index')->with('ads',$ads);
    }
}
