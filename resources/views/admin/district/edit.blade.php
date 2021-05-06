@extends('layouts.admin')
@section('title','Sells free || District Update')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h5><i class="fa fa-tags"></i> District</h5>
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
                <h3 class="tile-title">Edit Form</h3>
                <form action="{{ url('district/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Division <span class="m-l-5 text-danger">
                                    *</span></label>
                                    <input type="hidden" name="id" value="{{$district->id}}">
                            <select name="divi_id" id="" class="form-control ">
                                @foreach ($divi as $v)
                                <option <?php if ( $district->divi_slug ==$v->slug) {
                                                         echo "selected";
                                                        }  ?> value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control " type="text" name="name" id="name"
                                value="{{$district->name}}" />

                        </div>




                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i>Update District</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href=""><i
                                    class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection