@extends('layouts.admin')
@section('title','Sells Free || Zone')
@section('content')
<main class="app-content">

    <div class="app-title">
        <div>
            <h4><i class="fa fa-tags"></i> Zone</h4>
            <p>Zone /  List</p>
        </div>
        <a href="{{url('zone/create')}}" class="btn btn-primary pull-right">Add Zone</a>
    </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
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
                                <th>District</th>
                                <th> Area / Zone </th>
                             
                            
                          
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($zones as $zone)
                               
                                    <tr>
                                      
                                        <td>{{ $zone->id }}</td>
                                        <td>
                                        <?php $divi=App\Models\District::where('slug',$zone->dist_slug)->first(); ?>
                                        {{ @$divi->name }}</td>
                                        <td>{{ $zone->name }}</td>
                                      
                                      
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{url('zone/edit/'.$zone->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('zone/delete/'.$zone->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    </main>
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

