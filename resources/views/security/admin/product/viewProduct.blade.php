@extends("layouts.admin")
@section('main-page')

<div id="viewProductModal"  style="margin-top:3%">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" style="padding:10px">View Product</h4>
          </div>
  
          <div class="panel panel-default">    
          <div class="panel-body">
              
              <form id="firstSectionContents" enctype="multipart/form-data" style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveProduct') }}" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" id="edit_id" >
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
                    <label><input type="radio" class="serviceType" id="yes" name="serviceId" value="1"> Yes </label>
                    <label><input type="radio" class="serviceType" id="no" name="serviceId" value="2"> No</label>
                  
                  </div>
              </div><br>
                
               <div id="viewserviceInfo"  class="service">
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
                                       
                                      @foreach($productServices as $productService)
                                        <div class="col-md-2" style="margin-top: 23px;">
                                          <button type="button" name="add" id="vadd" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="form-group" >
                                        <div class="col-md-10">
                                            <label>Font</label>
                                            <input type="text" class="form-control"  name="font" required>
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
               @endforeach
              
               
               <br>
               <div class="form-group">
                  <div class="col-sm-8">
                     <h4> <b>Main Features</b> </h4>
                     <label><input type="radio" class="featureType" id="yes" name="featureId" value="1"> Yes </label>
                     <label><input type="radio" class="featureType" id="no" name="featureId" value="2"> No</label>
                  
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
                
              
                
              
                </div>
                <div class="row">
                    <div class="form-group"  >
                    <div class="col-md-6" style="padding-right:50px;">
                        <label> Banner Image:<label><br>
                        <input type="file" name="image" id="editSectionOneContentImageId"><br>
                        <img src="" id='view_image' height="300" width="300">
                        
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
                 </div>

              </form>
          </div>
          </div>
      </div>
  </div>
  </div>