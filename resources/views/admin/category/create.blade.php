@extends('layouts.admin')
@section('title','Sells Free  || Category Create')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h5><i class="fa fa-tags"></i> Category</h5>
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
               
                <form action="{{ url('categories/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="name" id="name" value=""/>
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Type <span class="m-l-5 text-danger"> *</span></label>
                           
                                <select id="my-select" class="form-control" name="type_slug">
                                <option >Select One</option>
                                @foreach($type as $ty)
                                    <option value="{{$ty->slug}}">{{$ty->name}}</option>
                                @endforeach
                                </select>
                            
                           
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea class="form-control" rows="4" name="des" id="description"></textarea>
                        </div>
                        
                       
                           
                        <div class="form-group">
                            <label class="control-label">Category Image</label>
                            <input class="form-control " type="file" id="image" name="image"/>
                          
                        </div>
                 
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href=""><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
@endsection

