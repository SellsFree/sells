@extends('layouts.admin')
@section('title','Sells|| Category')
@section('content')


<p>Category List</p>
        <div class="text-right">
        <a href="{{url('category/create')}}" class="btn btn-primary btn-sm m-2 ">Add Category</a>
          
        </div>
      

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Type </th>
                                <th> Description </th>
                                <th> Logo </th>
                          
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                               
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->type_slug }}</td>
                                        
                                        <td>{{ $category->des }}</td>
                                        <td><img height="100" src="{{asset('assets/images/category/'.$category->logo)}}"></td>
                                      
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <!-- <i class="fa fa-edit"></i> -->

                                            <a href="{{url('category/delete/'.$category->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                             
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
@endsection
@section('js')

<script>
  $(function () { 
    

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
