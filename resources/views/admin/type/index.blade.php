@extends('layouts.admin')
@section('title')
Types 
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Type</h2>
            </div>
            <div class="text-right">
                @can('type-create')
                <a class="btn btn-success btn-sm" href="{{ route('types.create') }}"> Create New Type</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Image</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($types as $type)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $type->name }}</td>
            <td><img src="{{asset('assets/images/type/'.$type->logo)}}" height="100" alt=""></td>
	        <td>{{ $type->des }}</td>
	        <td>
              
                    <a class="btn btn-info btn-sm" href="{{ route('types.show',$type->id) }}">Show</a>
                    @can('type-edit')
                    <a class="btn btn-primary btn-sm" href="{{ route('types.edit',$type->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('type-delete')
                   <a class="btn btn-danger btn-sm" href="{{ url('types/delete/'.$type->id) }}">delete</a>
                    @endcan
                
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $types->links() !!}



@endsection