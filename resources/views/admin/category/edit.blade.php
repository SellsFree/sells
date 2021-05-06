@extends('layouts.admin')
@section('title','SellsFree || Category Update')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h5><i class="fa fa-tags"></i> Category Update</h5>
        </div>
    </div>
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
             
                <form action="{{ url('categories/update') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$categories->id}}">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="name" id="name" value="{{$categories->name}}"/>
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Type <span class="m-l-5 text-danger"> *</span></label>
                           
                                <select id="my-select" class="form-control" name="type_slug">
                                <option >Select One</option>
                                @foreach($type as $ty)
                                    <option <?php if ( $ty->slug==$categories->type_slug) {
                                      echo "selected";
                                    } ?> value="{{$ty->slug}}">{{$ty->name}}</option>
                                @endforeach
                                </select>                        
                           
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea class="form-control" rows="4" name="des" id="description">{{$categories->des}}</textarea>
                        </div>
                        
                       
                           
                        <div class="form-group">
                            <label class="control-label">Category Image</label>
                            <input class="form-control " type="file" id="image" name="image"/>
                            <span><img src="{{asset('assets/images/category/'.$categories->logo)}}" height="100" alt=""></span> 
                        </div>
                 
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Category</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href=""><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
@endsection

