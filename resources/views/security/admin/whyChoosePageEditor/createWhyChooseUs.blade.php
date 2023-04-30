@extends("layouts.admin")
@section('main-page')
    
<div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">Why Choose Us</h1>
</div>
<div class="panel panel-info sectionsPost">
    <div class="panel-body">
        <h4>Current Schedule</h4>

        <div style="background:white;margin-top:2%;">
            <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col" width="2%">#SN</th>
                    <th class="text-center" scope="col">Title</th>
                    <th class="text-center" scope="col">Description</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key => $data)     
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $data->choose_title }}</td>
                        <td class="text-center">{{ $data->choose_details }}</td> 
                        <td><i class="fa fa-pencil-square-o" title="Edit" onClick="editaboutus({{ $data->id }})"></i></td>    
                    </tr>
                @endforeach                
            </tbody>
            </table>
        </div>
    </div>
</div>
<div class="panel panel-info sectionsPost">
    <div class="panel-body">
        <h4>Who Choose Us</h4>
        <form id="firstSectionContents"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveWhyChooseUs') }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Title</label>
                        <input type="text" class="form-control" name="choose_title" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Color</label>
                        <input type="text" class="form-control" name="choose_color" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="choose_details" rows="5" required></textarea>
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





{{-- Edit Modal --}}
<div id="editWhoWeAreModal" class="modal fade" style="margin-top:3%">
<div class="modal-dialog modal-lg">
<div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title" style="padding:10px">Edit Why Choose Us</h4>
    </div>

    <div class="panel panel-default">    
    <div class="panel-body">
        
        <form id="firstSectionContents"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveWhyChooseUs') }}">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <input type="hidden" name="id" id="editid" value="{{csrf_token()}}">

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-12">
                        <label>Title</label>
                        <input type="text" class="form-control" value="" id="edit_choose_us_title" name="choose_title" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Color</label>
                        <input type="text" class="form-control" name="choose_color" id="choose_color" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group" >
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="choose_details" id="edit_title_details" rows="8" required></textarea>
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





<script>

    // function editaboutus(id){
    //     var aboutus = $("#whoweareaboutus").text();
    //     var history = $("#whowearehistory").text();
    //     $("#editWhoWeAreModal").modal('show');
    //     $("#editid").val(id);
    //     $("#editaboutus").val(aboutus);
    //     $("#edithistory").val(history);
    //     $("#ceditoverage").val(coverage);
    // }

    function editaboutus(id){        
        $("#editWhoWeAreModal").modal('show');
        var token = "{{csrf_token()}}";
        $.ajax({
            type: 'post',
            url: './editWhyChooseUsDetails',
            data: {id : id, _token :token},
            dataType: 'json',
            success: function(data){
               
                $("#edit_choose_us_title").val(data.choose_title);
                $("#choose_color").val(data.choose_color);
                $("#edit_title_details").text(data.choose_details);
                $("#editid").val(data.id);
              
            },
            error: function( data ){
                alert(data);
            }
        });
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
