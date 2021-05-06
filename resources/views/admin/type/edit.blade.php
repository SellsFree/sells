@extends('layouts.admin')
@section('title')
Types Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('types.index') }}"> Back</a>
            </div> 
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('types.update',$type->id) }}" method="POST" enctype="multipart/form-data">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $type->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
		            <strong>Image:</strong>
		            <input type="file" name="image" class="form-control" placeholder="image">
                   <span><img src="{{asset('assets/images/type/'.$type->logo)}}" height="100" alt=""></span> 
		        </div>
		        </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $type->des }}</textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>



@endsection