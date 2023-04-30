@extends("layouts.admin")
@section('main-page')

  <div class="modal-dialog modal-lg">
      <div class="modal-content">
<div class="modal-header">
    <h4 class="modal-title" style="padding:10px">Add App</h4>
</div>
<div class="panel panel-default">    
    <div class="panel-body">
        <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveAppPrivacyPolicy') }}" novalidate >
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="row">
              <div class="form-group" >
                <div class="col-md-10">
                  <label>App Name</label>
                  <input type="text" class="form-control"  name="app_name" required>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="form-group" >
              <div class="col-md-10">
                <label>Privacy Policy</label>
                <textarea class="form-control" rows="10" name="privacy_policy" id="editor"></textarea>
              </div>
            </div>
          
          <br>
          <div class="form-group" >
            <div class="col-md-10">
              <label>Terms and Condition</label>
              <textarea class="form-control" rows="10" name="tearms_and_condition" id="editor1"></textarea>
            </div>
          </div>
        </div>
        <br>
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




































@endsection