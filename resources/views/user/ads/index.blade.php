@extends('layouts.user')
@section('title')
SellsFree || Ads List
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ads</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ads</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                         Ads
                      </th>
                      <th style="width: 20%">
                         Description
                      </th>
                      <th style="width: 30%">
                         Images
                      </th>
                      
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($ads as $a)
                  <tr>
                      <td>
                          {{$a->id}}
                      </td>
                      <td>
                      Title : {{$a->title}} <br>
                      Adtype : {{$a->adtype}} <br>
                      Price : {{$a->price}} <br>
                      Pricetype : {{$a->pricetype}} <br>
                      Condition : {{$a->condition}} <br>
                      Authenticity : {{$a->authenticity}} <br>
                      </td>
                      <td>
                      {!!$a->description!!}
                      </td>
                      <td>
                      <?php $gellary= json_decode($a->gimage);?>

                          <ul class="list-inline">
                            @foreach($gellary as $g)
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="{{asset('assets/images/ads/'.$g)}}">
                              </li>
                            @endforeach
                              
                          </ul>
                      </td>
                     
                     
                      <td class="project-state">
                          <span class="badge badge-success">Success</span>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                 @endforeach 
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
@endsection