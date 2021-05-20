@extends('layouts.admin')
@section('title')
Seller || Ads List
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
            <h3 class="card-title">Ads</h3>

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
                    @foreach($ads as $ad)
                    <tr>
                        <td>
                            {{$ad->id}}
                        </td>
                        <td>
                            <a>
                              Title :  {{$ad->title}}
                            </a>
                            <br />
                            <a>
                              Price :  {{$ad->price}}
                            </a>
                            <br />

                            <a>
                              Price Type:  {{$ad->pricetype}}
                            </a>
                            <br />
                            <a>
                              Condition :  {{$ad->condition}}
                            </a>
                            <br />
                            <a>
                            Authenticity  : {{$ad->authenticity}}
                            </a>
                            <br />
                            <small>
                                {{$ad->created_at}}
                            </small>
                        </td>
                        <td>
                            <?php $gellary= json_decode($ad->gimage);?>

                             
                               <span><img alt="Avatar" class="" src="{{asset('assets/images/ads/'.$gellary[0])}}" height ="120" width="150"></span>
                                    
                                
                              

                           
                        </td>

                        <td class="project-state">
                        <?php if ($ad->status==null) {?>
                          <span class="badge badge-danger">Inactive</span>
                       <?php } else{?>
                        <span class="badge badge-success">Active</span>
                        <?php } ?>
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