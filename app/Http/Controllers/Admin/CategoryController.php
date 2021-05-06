<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::orderBy('name','ASC')->get();
        return view('admin.category.index')->with('categories',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=Type::all();
        return view('admin.category.create')->with('type',$type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category= new Category;
        // dd($category);
        $category->name=$request->name;
        $category->type_slug=$request->type_slug;
        $category->slug=Str::slug($request->name);
        $category->des= $request->des;
        if($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'sells-'.rand(100,999) . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('assets/images/category/'),$filename);//image save public folder
          }
          $category->logo=$filename;
        $category->save();
        return back()->with('success','Category is Inserted !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $type=Type::all();
        $category= Category::where('id',$id)->first();
        return view('admin.category.edit')->with('categories',$category)->with('type',$type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category= Category::where('id',$request->id)->first();
        // dd($category);
        $category->name=$request->name;
        $category->slug=str::slug($request->name);
        $category->des= $request->des;
if ($request->file('image')) {  

        if($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'sells-'.rand(100,999) . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('assets/images/category/'),$filename);//image save public folder
          }
          $category->logo=$filename;
        }
        $category->save();
        return back()->with('success','Category is Update !!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete( $id)
    {
        $category=Category::where('id',$id)->delete();
        return back()->with('success','Category has been deleted !!');
    }
}
