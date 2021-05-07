<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }
    public function profile(){
        $user= User::where('id',Auth::user()->id)->first();
        return view('user.profile')->with('user',$user);
    }

    public function profile_update(Request $request){
        $user= User::where('id',Auth::user()->id)->first();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        if($request->hasFile('photo')) {
            $img_ext = $request->file('photo')->getClientOriginalExtension();
            $filename = 'sells-'.rand(100,999) . time() . '.' . $img_ext;
            $path = $request->file('photo')->move(public_path('assets/images/users/'),$filename);//image save public folder
          }
        $user->photo=$filename;
        $user->save();
    
        return back()->with('success','Profile Upadte successfully.');
    }
}
