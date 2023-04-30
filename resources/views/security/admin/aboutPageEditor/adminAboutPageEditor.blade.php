@extends("layouts.admin")
@section('main-page')
  <div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">About us</h1>
  </div>
  <div class="panel panel-info sectionsPost">
      <div class="panel-body">
          <h4>Add Post For First Section</h4>
          <form id="firstSectionContents"  style="background:white;margin-top:2%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

             <div class="row">
                <div class="form-group" >
                  <div class="col-md-6">
                    <label>Small Title</label>
                    <input type="text" class="form-control" name="small_title" required>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="form-group" >
                <div class="col-md-6">
                  <label>Big Title</label>
                  <input type="text" class="form-control" name="big_title" required>
                </div>
              </div>
            </div>
            <div class="row">
               <div class="form-group" >
                 <div class="col-md-6">
                   <label>Short Content</label>
                   <textarea class="form-control" rows="10" name="short_content" required></textarea>
                 </div>
               </div>
           </div>
           <div class="row">
            <div class="form-group" >
              <div class="col-md-6">
                <label>Long Content</label>
                <textarea class="form-control" rows="10" name="long_content" required></textarea>
              </div>
            </div>
        </div>
           <div class="row">
             <div class="form-group"  >
               <div class="col-md-3">
                 <label>Select image to upload:<label><br>
                <input type="file" name="firstSectionImage" id="image" required>
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

         <div class="row">
          @foreach($aboutBackGrounds as $aboutBackGround)
           <div class="col-sm-6 col-md-6">
             <div class="thumbnail">
                 <img src="{{asset('uploads/images/about/')}}/{{$aboutBackGround->image}}" alt="5Terre" >
               <div class="caption">
                 <p style="padding-bottom:5px;">{{$aboutBackGround->small_title}} </p>
                 <p style="padding-bottom:5px; font-size:20px;"><strong>{{$aboutBackGround->big_title}}</strong></p>
                 <p style="padding-bottom:5px; font-size:13px; font-weight:600">{{$aboutBackGround->short_content}}</p>
                 <p>{{$aboutBackGround->long_content}}</p>
                 <p><a href="#" class="btn btn-primary" role="button"  onclick="editFunctionSectionOne({{$aboutBackGround->id}});">Edit</a>
                 <a href="#" class="btn btn-danger" role="button"  onclick="delFunctionSectionOne({{$aboutBackGround->id}});">Delete</a></p>
               </div>
             </div>
           </div>
          @endforeach
         </div>

     </div>
  </div>



  {{-- Edit Modal --}}
  <div id="editModalSectionOne" class="modal fade" style="margin-top:3%">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Edit Section One Contents</h4>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">Edit Contents</div>
                  <div class="panel-body">
                    <form id="editSectionOneContents"  style="background:white;margin-top:2%;">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="hiddenSectionOneContentEdit" id="hiddenSectionOneContentIdEdit" >

                       <div class="row">
                          <div class="form-group" >
                            <div class="col-md-6">
                              <label>Small Title</label>
                              <input type="text" class="form-control" id="small_title" name="small_title" required>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group" >
                          <div class="col-md-6">
                            <label>Big Title</label>
                            <input type="text" class="form-control" id="big_title" name="big_title" required>
                          </div>
                        </div>
                    </div>
                      <div class="row">
                         <div class="form-group" >
                           <div class="col-md-6">
                             <label>Short Content</label>
                             <textarea class="form-control" rows="10" name="short_content" id="short_content" required></textarea>
                           </div>
                         </div>
                     </div>
                     <div class="row">
                      <div class="form-group" >
                        <div class="col-md-6">
                          <label>Short Content</label>
                          <textarea class="form-control" rows="10" name="long_content" id="long_content" required></textarea>
                        </div>
                      </div>
                  </div>
                     <div class="row">
                       <div class="form-group"  >
                         <div class="col-md-3">
                           <label>Select image to upload:<label><br>
                          <input type="file" name="editSectionOneContentImage" id="editSectionOneContentImageId">
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



  {{-- Delete Modal --}}
  <div id="deleteModal" class="modal fade" style="margin-top:3%">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Delete!</h4>
        </div>
        <div class="modal-body">
          <h2>Are You Confirm to Delete This BackGround Image?</h2>

          <div class="modal-footer">
            <form id ="deleteForm">
              <input type="hidden" name="deleteBackGround" id="deleteBackGroundId">
              <button id="DMconfirmButton"  class="btn btn-danger" type="submit" > <span>Confirm</span></button>
              <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal" type="button"> Close</button>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
  {{-- End Delete Modal --}}





  {{-- Delete Modal Section One --}}
  <div id="deleteModalSectionOne" class="modal fade" style="margin-top:3%">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Delete!</h4>
        </div>
        <div class="modal-body">
          <h2>Are You Confirm to Delete This Post?</h2>
          <div class="modal-footer">
            <form id ="deleteForm">
              <input type="hidden" name="deleteContentSectionOne" id="deleteContentSectionOneId">
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
$( document ).ready(function() {
  $("#backGroundForm").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("backGroundForm");
    var formData = new FormData(form);
    $.ajax({
      type: 'post',
      url: './addBackGroundAbout',
      data: formData,
      enctype: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData:false,
      dataType: 'json',
      success: function( _response ){
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



  $("#firstSectionContents").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("firstSectionContents");
    var formData = new FormData(form);

    $.ajax({
      type: 'post',
      url: './firstSectionContentsOfAbout',
      data: formData,
      enctype: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData:false,
      dataType: 'json',
      success: function( _response ){
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






  $("#secondSectionContents").submit(function(event) {
    event.preventDefault();
    var formData = $('form').serialize();

    $.ajax({
      type: 'post',
      url: './secondSectionContentsOfServices',
      data: formData,
      dataType: 'json',
      success: function( _response ){
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

  /*Edit Section Contents*/
  $("#editSectionOneContents").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("editSectionOneContents");
    var formData = new FormData(form);
    $.ajax({
      type: 'post',
      url: './editFirstSectionContentsOfAbout',
      data: formData,
      enctype: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData:false,
      dataType: 'json',
      success: function( _response ){
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

/*Edit Section Contents*/




  /*Submit delete*/
  $("#deleteModal").submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'post',
      url: './deleteBackgroundImageAbout',
      data: $('form').serialize(),
      dataType: 'json',
      success: function( _response ){
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




  /*Submit delete Section One*/
  $("#deleteModalSectionOne").submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'post',
      url: './aboutDeletePostSectionOne',
      data: $('form').serialize(),
      dataType: 'json',
      success: function( _response ){
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
  /*End Submit delete Section ONe*/






});
function delFunction(attri){
  $("#deleteModal").modal('show');
  $("#deleteBackGroundId").val(attri);
}

function editFunctionSectionOne(attri){
  $("#editModalSectionOne").modal('show');
  $("#hiddenSectionOneContentIdEdit").val(attri);
  var token = "{{csrf_token()}}";
  $.ajax({
    type: 'post',
    url: './aboutSectionOneContentsEditView',
    data: {attri : attri, _token :token},
    dataType: 'json',
    success: function(data){
     $("#small_title").val(data[0].small_title);
     $("#big_title").val(data[0].big_title);
     $("#short_content").text(data[0].short_content);
     $("#long_content").text(data[0].long_content);
     $("#hiddenSectionOneContentIdEdit").text(data[0].id);
    //  $("#editSectionOneContentDescriptionId").val(data[0].description);
    },
    error: function( data ){
      // Handle error
      //alert(data);
    }
  });
}

function delFunctionSectionOne(attri){
  $("#deleteModalSectionOne").modal('show');
  $("#deleteContentSectionOneId").val(attri);
}

function delFunctionSectionTwo(attri){
  $("#deleteModalSectionTwo").modal('show');
  $("#deleteContentSectionTwoId").val(attri);
}
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
