@extends("layouts.admin")
@section('main-page')
    
<div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">Gallery</h1>
</div>
<div class="panel panel-info sectionsPost">
    <div class="panel-body">
        <h4>GALLERY LISTS</h4>
        <span style="float: right;position: relative;top: -24px;"><a href="#" class="btn btn-primary" role="button"  onclick="addGallery();">Add Gallery</a></span>
        <div style="background:white;margin-top:2%;">
            <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col" width="2%">#SN</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col" width="10%">Status</th>
                    <th class="text-center" scope="col" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key => $data)    
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center"><img src="{{asset('uploads/images/gallery/')}}/{{$data->image}}" alt="5Terre" height="80px" width="100px;"></td> 
                        <td style="text-align: center;">
                          @if($data->status == 0)
                          <a onclick="return confirm('Are you sure active this post?')" href="{{ url('admin/activeGallery/'.$data->id) }}"><i class="fa fa-times"  title="active" style="color: red; text-align:center;"></i></a>    
                          @else
                          <a onclick="return confirm('Are you sure Inactive this post?')" href="{{ url('admin/InactiveGallery/'.$data->id) }}"><i class="fa fa-check"  title="active" style="color: green; text-align:center;"></i></a>    
                          @endif
                      </td>
                        <td>
                         
                        <i class="fa fa-eye" title="Edit" onClick="viewService({{ $data->id }})"></i>  
                        <i class="fa fa-pencil-square-o" title="Edit" onClick="editService({{ $data->id }})"></i>    
                        <i class="fa fa-trash" title="Delete" style="color: red;" onclick="deleteProduct({{$data->id}});"></i>
                      </td>    
                    </tr>
                @endforeach                
            </tbody>
            </table>
        </div>
    </div>
</div>
{{-- Add Modal --}}
<div id="addModal" class="modal fade" style="margin-top:3%">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" style="padding:10px">Add Gallery</h4>
          </div>
          <div class="panel panel-default">    
          <div class="panel-body">
              <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveGallery') }}" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="row">
                <div class="form-group"  >
                  <div class="col-md-3">
                      <label>Image Type:<label><br>
                      <select class="form-control" name="img_type_id_fk">
                          <option value="0">Select image type</option>
                          @foreach ($gallery_img_types as $key => $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
               </div>
                <div class="row">
                    <div class="form-group"  >
                    <div class="col-md-3">
                        <label>Select image to upload:<label><br>
                        <input type="file" name="image[]" multiple><br>
                    </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom:1%;">
                    <div class="form-group" >
                        <div class="col-md-3">
                        <button type="submit" class="btn btn-default">SAVE</button>
                        <button  class="btn btn-danger" data-dismiss="modal" type="button"> Close</button>
                        </div>
                    </div>
                </div>
              </form>
          </div>
          </div>
      </div>
  </div>
</div>
{{-- End edit Modal --}}
{{-- Edit Modal --}}
<div id="editGalleryModal" class="modal fade" style="margin-top:3%">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" style="padding:10px">Edit Gallery</h4>
          </div>
          <div class="panel panel-default">    
            <div class="panel-body">
              <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveGallery') }}" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" id="edit_id" >
                <div class="row">
                  <div class="form-group"  >
                    <div class="col-md-3">
                        <label>Image Type:<label><br>
                        <select class="form-control" name="img_type_id_fk" id="img_type_id_fk">
                            <option value="0">Select image type</option>
                            @foreach ($gallery_img_types as $key => $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="form-group"  >
                    <div class="col-md-3">
                        <label>Select image to upload:<label><br>
                        <input type="file" name="image" multiple id="editSectionOneContentImageId"><br>
                        <img src="" alt="" width="100" height="100" id="gallery_image">
                    </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom:1%;">
                    <div class="form-group" >
                        <div class="col-md-3">
                        <button type="submit" class="btn btn-default">SAVE</button>
                        <button  class="btn btn-danger" data-dismiss="modal" type="button"> Close</button>
                        </div>
                    </div>
                </div>
              </form>
          </div>
          </div>
      </div>
  </div>
</div>
{{-- End edit Modal --}}
{{-- view Modal --}}
<div id="viewGalleryModal" class="modal fade" style="margin-top:3%">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" style="padding:10px">View Service</h4>
          </div>
  
          <div class="panel panel-default">    
            <div class="panel panel-default">    
              <div class="panel-body">
                <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveService') }}" >
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  </div>
                  <div class="row">
                      <div class="form-group"  >
                      <div class="col-md-3">
                          <label>Select image to upload:<label><br>
                          <input type="file" name="image" id="editSectionOneContentImageId"><br>
                          <img src="" alt="" width="400" height="300" id="view_image">
                      </div>
                      </div>
                  </div>
                 
                </form>
            </div>
          </div>
      </div>
  </div>
  </div>
  {{-- End view Modal --}}
{{-- Delete Modal Section One --}}
<div id="deleteModal" class="modal fade" style="margin-top:3%">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Delete!</h4>
      </div>
      <div class="modal-body">
        <h2>Are You Confirm to Delete This Post?</h2>
        <div class="modal-footer">
          <form id ="deleteForm">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="deleteProductId">
            <button id="DMconfirmButton"  class="btn btn-danger" type="submit" > <span>Confirm</span></button>
            <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal" type="button"> Close</button>
          </form>

        </div>

      </div>
    </div>
  </div>
</div>
{{-- End Delete Modal Section one --}}



<script>

      //view productDetails start
        function viewService(id){        
            $("#viewGalleryModal").modal('show');
            var token = "{{csrf_token()}}";
            $.ajax({
                type: 'post',
                url: './editServiceDetails',
                data: {id : id, _token :token},
                dataType: 'json',
                success: function(data){
                  $("#v_title").val(data.title);
                  $("#v_font").val(data.font);
                  $("#v_short_description").val(data.shortDescription);
                  CKEDITOR.instances['editor3'].setData(data.longDescription);
                  // $("#view_desc").text(data.product_desc);
                  var imag= data.image;
                  var image_path="{{URL::asset('uploads/images/services/')}}/";
                  document.getElementById('view_image').src=image_path+imag;
                  
                },
                error: function( data ){
                    alert(data);
                }
            });
      }
      //view productDetails end
    function editService(id){        
        $("#editGalleryModal").modal('show');
        var token = "{{csrf_token()}}";
        $.ajax({
            type: 'post',
            url: './editGalleryDetails',
            data: {id : id, _token :token},
            dataType: 'json',
            success: function(data){
              console.log(data);
                $("#img_type_id_fk").val(data.img_type_id_fk);
                var imag= data.image;
                var image_path="{{URL::asset('uploads/images/gallery/')}}/";
                document.getElementById('gallery_image').src=image_path+imag;
              
              $("#edit_id").val(data.id);
              
            },
            error: function( data ){
                alert(data);
            }
        });
    }

    function addGallery(){        
        $("#addModal").modal('show');
        var token = "{{csrf_token()}}";
        $.ajax({
            type: 'post',
            url: './editWhyChooseUsDetails',
            data: {id : id, _token :token},
            dataType: 'json',
            success: function(data){
               
                $("#edit_choose_us_title").val(data.choose_title);
                $("#edit_title_details").text(data.choose_details);
                $("#editid").val(data.id);
              
            },
            error: function( data ){
                alert(data);
            }
        });
    }

    function deleteProduct(attri){
        $("#deleteModal").modal('show');
        $("#deleteProductId").val(attri);
    }
  /*Submit delete*/
  $("#deleteModal").submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'post',
      url: './deleteGalleryDetails',
      data: $('#deleteForm').serialize(),
      dataType: 'json',
      success: function( _response ){
        console.log(_response);
        toastr.success("success");
        setTimeout(function(){
          location.reload();
        }, 1500);
      },
      error: function( data ){
        // Handle error
        //alert(data);
        console.log(data);

      }
    });
  });
  /*End Submit delete*/

</script>



<style>
.panel-info{
  margin-top:2%;
  background-color:#e6c4c430;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
.sectionsPost{
  margin-top:2%;
  background-color:#38a56830;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

</style>

@endsection
