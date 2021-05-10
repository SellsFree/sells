<?php
namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Division;
use App\Models\District;
use App\Models\Zone;
use Illuminate\Http\Request;
use Auth;
class PostController extends Controller
{
    

    public function index(){
        $post=Post::where('user_id',Auth::user()->id)->first();
        return view('user.ads.index')->with('ads',$post);
    }

    public function create(){
        $category= Category::all();
        $division= Division::all();
        return view('user.ads.create')->with('category',$category)->with('division',$division);
    }

    public function district($id){
        $dist = District::where('divi_slug', $id)->get()->toArray();       
        return response()->json($dist);
    }
    public function zone($id){
        $zone = Zone::where('dist_slug', $id)->get()->toArray();       
        return response()->json($zone);
    }
}
