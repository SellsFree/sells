@extends('layouts.admin')
@section('title')
Types Show
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <p> Show Type</p>
            </div>
            <div class="text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('types.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $type->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $type->des }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              
                <img src="{{asset('assets/images/type/'.$type->logo)}}" height="300" alt="">
            </div>
        </div>
    </div>
@endsection
