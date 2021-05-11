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
use Image;
class PostController extends Controller
{
    

    public function index(){
        $post=Post::where('user_id',Auth::user()->id)->get();
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


    public function store(Request $request)
    {
        $post= new Post;
        $post->user_id = Auth::user()->id;
        $post->cat_slug = $request->cat_id;
        $post->title = $request->title;        
        $post->divi_slug = $request->divi_id;
        $post->dist_slug = $request->dis_id;
        $post->zone_slug  = $request->zone_id  ;
        $post->adtype = $request->adtype;
        $post->pricetype = $request->pricetype;
        $post->price = $request->price;
        $post->condition = $request->condition;
        $post->authenticity = $request->authenticity;
        $post->description = $request->description;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->email = $request->email;       

        

        $data=array();
        // dd($request->hasfile('gimage'));
        if($request->hasfile('gimage'))
        {
           foreach($request->file('gimage') as $file)
           {
               $name = rand(90000, 999999) .'.'.$file->getClientOriginalExtension();
               $destinationPath = public_path('/assets/images/ads/');
               $img = Image::make($file->getRealPath());
               $img->resize(100,200, function ($constraint) {
                   $constraint->aspectRatio();
               })->save($destinationPath.'/'.$name);             
               $file->move(public_path().'/assets/images/ads/', $name);  
               $data[] = $name; 
              
       }
        }
        $post->gimage=json_encode($data);       
        $post->save();
        
       return back()->with('success', 'Done');
    
    }

}
