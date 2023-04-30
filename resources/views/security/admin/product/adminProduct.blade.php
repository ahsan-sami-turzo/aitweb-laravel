@extends("layouts.admin")
@section('main-page')
<!-- <style type="text/css">
	
	.service{
		margin:3%,
    display:none;
	}
  </style> -->
    
<div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">Products</h1>
</div>
<div class="panel panel-info sectionsPost">
    <div class="panel-body">
        <h4>PRODUCT LISTS</h4>
        <span style="float: right;position: relative;top: -24px;"><a href="#" class="btn btn-primary" role="button"  onclick="addProduct();">Add Product</a></span>
        <div style="background:white;margin-top:2%;">
            <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col" width="2%">#SN</th>
                    <th class="text-center" scope="col" width="20%">Product Name</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col" width="10%">Status</th>
                    <th class="text-center" scope="col" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key => $data)     
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $data->product_name }}</td>
                        <td class="text-center"><img src="{{asset('uploads/images/products/')}}/{{$data->image}}" alt="5Terre" height="80px" width="100px;"></td> 
                        <td style="text-align: center;">
                          @if($data->status == 0)
                          <a onclick="return confirm('Are you sure active this post?')" href="{{ url('admin/activeProduct/'.$data->id) }}"><i class="fa fa-times"  title="active" style="color: red; text-align:center;"></i></a>    
                          @else
                          <a onclick="return confirm('Are you sure Inactive this post?')" href="{{ url('admin/InactiveProduct/'.$data->id) }}"><i class="fa fa-check"  title="active" style="color: green; text-align:center;"></i></a>    
                          @endif
                      </td>
                        <td>
                         
                        <i class="fa fa-eye" title="View" onClick="viewProduct({{ $data->id }})"></i>  
                        <i class="fa fa-pencil-square-o" title="Edit" onClick="editProduct({{ $data->id }})"></i>    
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
              <h4 class="modal-title" style="padding:10px">Add Product</h4>
          </div>
          <div class="panel panel-default">    
          <div class="panel-body">
              <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveProduct') }}" novalidate >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="form-group" >
                      <div class="col-md-10">
                        <label>Product Name</label>
                        <input type="text" class="form-control"  name="product_name" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group" >
                    <div class="col-md-10">
                      <label>Product Details</label>
                      <textarea class="form-control" rows="10" name="product_desc" id="editor" required></textarea>
                    </div>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-sm-8">
                     <h4> <b>Service</b> </h4>
                     <label><input type="radio" class="serviceType" id="yes" name="serviceId" value="1"> Yes </label>
                     <label><input type="radio" class="serviceType" id="no" name="serviceId" value="2" checked="checked"> No</label>
                  
                  </div>
               </div><br>
               <div id="serviceInfo"  class="service">
                 <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" style="padding:10px">Add Service</h4>
                   </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                          
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div id="dynamic_field">
                          
                                    <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                          <label>Service Title</label>
                                          <input type="text" class="form-control"  name="service_name[]" required>
                                          
                                        </div>
                                        <div class="col-md-2" style="margin-top: 23px;">
                                          <button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                        
                                         <input type="file" name="image2[]" id="editSectionOneContentImageId2">Icon to upload:<br>
                                          </div>
                                      </div>
                                    </div>
                              
                                  <div class="row">
                                    <div class="form-group" >
                                      <div class="col-md-10">
                                        <label>Service Description</label>
                                        <textarea class="form-control" rows="10" name="service_desc[]" id="editor_service" required></textarea>
                                      </div>
                                    </div>
                                  </div>
                       
                            </div>
                                    
                                   
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               
               <br>
               <div class="form-group">
                  <div class="col-sm-8">
                     <h4> <b>Main Features</b> </h4>
                     <label><input type="radio" class="featureType" id="fyes" name="featureId" value="1"> Yes </label>
                     <label><input type="radio" class="featureType" id="fno" name="featureId" value="2" checked="checked"> No</label>
                  
                  </div>
               </div><br>
               <div id="featureInfo"  class="feature">
                   <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                       <div class="modal-header">
                          <h4 class="modal-title" style="padding:10px">Add Features</h4>
                       </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                          
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div id="feature_dynamic_field">
                              
                           <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                          <label>Features Type:</label>
                                          <input type="text" class="form-control"  name="features_name[]" required>
                                          
                                        </div>
                                        <div class="col-md-2" style="margin-top: 23px;">
                                          <button type="button" name="fadd" id="fadd" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                      </div>
                              </div>
                              <div class="row">
                                    <div class="form-group" >
                                      <div class="col-md-10">
                                        <label>Features Description</label>
                                        <textarea class="form-control" rows="10" name="features_desc[]" id="editor_feature" required></textarea>
                                      </div>
                                    </div>
                                  </div>
                                <br>
                                
                          
                            </div>
                    
                       <br>
                                      
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               
               <br>
               <div class="form-group">
                  <div class="col-sm-8">
                     <h4> <b>Why Choose Us</b> </h4>
                     <label><input type="radio" class="chooseType" id="yes" name="chooseId" value="1"> Yes </label>
                     <label><input type="radio" class="chooseType" id="no" name="chooseId" value="2" checked="checked" > No</label>
                  
                  </div>
               </div><br>
               <div id="chooseInfo"  class="service">
                 <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" style="padding:10px">Add Why Choose Us</h4>
                   </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                          
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div id="choose_dynamic_field">
                          
                                    <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                          <label>Reasons Behind Choose us</label>
                                          <input type="text" class="form-control"  name="reasons[]" required>
                                          
                                        </div>
                                        <div class="col-md-2" style="margin-top: 23px;">
                                          <button type="button" name="radd" id="radd" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                      </div>
                                    </div>
                                    <br>
                                    
                                 
                       
                            </div>
                                    
                                   
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
              
                
              
              </div>
                <div class="row">
                    <div class="form-group"  >
                    <div class="col-md-6" style="padding-right:50px;">
                        <label> Banner Image:<label><br>
                        <input type="file" name="image" id="editSectionOneContentImageId"><br>
                        
                    </div>
                    <div class="col-md-6" style="padding-left:90px;">
                        <label>Product Logo: <label><br>
                        <input type="file" name="image1" id="editSectionOneContentImageId1"><br>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group"  >
                      <div class="col-md-6">
                          <label>Position Of Logo:<label><br>
                          <select class="form-control" name="position_id">
                              <option value="0">Select position</option>
                              @foreach ($positions as $key => $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                   
                  <div class="col-md-6" style="padding-left:90px;">
                     <h4> <b>Feature Type</b> </h4>
                     <label><input type="radio" class="ftType" id="yes" name="ftId" value="1"> Yes </label>
                     <label><input type="radio" class="ftType" id="no" name="ftId" value="2" checked="checked" > No</label>
                  
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
</div>
{{-- End add Modal --}}
{{-- Edit Modal --}}
<div id="editProductModal" class="modal fade" style="margin-top:3%">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" style="padding:10px">Edit Product</h4>
          </div>
          <div class="panel panel-default">    
          <div class="panel-body">
              <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveProduct') }}" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" id="edit_id" >
                
                <div class="row">
                    <div class="form-group" >
                      <div class="col-md-10">
                        <label>Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group" >
                    <div class="col-md-10">
                      <label>Product Details</label>
                      <textarea class="form-control" rows="10" name="product_desc" id="editor1" required></textarea>
                    </div>
                  </div>
              </div><br>
              <div class="form-group">
                  <div class="col-sm-8">
                    <h4> <b>Service</b> </h4>
                    <label><input type="radio" class="editserviceType" id="yes" name="serviceId" value="1"> Yes </label>
                    <label><input type="radio" class="editserviceType" id="no" name="serviceId" value="2"> No</label>
                  
                  </div>
                </div><br>
               
               
                <div id="editserviceInfo"  class="service">
                 <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" style="padding:10px">Edit Service</h4>
                   </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                         
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div id="editdynamic_field">
                          
                                    <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                          <label>Service Title</label>
                                          <input type="text" class="form-control"  name="service_name[]" >
                                          
                                        </div>
                                        
                                        <div class="col-md-2" style="margin-top: 23px;">
                                          <button type="button" name="add" id="eadd" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                        
                                         <input type="file" name="image2[]" id="editSectionOneContentImageId2">Icon to upload:<br>
                                          </div>
                                      </div>
                                    </div>
                              
                                  <div class="row">
                                    <div class="form-group" >
                                      <div class="col-md-10">
                                        <label>Service Description</label>
                                        <textarea class="form-control" rows="10" name="service_desc[]" id="editor_service_desc" ></textarea>
                                      </div>
                                    </div>
                                  </div>
                       
                            </div>  
                            <div id="editadditionalserviceInfo"></div>  
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               
               <br>
               <div class="form-group">
                  <div class="col-sm-8">
                     <h4> <b>Main Features</b> </h4>
                     <label><input type="radio" class="editfeatureType" id="yes" name="featureId" value="1"> Yes </label>
                     <label><input type="radio" class="editfeatureType" id="no" name="featureId" value="2"> No</label>
                  
                  </div>
               </div><br>
               <div id="editfeatureInfo"  class="feature">
                   <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                       <div class="modal-header">
                          <h4 class="modal-title" style="padding:10px">Edit Features</h4>
                       </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                          
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div id="editfeature_dynamic_field">
                              
                                
                           <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                          <label>Features Type:</label>
                                          <input type="text" class="form-control"  name="features_name[]" >
                                          
                                        </div>
                                        <div class="col-md-2" style="margin-top: 23px;">
                                          <button type="button" name="fadd" id="efadd" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                      </div>
                              </div>
                              <div class="row">
                                    <div class="form-group" >
                                      <div class="col-md-10">
                                        <label>Features Description</label>
                                        <textarea class="form-control" rows="10" name="features_desc[]" id="editor_feature" ></textarea>
                                      </div>
                                    </div>
                                  </div>
                                <br>
                                
                            
                            </div>
                           <div id="editAddfeature">
                              
                           
                             
                                
                              
                            
                          </div>
                    
                       <br>
                                      
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <br>
               <div class="form-group">
                  <div class="col-sm-8">
                     <h4> <b>Why Choose Us</b> </h4>
                     <label><input type="radio" class="editchooseType" id="yes" name="chooseId" value="1"> Yes </label>
                     <label><input type="radio" class="editchooseType" id="no" name="chooseId" value="2"  > No</label>
                  
                  </div>
               </div><br>
               <div id="editchooseInfo"  class="service">
                 <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" style="padding:10px">Edit Why Choose Us</h4>
                   </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                          
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div id="editchoose_dynamic_field">
                          
                                    <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                          <label>Reasons Behind Choose us</label>
                                          <input type="text" class="form-control"  name="reasons[]" >
                                          
                                        </div>
                                        <div class="col-md-2" style="margin-top: 23px;">
                                          <button type="button" name="radd" id="eradd" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                      </div>
                                    </div>
                                    <br>
                                    
                                 
                       
                            </div>
                           <div id="editchooseAddInfo">
                                    
                          </div>
                                    
                                   
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
                <div class="row">
                    <div class="form-group"  >
                    <div class="col-md-6" style="padding-right:50px;">
                        <label> Banner Image:<label><br>
                        <input type="file" name="image" id="editSectionOneContentImageId"><br>
                        <img src="" id='edit_image' height="300" width="300">
                        
                    </div>
                    <div class="col-md-6" style="padding-left:90px;">
                        <label>Product Logo: <label><br>
                        <input type="file" name="image1" ><br>
                        <img src="" id="edit_image1" height="300" width="300">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group"  >
                      <div class="col-md-6">
                          <label>Position Of Logo:<label><br>
                          
                          <select class="form-control" name="position_id">
                              <option value="0">Select position</option>
                              @foreach ($positions as $key => $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      
                  <div class="col-sm-6" style="padding-left:90px;">
                     <h4> <b>Feature Type</b> </h4>
                     <label><input type="radio" class="ftType" id="yes" name="ftId" value="1"> Yes </label>
                     <label><input type="radio" class="ftType" id="no" name="ftId" value="2" checked="checked" > No</label>
                  
                  
               </div><br>
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
<div id="viewProductModal" class="modal fade" style="margin-top:3%">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" style="padding:10px">View Product</h4>
          </div>
  
          <div class="panel panel-default">    
          <div class="panel-body">
              
              <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin') }}" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
               
                <div class="row">
                    <div class="form-group" >
                      <div class="col-md-12">
                        <label>Product Name</label>
                        <input type="text" class="form-control" id="view_name" name="product_name" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group" >
                    <div class="col-md-12">
                      <label>Product Details</label>
                      <textarea class="form-control" rows="10" name="view_desc" id="editor3" required></textarea>
                    </div>
                  </div>
              </div>
                <br>
                
                <div class="form-group" id="view">
                  <div class="col-sm-8">
                    <h4> <b>Service</b> </h4>
                    <label><input type="radio" class="viewserviceType" id="yes" name="view_serviceId" value="1"> Yes </label>
                    <label><input type="radio" class="viewerviceType" id="no" name="view_serviceId" value="2"> No</label>
                  
                  </div>
              </div><br>
                
               <div id="viewserviceInfo"  class="service">
                 <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" style="padding:10px">View Service</h4>
                   </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                         
                           <div id="viewadditionalserviceInfo"></div>      
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             
              
              
               
               <br>
               <div class="form-group">
                  <div class="col-sm-8">
                     <h4> <b>Main Features</b> </h4>
                     <label><input type="radio" class="viewfeatureType" id="yes" name="view_featureId" value="1"> Yes </label>
                     <label><input type="radio" class="viewfeatureType" id="no" name="view_featureId" value="2"> No</label>
                  
                  </div>
               </div><br>
               <div id="viewfeatureInfo"  class="feature">
                   <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                       <div class="modal-header">
                          <h4 class="modal-title" style="padding:10px">Add Features</h4>
                       </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                          
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div id="viewAddfeature">
                              
                           
                             
                                
                              
                            
                            </div>
                    
                       <br>
                                      
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               
               <br>
               <div class="form-group">
                  <div class="col-sm-8">
                     <h4> <b>Why Choose Us</b> </h4>
                     <label><input type="radio" class="viewchooseType" id="yes" name="view_chooseId" value="1"> Yes </label>
                     <label><input type="radio" class="view_chooseType" id="no" name="view_chooseId" value="2" checked="checked" > No</label>
                  
                  </div>
               </div><br>
               <div id="viewchooseInfo"  class="service">
                 <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" style="padding:10px">View Why Choose Us</h4>
                   </div>
                      
                      <div class="panel panel-default">    
                        <div class="panel-body">
                          
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div id="viewchooseAddInfo">
                          
                                    
                                    
                                 
                       
                            </div>
                                    
                                   
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
              
                
              
                </div>
                <div class="row">
                    <div class="form-group"  >
                    <div class="col-md-6" style="padding-right:50px;">
                        <label> Banner Image:<label><br>
                        <input type="file" name="image" id="viewSectionOneContentImageId"><br>
                        <img src="" id='view_image' height="300" width="300">
                        
                    </div>
                    <div class="col-md-6" style="padding-left:90px;">
                        <label>Product Logo: <label><br>
                        <input type="file" name="image1"><br>
                        <img src="" id="view_image1" height="300" width="300">
                    </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group"  >
                      <div class="col-md-6">
                          <label>Position Of Logo:<label><br>
                          <input type="text" class="form-control"  id="view_position_id" >
                      </div>
                      <div class="col-md-6" style="padding-left:90px;">
                     <h4> <b>Feature Type</b> </h4>
                     <label><input type="radio" class="ftType" id="yes" name="ftId" value="1"> Yes </label>
                     <label><input type="radio" class="ftType" id="no" name="ftId" value="2" checked="checked" > No</label>
                  
                  </div>
               <br>
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
            <input type="hidden" name="product_id" id="deleteProductId">
            <button id="DMconfirmButton"  class="btn btn-danger" type="submit" > <span>Confirm</span></button>
            <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal" type="button"> Close</button>
          </form>

        </div>

      </div>
    </div>
  </div>
</div>
{{-- End Delete Modal Section one --}}
{{--Service Info--}}

<script type="text/javascript">
        $(document).ready(function(){      
          
          var i=1;  
          
          $('#add').click(function(){
            //alert('ok');
            i++;
            
            $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><label>Service Name</label><input type="text" class="form-control"  name="service_name[]" required></div></div><div class="form-group" style="padding-top:80px;"><div class="col-md-10" ><input type="file" name="image2[]" id="editSectionOneContentImageId2">Icon to upload:<br></div></div><div class="form-group"  ><div class="col-md-10"><label>Service Details</label><textarea class="form-control" rows="10" name="service_desc[]"  required></textarea></div></div><div><button  style="margin-top:-135px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
           
          });
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          }); 
        }); 
       
</script>
<script type="text/javascript">
        $(document).ready(function(){      
          
          var i=1;  
          
          $('#radd').click(function(){
            //alert('ok');
            i++;
            $('#choose_dynamic_field').append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><input type="text" class="form-control"  name="reasons[]" required></div></div><div><button  style="margin-top: 23px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
           
          });
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          }); 
        }); 
       
</script>
<script type="text/javascript">
        $(document).ready(function(){      
          
          var i=1;  
          
          $('#fadd').click(function(){
            //alert('ok');
            i++;
            if(i>10)
            {
              alert("You can take max 10 features");
            }
            else{
           
            $('#feature_dynamic_field').append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><label>Features Type:</label><input type="text" class="form-control"  name="features_name[]" required></div></div><div class="form-group" ><div class="col-md-10"><label>Features Description</label><textarea class="form-control" rows="10" name="features_desc[]" id="editor_features" required></textarea></div></div><div><button  style="margin-top: 23px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');    
          }
          });

          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          }); 
        }); 
       
</script>
<script type="text/javascript">
        $(document).ready(function(){      
          
          var i=1;  
          
          $('#eadd').click(function(){
            //alert('ok');
            i++;
            
            $('#editdynamic_field').append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><label>Service Name</label><input type="text" class="form-control"  name="service_name[]" required></div></div><div class="form-group" style="padding-top:80px;"><div class="col-md-10" ><input type="file" name="image2[]" id="editSectionOneContentImageId2">Icon to upload:<br></div></div><div class="form-group"  ><div class="col-md-10"><label>Service Details</label><textarea class="form-control" rows="10" name="service_desc[]" id="" required></textarea></div></div><div><button  style="margin-top:-135px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
           
          });
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          }); 
        }); 
       
</script>
<script type="text/javascript">
        $(document).ready(function(){      
          
          var i=1;  
          
          $('#eradd').click(function(){
            //alert('ok');
            i++;
            $('#editchoose_dynamic_field').append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><input type="text" class="form-control"  name="reasons[]" required></div></div><div><button  style="margin-top: 23px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
           
          });
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          }); 
        }); 
       
</script>
<script type="text/javascript">
        $(document).ready(function(){      
          
          var i=1;  
          
          $('#efadd').click(function(){
            //alert('ok');
            i++;
            if(i>10)
            {
              alert("You can take max 10 features");
            }
            else{
           
            $('#editfeature_dynamic_field').append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><label>Features Type:</label><input type="text" class="form-control"  name="features_name[]" required></div></div><div class="form-group" ><div class="col-md-10"><label>Features Description</label><textarea class="form-control" rows="10" name="features_desc[]" id="editor_features" required></textarea></div></div><div><button  style="margin-top: 23px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');    
          }
          });

          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          }); 
        }); 
       
</script>


<script type="text/javascript">
   $(document).ready(function()
   {
        $(".serviceType").change(function(){
          //alert('ok');
            var service = $(this).val();
            if(service==1)
            {
              $('#serviceInfo').show();
            }
            else
            {
              $('#serviceInfo').hide();
            }
        });
        $(".featureType").change(function(){
            var feature = $(this).val();
            if(feature ==1)
            {
              $('#featureInfo').show();
            }
            else
            {
              $('#featureInfo').hide();
            }
        });
        $(".chooseType").change(function(){
          //alert('ok');
            var choose = $(this).val();
            if(choose==1)
            {
              $('#chooseInfo').show();
            }
            else
            {
              $('#chooseInfo').hide();
            }
        });
    });
</script>
<script type="text/javascript">
   $(document).ready(function()
   {
        $(".editserviceType").change(function(){
          //alert('ok');
            var service = $(this).val();
            if(service==1)
            {
              $('#editserviceInfo').show();
            }
            else
            {
              $('#editserviceInfo').hide();
            }
        });
        $(".editfeatureType").change(function(){
            var feature = $(this).val();
            if(feature ==1)
            {
              $('#editfeatureInfo').show();
            }
            else
            {
              $('#editfeatureInfo').hide();
            }
        });
        $(".editchooseType").change(function(){
          //alert('ok');
            var choose = $(this).val();
            if(choose==1)
            {
              $('#editchooseInfo').show();
            }
            else
            {
              $('#editchooseInfo').hide();
            }
        });
    });
</script>
<script>

      //view productDetails start
        function viewProduct(id){        
            $("#viewProductModal").modal('show');
            var token = "{{csrf_token()}}";
            $.ajax({
                type: 'post',
                url: './editProductDetails',
                data: {id : id, _token :token},
                dataType: 'json',
                success: function(data){
                //console.log(data);
                  $("#view_name").val(data["product"].product_name);
                  var desc = data["product"].product_desc;
                  console.log(desc);
                  CKEDITOR.instances['editor3'].setData(desc);
                   //$("#view_desc").text(data["product"].product_desc);
                  var imag= data["product"].image;
                  var image_path="{{URL::asset('uploads/images/products/')}}/";
                  document.getElementById('view_image').src=image_path+imag;
                  var image= data["product"].image_logo;
                  var imag_path="{{URL::asset('uploads/images/products/')}}/";
                  document.getElementById('view_image1').src=imag_path+image;
                
                  $("#view_position_id").val(data.logo);
                 
                 
                  if(data['product'].product_service_id==1){
               $('input[name=view_serviceId][value=1]').attr('checked','checked');
              
                  for(var i=0;i<data.services.length;i++)
              { //console.log(i);
                var names= data.services[i].service_name;
                 var imag1= data.services[i].image;
                 //console.log(imag1);
                var  html = "";
                 if(imag1)
                 {
                 var img_path="{{URL::asset('uploads/images/products_service/')}}/" +imag1;
                   
                  }
                  
                //   document.getElementById('editImage2').src=image_path+imag;
                   var descs= 	data.services[i].service_desc;     
                //console.log(desc);
                $("#viewadditionalserviceInfo").append('<div id="row'+i+'" class="view_dynamic-added"><div class="form-group" ><div class="col-md-10"><label>Service Name</label><input type="text" class="form-control"  name="view_service_name[]"  value="'+names+'"required></div></div><br></br><div class="form-group" style="padding-top:60px;"><div class="col-md-10" ><input type="file" name="view_image2[]" id=""> Icon to upload:<br> <img src="'+img_path+'"  height="100" width="100"></div></div><div class="form-group"  ><div class="col-md-10"><label>Service Details</label><textarea class="form-control" rows="10" name="service_desc[]" id="view_service" required>'+descs+'</textarea></div></div></div>');  
              }
               
            }else{
                  //console.log('ok');
               $('input[name=view_serviceId][value=2]').attr('checked','checked');
               $("#viewserviceInfo").hide();
            }
            if(data['product'].feature_id==1){
               $('input[name=view_featureId][value=1]').attr('checked','checked');
              
               
               for(var i=0;i<data.productFeatures.length;i++)
              { //console.log(i);
       
                  var names= data.productFeatures[i].name;
                 var descs= 	data.productFeatures[i].features_desc;          

                $("#viewAddfeature").append('<div id="row'+i+'" class="view_dynamic-added"><div class="form-group" ><div class="col-md-10"><label>Features Type:</label><input type="text" class="form-control"  name="view_features_name[]" value="'+names+'" required></div></div><div class="form-group" ><div class="col-md-10"><label>Features Description</label><textarea class="form-control" rows="10" name="view_features_desc[]" id="view_features" required>'+descs+'</textarea></div></div> </div>');  
              }
               
            }else{
                  //console.log('ok');
               $('input[name=view_featureId][value=2]').attr('checked','checked');
               $("#viewfeatureInfo").hide();
            }
            if(data['product'].feature_type==1){
               $('input[name=ftId][value=1]').attr('checked','checked');
              
               
               
            }else{
                  //console.log('ok');
               $('input[name=ftId][value=2]').attr('checked','checked');
              
            }
            if(data['product'].chooseUs_id==1){
               $('input[name=view_chooseId][value=1]').attr('checked','checked');
              
               
               for(var i=0;i<data.chooses.length;i++)
              { //console.log(i);
                var reasons= data.chooses[i].reasons;
                $("#viewchooseAddInfo").append('<div id="row'+i+'" class="view_dynamic-added"><div class="form-group" ><div class="col-md-10"><input type="text" class="form-control"  name="view_reasons[]" value="'+reasons+'" required></div></div>');  
              }
               
            }else{
                  //console.log('ok');
               $('input[name=view_chooseId][value=2]').attr('checked','checked');
               $("#viewchooseInfo").hide();
            }
                  
                },
                error: function( data ){
                    //alert(data);
                }
            });
      }
      //view productDetails end
    function editProduct(id){        
        $("#editProductModal").modal('show');
        var token = "{{csrf_token()}}";
        $.ajax({
            type: 'post',
            url: './editProductDetails',
            data: {id : id, _token :token},
            dataType: 'json',
            success: function(data){
              //console.log(data['product'].logo_position);
              $("#product_name").val(data["product"].product_name);
              $("#edit_id").val(data["product"].id);
              $("#view_name").val(data["product"].product_name);
                  var desc1 = data["product"].product_desc;
                  //console.log(desc1);
                  CKEDITOR.instances['editor1'].setData(desc1);

                   //$("#product_desc").text(data["product"].product_desc);
                  var imag= data["product"].image;
                  var image_path="{{URL::asset('uploads/images/products/')}}/";
                  document.getElementById('edit_image').src=image_path+imag;
                  var image= data["product"].image_logo;
                  var imag_path="{{URL::asset('uploads/images/products/')}}/";
                  document.getElementById('edit_image1').src=imag_path+image;
                  
              var position=data['product'].logo_position;
              $('select[name="position_id"]').find("option[value="+position+"]").attr("selected",true);
            if(data['product'].product_service_id==1){
               $('input[name=serviceId][value=1]').attr('checked','checked');
              
               
               for(var i=0;i<data.services.length;i++)
              { //console.log(i);
                $("#editserviceInfo").show();
                var name= data.services[i].service_name;
                var imag1= data.services[i].image;
                 //console.log(imag1);
                var  html = "";
                 if(imag1)
                 {
                 var img_path="{{URL::asset('uploads/images/products_service/')}}/" +imag1;
                   
                  }
                   var desc= 	data.services[i].service_desc;     
                //console.log(desc);
                $("#editadditionalserviceInfo").append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><label>Service Name</label><input type="text" class="form-control"  name="service_name[]"  value="'+name+'"required></div></div><br></br><div class="form-group" style="padding-top:60px;"><div class="col-md-10" ><input type="file" name="image2[]" id=""> Icon to upload:<br><img src="'+img_path+'"  height="100" width="100"></div></div><div class="form-group"  ><div class="col-md-10"><label>Service Details</label><textarea class="form-control" rows="10" name="service_desc[]" id="" required>'+desc+'</textarea></div></div><div><button style="margin-top: 23px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
              }
               
            }else{
                //alert('ok');
               $('input[name=serviceId][value=2]').attr('checked','checked');
               $("#editserviceInfo").hide();
               
               
            }
            if(data['product'].feature_id==1){
               $('input[name=featureId][value=1]').attr('checked','checked');
              
               
               for(var i=0;i<data.productFeatures.length;i++)
              { //console.log(i);
       
                  var name= data.productFeatures[i].name;
                 var desc= 	data.productFeatures[i].features_desc;          

                $("#editAddfeature").append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><label>Features Type:</label><input type="text" class="form-control"  name="features_name[]" value="'+name+'" required></div></div><div class="form-group" ><div class="col-md-10"><label>Features Description</label><textarea class="form-control" rows="10" name="features_desc[]" id="editor_features" required>'+desc+'</textarea></div></div><div><button  style="margin-top: 23px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
              }
               
            }else{
                  //console.log('ok');
               $('input[name=featureId][value=2]').attr('checked','checked');
               $("#editfeatureInfo").hide();
            }
            if(data['product'].feature_type==1){
               $('input[name=ftId][value=1]').attr('checked','checked');
              
               
               
            }else{
                  //console.log('ok');
               $('input[name=ftId][value=2]').attr('checked','checked');
               
            }
            if(data['product'].chooseUs_id==1){
               $('input[name=chooseId][value=1]').attr('checked','checked');
              
               
               for(var i=0;i<data.chooses.length;i++)
              { //console.log(i);
                var reason= data.chooses[i].reasons;
                $("#editchooseAddInfo").append('<div id="row'+i+'" class="dynamic-added"><div class="form-group" ><div class="col-md-10"><input type="text" class="form-control"  name="reasons[]" value="'+reason+'" required></div></div><div><button  style="margin-top: 1px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
              }
               
            }else{
                  //console.log('ok');
               $('input[name=chooseId][value=2]').attr('checked','checked');
               $("#editchooseInfo").hide();
            }
                  
                  
              
            },
            error: function( data ){
                //alert(data);
            }
        });
    }

    function addProduct(){        
        $("#addModal").modal('show');
        $("#serviceInfo").hide();
        $("#featureInfo").hide();
        $("#chooseInfo").hide();
        var token = "{{csrf_token()}}";
        //var id=1;
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
      url: './deleteProductDetails',
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
