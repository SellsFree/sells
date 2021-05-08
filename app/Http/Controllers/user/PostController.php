<?php
namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
class PostController extends Controller
{
    

    public function index(){
        $post=Post::where('user_id',Auth::user()->id)->first();
        return view('user.ads.index')->with('ads',$post);
    }
}
