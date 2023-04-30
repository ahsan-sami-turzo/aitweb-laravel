@extends("layouts.admin")
@section('main-page')
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="padding:10px">Edit App</h4>
        </div>
        <div class="panel panel-default">    
        <div class="panel-body">
            <form action="{{ route('app.update', $ap->id) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="id" id="edit_id" >
              <div class="row">
                <div class="form-group" >
                  <div class="col-md-10">
                    <label>App Name</label>
                    <input type="text" class="form-control" id="app_name"  name="app_name" required value="{{$ap->app_name}}">
                  </div>
                </div>
            </div>
            <div class="row">
         
            
          
            <div class="form-group" >
              <div class="col-md-10">
                <label>Privacy and Policy</label>
                <textarea class="form-control" rows="10" name="privacy_policy" id="editor">{{$ap->privacy_policy}}</textarea>
              </div>
            </div>
            <div class="form-group" >
              <div class="col-md-10">
                <label>Tearms And Condition</label>
                <textarea class="form-control" rows="10" name="tearms_and_condition" id="editor1">{{$ap->tearms_and_condition}}</textarea>
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
