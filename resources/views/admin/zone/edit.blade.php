@extends('layouts.admin')
@section('title','Sells Free || Zone Create')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Zone</h1>
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
                <h3 class="tile-title">Zone / Area Edit</h3>
                <form action="{{ url('zone/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    <div class="form-group">
                    <input type="hidden" name="id" value="{{$zone->id}}">
                            <label class="control-label" for="name">District <span class="m-l-5 text-danger"> *</span></label>
                           <select name="dis_id" id=""  class="form-control ">
                           @foreach ($dis as $v)
                           <option <?php if ($zone->dis_slug==$v->slug) {
                               echo "selected";
                           } ?> value="{{$v->slug}}">{{$v->name}}</option>
                           @endforeach
                           </select>
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="name" id="name" value="{{$zone->name}}"/>
                          
                        </div>
                     
                       
                        
                      
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Zone</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href=""><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
@endsection

