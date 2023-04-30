@extends("layouts.admin")
@section('main-page')
<!-- <style type="text/css">
	
	.service{
		margin:3%,
    display:none;
	}
  </style> -->

<div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">App Privacy Policy</h1>
</div>
<div class="panel panel-info sectionsPost">
    <div class="panel-body">
        <h4>App LISTS</h4>
        <span style="float: right;position: relative;top: -24px;"><a href="{{route('app.create')}}" class="btn btn-primary" role="button">Add App</a></span>
        <div style="background:white;margin-top:2%;">
            <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col" width="20%">Serial No</th>
                    <th class="text-center" scope="col" width="20%">App Name</th>
                    <th class="text-center" scope="col"width="20%">Privacy Policy</th>
                    <th class="text-center" scope="col" width="20%">Terms and Condition</th>
                    <th class="text-center" scope="col" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($app as $key => $data) 
              <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td class="text-center">{{ $data->app_name }}</td>
                <td class="text-center">{!! $data->privacy_policy!!} </td>
                <td class="text-center">{!! $data->tearms_and_condition!!} </td>
                <td >
                    <a href="{{ route('app.edit',$data->id) }}"><i class="fa fa-pencil-square-o" title="Edit"></i></a>
                    <i class="fa fa-trash" title="Delete" style="color: red;" onclick="deleteApp({{ $data->id }});"></i>
                    
                
                </td>
             </tr>
             @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
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
                <input type="hidden" name="app_id" id="deleteAppId">
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
  function deleteApp(attri){
    $("#deleteModal").modal('show');
        $("#deleteAppId").val(attri);
    }
    
   /*Submit delete*/
  $("#deleteModal").submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'post',
      url: './deleteAppDetails',
      data: $('form').serialize(),
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



































        @endsection