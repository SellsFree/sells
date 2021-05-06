<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TypeController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:type-list|type-create|type-edit|type-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:type-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:type-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:type-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $types = Type::latest()->paginate(5);
        return view('admin.type.index',compact('types'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $type= new Type;
        $type->name=$request->name;
        $type->des=$request->detail;
        $type->slug=Str::slug($request->name);
        if($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'sells-'.rand(100,999) . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('assets/images/type/'),$filename);//image save public folder
          }
        $type->logo=$filename;
        $type->save();
    
        return redirect()->route('types.index')
                        ->with('success','Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.type.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.type.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $type=  Type::where('id',$id)->first();
        $type->name=$request->name;
        $type->des=$request->detail;
        $type->slug=Str::slug($request->name);
        if($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'sells-'.rand(100,999) . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('assets/images/type/'),$filename);//image save public folder
          }
        $type->logo=$filename;
        $type->save();
    
        return redirect()->route('types.index')
                        ->with('success','Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    Type::where('id',$id)->first()->delete();
    
        return redirect()->route('types.index')
                        ->with('success','Type deleted successfully');
    }
}
