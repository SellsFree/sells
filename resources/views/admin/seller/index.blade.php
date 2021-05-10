@extends('layouts.admin')
@section('title')
SellsFree || Sellers
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <p>Sellers</p>
        </div>

    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Member</th>

            <th>Action</th>
        </tr>
    </thead>
    <?php $i=0; ?>
   
    <?php $i=0; ?>

    <tbody>
        @foreach ($sellers as $key => $user)
        <tr>
            <td>{{$i ++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->created_at }}</td>

            <td>
                <a class="btn btn-info btn-sm" href="{{url('seller-ads/'.$user->id)}}">ads (<?php $ads=App\Models\Post::where('user_id',$user->id)->count(); ?> {{$ads}})</a>
                <a class="btn btn-primary btn-sm" href="#">Report (<?php $report=App\Models\Report::where('user_id',$user->id)->count(); ?> {{$report}})</a>
                <a class="btn btn-dark btn-sm" href="#">Details </a>

            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Member</th>

            <th >Action</th>
        </tr>
    </tfoot>
</table>
@endsection
@section('js')
<script>
$(function() {

    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

});
</script>
@endsection