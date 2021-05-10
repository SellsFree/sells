@extends('layouts.user')
@section('title','SellsFree || ads create')
@section('content')
<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
<!--=====================================-->
        <!--=        Post Add Start    			=-->
        <!--=====================================-->

        @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
      
        <section class="">
            <div class="container">
                <div class="post-ad-box-layout1 light-shadow-bg">
                    <div class="post-ad-form light-box-content">
                        <div class="h5 text-center">
                       <b><u> Ads Create</u></b>  </div>
                       
                        <form action="{{url('ads-post')}}" method="post" enctype="multipart/form-data" id="imageUploadForm">
                        @csrf
                            <div class="post-section post-type">
                               
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Ad Type
                                            <span>*</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control select-box" name="adtype">
                                                <option value="0">--Select Type--</option>
                                                <option value="sell">Sell</option>
                                                <option value="buy">Buy</option>
                                                <option value="exchange">Exchange</option>
                                                <option value="job">Job</option>
                                                <option value="to-let">To-Let</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-section post-category">
                               
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Category
                                            <span>*</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control select-box" name="cat_id" id="cat">
                                                <option value="0">--Select a category--</option>
                                                @foreach($category as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="post-section post-information">
                                <div class="post-ad-title">
                                    <i class="fas fa-folder-open"></i>
                                    <p class="item-title"><b>Product Information</b> </p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Title
                                            <span>*</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title" id="post-title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Price Type
                                            <span>*</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control select-box" name="pricetype">
                                                <option value="Fixed">Fixed</option>
                                                <option value="Negotiable">Negotiable</option>
                                                <option value="On Call">On Call</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Price [৳]
                                            
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="price" id="post-price">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Condition
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-check form-radio-btn">
                                                <input class="form-check-input" type="radio" id="exampleRadios1" name="condition" value="new">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    New
                                                </label>
                                            </div>
                                            <div class="form-check form-radio-btn">
                                                <input class="form-check-input" type="radio" id="exampleRadios2" name="condition" value="used">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Used
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                              
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Authenticity
                                            
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-check form-radio-btn">
                                                <input class="form-check-input" type="radio" id="exampleRadios3" name="authenticity" value="original">
                                                <label class="form-check-label" for="exampleRadios3">
                                                    Original
                                                </label>
                                            </div>
                                            <div class="form-check form-radio-btn">
                                                <input class="form-check-input" type="radio" id="exampleRadios4" name="authenticity" value="copy">
                                                <label class="form-check-label" for="exampleRadios4">
                                                    Copy
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Description <span>*</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <textarea name="description" class="form-control textarea" id="description" cols="30" rows="8" require></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="post-section post-img">
                                <div class="post-ad-title">
                                    <i class="far fa-image"></i>
                                    <p class="item-title"> <b>Images</b> </p>
                                </div>
                                <div class="form-group">
                                    <div class="img-gallery">
                                        <div class="img-upload">
                                            
                                            <div class="row">
                                            <div class="col-sm-3">
                                        <label class="control-label">
                                            Image
                                            <span>*</span>
                                        </label>
                                    </div>
                                                <div class="col-md-9">
                                               
                                                <input name="gimage[]" id="files" type="file" class="form-control"  multiple="multiple" accept="image/jpg, image/jpeg" require>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="post-section post-contact">
                                <div class="post-ad-title"> 
                                    <i class="fas fa-user"></i>
                                    <p class="item-title"> <b>Contact Details</b></p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Division
                                            <span>*</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control select-box" id="divi" name="divi_id" require>
                                                <option value="">Select One</option>
                                                @foreach ($division as $divi)
                                                <option value="{{$divi->slug}}">{{$divi->name}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            District
                                            <span>*</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control select-box" id="dis" name="dis_id" require>
                                                <option value="0">Select District </option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Thana
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                        <select class="form-control select-box" id="zone" name="zone_id" require>
                                                <option value="0">Select Thana</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Address
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <textarea name="address" class="form-control textarea" id="address" cols="30" rows="2" require ></textarea >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Phone
                                            <span>*</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" value="" class="form-control" name="phone" id="phone" require>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="control-label">
                                            Email
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="email"  class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="submit" class="submit-btn" value="Submit Listing">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        @endsection
        @section('js')
        <script>
$(document).ready(function() {
//header for csrf-token is must in laravel
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#divi').change(function() {
    // $('#dis').empty();
    var catid = $(this).val();
    console.log(catid);
    var url = "{{URL::to('/')}}";
    $.ajax({
        type: "GET",
        url: url + '/getdistrict/' + catid,
        data: {},
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            if (data) {
                $.each(data, function(key, value) {
                    // alert(key);
                    $('#dis').append('<option value="' + value.slug +
                        '">' + value.name + '</option>');
                });
            }
        },
    });
});

// zone /area
$('#dis').change(function() {
    // $('#zone').empty();
    var zoneid = $(this).val();
    // console.log(catid);
    var url = "{{URL::to('/')}}";
    $.ajax({
        type: "GET",
        url: url + '/getzone/' + zoneid,
        data: {},
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            if (data) {
                $.each(data, function(key, value) {
                    // alert(key);
                    $('#zone').append('<option value="' + value.slug +
                        '">' + value.name + '</option>');
                });
            }
        },
    });

});

// category 
$('#cat').change(function() {
    $('#subcat').empty();
    var catid = $(this).val();
    // console.log(catid);
    var url = "{{URL::to('/')}}";
    $.ajax({
        type: "GET",
        url: url + '/getsubcat/' + catid,
        data: {},
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            if (data) {
                $.each(data, function(key, value) {
                    // alert(key);
                    $('#subcat').append('<option value="' + value.id +
                        '">' + value.name + '</option>');
                });
            }
        },
    });

});

$("#image").on("change", function() {
    if ($("#image")[0].files.length > 5) {
        alert("You can select only 5 images");
    } else {
        $("#imageUploadForm").submit();
    }
});

});
        </script>

<script>
// $(document).ready(function() {
//   if (window.File && window.FileList && window.FileReader) {
//     $("#files").on("change", function(e) {
//       var files = e.target.files,
//         filesLength = files.length;
//       for (var i = 0; i < filesLength; i++) {
//         var f = files[i]
//         var fileReader = new FileReader();
//         fileReader.onload = (function(e) {
//           var file = e.target;
//           $("<span class=\"pip\">" +
//             "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
//             "<br/><span class=\"remove\">X</span>" +
//             "</span>").insertAfter("#files");
//           $(".remove").click(function(){
//             $(this).parent(".pip").remove();
//           });
          
//           // Old code here
//           /*$("<img></img>", {
//             class: "imageThumb",
//             src: e.target.result,
//             title: file.name + " | Click to remove"
//           }).insertAfter("#files").click(function(){$(this).remove();});*/
          
//         });
//         fileReader.readAsDataURL(f);
//       }
//     });
//   } else {
//     alert("Your browser doesn't support to File API")
//   }
// });
</script>
        
        @endsection