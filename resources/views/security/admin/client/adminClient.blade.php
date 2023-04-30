@extends("layouts.admin")
@section('main-page')
    
<div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">Our Clients</h1>
</div>
<div class="panel panel-info sectionsPost">
    <div class="panel-body">
        <h4>PRODUCT LISTS</h4>
        <span style="float: right;position: relative;top: -24px;"><a href="#" class="btn btn-primary" role="button"  onclick="addClient();">Add Client</a></span>
        <div style="background:white;margin-top:2%;">
            <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col" width="2%">#SN</th>
                    <th class="text-center" scope="col" width="20%">Title</th>
                    <th class="text-center" scope="col" width="20%">Name</th>
                    <th class="text-center" scope="col" width="20%">Designation</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col" width="10%">Status</th>
                    <th class="text-center" scope="col" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key => $data)     
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $data->title }}</td>
                        <td class="text-center">{{ $data->name }}</td>
                        <td class="text-center">{{ $data->designation }}</td>
                        <td class="text-center"><img src="{{asset('uploads/images/clients/')}}/{{$data->image}}" alt="5Terre" height="80px" width="100px;"></td> 
                        <td style="text-align: center;">
                            @if($data->status == 0)
                            <a onclick="return confirm('Are you sure active this post?')" href="{{ url('admin/activeClient/'.$data->id) }}"><i class="fa fa-times"  title="active" style="color: red; text-align:center;"></i></a>    
                            @else
                            <a onclick="return confirm('Are you sure Inactive this post?')" href="{{ url('admin/InactiveClient/'.$data->id) }}"><i class="fa fa-check"  title="active" style="color: green; text-align:center;"></i></a>    
                            @endif
                        </td>
                        <td>
                        <i class="fa fa-eye" title="Edit" onClick="viewClient({{ $data->id }})"></i>  
                        <i class="fa fa-pencil-square-o" title="Edit" onClick="editClient({{ $data->id }})"></i>    
                        <i class="fa fa-trash" title="Delete" style="color: red;" onclick="deleteClient({{$data->id}});"></i>
                      </td>    
                    </tr>
                @endforeach                
            </tbody>
            </table>
        </div>
    </div>
</div>

{{-- add Modal --}}
<div id="addModal" class="modal fade" style="margin-top:3%">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="padding:10px">Add Our Client</h4>
            </div>
            <div class="panel panel-default">    
            <div class="panel-body">
                <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveClient') }}" >
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="row">
                      <div class="form-group" >
                        <div class="col-md-12">
                          <label>Title</label>
                          <input type="text" class="form-control"  name="title" required>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group" >
                      <div class="col-md-12">
                        <label>Name</label>
                        <input type="text" class="form-control"  name="name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group" >
                      <div class="col-md-12">
                        <label>Designation</label>
                        <input type="text" class="form-control"  name="designation" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group" >
                      <div class="col-md-12">
                        <label>Short Description</label>
                        <textarea class="form-control" rows="10" name="short_desc"  required></textarea>
                      </div>
                    </div>
                  </div>
                
                  </div>
                  <div class="row">
                      <div class="form-group"  >
                      <div class="col-md-3">
                          <label>Select image to upload:<label><br>
                          <input type="file" name="image" >
                      </div>
                      </div>
                  </div>
                  <div class="row" style="padding-bottom:1%;">
                      <div class="form-group" >
                          <div class="col-md-3">
                          <button type="submit" class="btn btn-default">SAVE</button>
                          </div>
                      </div>
                  </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    </div>
    {{-- End add Modal --}}
{{-- Edit Modal --}}
<div id="editModal" class="modal fade" style="margin-top:3%">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="padding:10px">Edit Our Client</h4>
        </div>
        <div class="panel panel-default">    
        <div class="panel-body">
            <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveClient') }}" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" class="form-control" id="client_id" name="client_id" required>
              <div class="row">
                  <div class="form-group" >
                    <div class="col-md-12">
                      <label>Title</label>
                      <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="form-group" >
                  <div class="col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control"  name="name" id="name" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group" >
                  <div class="col-md-12">
                    <label>Designation</label>
                    <input type="text" class="form-control"  name="designation" id="designation" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group" >
                  <div class="col-md-12">
                    <label>Short Description</label>
                    <textarea class="form-control" rows="10" name="short_desc" id="short_desc" required></textarea>
                  </div>
                </div>
            </div>
            
              </div>
              <div class="row">
                  <div class="form-group"  >
                  <div class="col-md-3">
                      <label>Select image to upload:<label><br>
                      <input type="file" name="image" id="editSectionOneContentImageId"><br>
                      <img src="" alt="" width="100" height="100" id="product_image">
                  </div>
                  </div>
              </div>
              <div class="row" style="padding-bottom:1%;">
                  <div class="form-group" >
                      <div class="col-md-3">
                      <button type="submit" class="btn btn-default">SAVE</button>
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
<div id="viewClientModal" class="modal fade" style="margin-top:3%">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" style="padding:10px">View Our Client</h4>
          </div>
  
          <div class="panel panel-default">    
          <div class="panel-body">
                <div class="row">
                    <div class="form-group" >
                      <div class="col-md-12">
                        <label>Title</label>
                        <input type="text" class="form-control" id="view_title">
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group" >
                    <div class="col-md-12">
                      <label>Name</label>
                      <input type="text" class="form-control"  name="name" id="view_name" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group" >
                    <div class="col-md-12">
                      <label>Designation</label>
                      <input type="text" class="form-control"  name="designation" id="view_designation" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group" >
                    <div class="col-md-12">
                      <label>Short Description</label>
                      <textarea class="form-control" rows="10"  id="view_short_desc" required></textarea>
                    </div>
                  </div>
              </div>
              
                </div>
                <div class="row">
                    <div class="form-group"  >
                    <div class="col-md-3">
                        <label>Client Image:<label><br>
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
  
  {{-- End Active Modal Section one --}}
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
            <input type="hidden" name="client_id" id="deleteClientId">
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
        function viewClient(id){        
            $("#viewClientModal").modal('show');
            var token = "{{csrf_token()}}";
            $.ajax({
                type: 'post',
                url: './editClientDetails',
                data: {id : id, _token :token},
                dataType: 'json',
                success: function(data){
                  $("#view_title").val(data.title);
                  $("#view_name").val(data.name);
                  $("#view_designation").val(data.designation);
                  $("#view_short_desc").text(data.short_desc);
                  var imag= data.image;
                  var image_path="{{URL::asset('uploads/images/clients/')}}/";
                  document.getElementById('view_image').src=image_path+imag;
                  
                },
                error: function( data ){
                    alert(data);
                }
            });
      }
      //view productDetails end
    function editClient(id){        
        $("#editModal").modal('show');
        var token = "{{csrf_token()}}";
        $.ajax({
            type: 'post',
            url: './editClientDetails',
            data: {id : id, _token :token},
            dataType: 'json',
            success: function(data){
              $("#title").val(data.title);
              $("#name").val(data.name);
              $("#designation").val(data.designation);
              $("#short_desc").text(data.short_desc);
              var imag= data.image;
              var image_path="{{URL::asset('uploads/images/clients/')}}/";
             
              document.getElementById('product_image').src=image_path+imag;
              $("#client_id").val(data.id);
              
            },
            error: function( data ){
                alert(data);
            }
        });
    }


    function addClient(){        
        $("#addModal").modal('show');
    }

    function deleteClient(attri){
        $("#deleteModal").modal('show');
        $("#deleteClientId").val(attri);
    }
  /*Submit active*/
  $("#deleteModal").submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'post',
      url: './deleteClientDetails',
      data: $('form').serialize(),
      dataType: 'json',
      success: function( _response ){
        toastr.success("Data deleted successfully");
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

   /*Submit delete*/
   $("#deleteModal").submit(function(event) {
        event.preventDefault();
        $.ajax({
        type: 'post',
        url: './deleteClientDetails',
        data: $('form').serialize(),
        dataType: 'json',
        success: function( _response ){
            toastr.success("Data deleted successfully");
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
