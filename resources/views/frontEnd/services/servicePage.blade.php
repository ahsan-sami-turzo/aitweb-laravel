<style>
   .section-head{
       text-align: left !important;
       padding-top: 70px;
      
   }
   .features{
    padding-bottom: 70px; 
   }
   .service1{
       text-align: left !important;
   }
   .service2{
       text-align: left !important;
   }
   .service3{
       text-align: left !important;
   }
   .service4{
       text-align: left !important;
   }
   .service5{
       text-align: left !important;
   }
   .service6{
       text-align: left !important;
       
   }
   /* .home-block {
      display: block !important; 
      background-position: 1000px 1000px;
      background-image: inherit;
      background-repeat: no-repeat;
      transition: 0.3s ease; 
  }
.home-block:hover {
   
    transform: scale(1);
} */

@media (max-width:480px)  { 
    .serviceHead{
      font-size: 29px !important;
    }     
  }
  .serviceHead{
      font-size: 24px !important;
      font-family: 'Roboto', sans-serif !important;
      
    }  
    
    .w3l-index2 p.feature-text {
      font-family: 'Roboto', sans-serif !important;
    
}  
</style>
<section class="w3l-index2 page-section" id="services">
    <div class="features-main py-5 text-center" style=" background-image: url({{asset('frontEnd/service/images/service.jpg')}}) !important;">
      <div class="container py-lg-3">
        <div class="section-head text-light">
         <h1><span>OUR SERVICES</span></h1>
          <h2 class="serviceHead">What we bring to you</h2>
        </div>
        <div class="row features">
          @foreach ($services as $service)
          <div class="col-lg-4 col-md-6 feature-grid">
            <a href="{{ url('frontEnd/serviceDetails/'.$service->id )}}">
              <div class="feature-body home-block {{$service->service}}" style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.74), rgba(76, 119, 224, 0.75)), url({{asset('uploads/images/services/')}}/{{$service->image}})">
              {{-- <div class="feature-body home-block{{$service->service}}" style="linear-gradient(to right, rgba(0, 0, 0, 0.74), rgba(76, 119, 224, 0.75)), url(http://lorempixel.com/300/200);"> --}}
                <div class="feature-img">
                  <span class="{{$service->font}}" aria-hidden="true"></span>
                </div>
                <div class="feature-info mt-4">
                  <h3 class="feature-titel mb-2">{{$service->title}}</h3>
                  <p class="feature-text"> {{ Str::limit($service->shortDescription, 100) }}
                  </p>
                </div>
              </div>
            </a>
          </div>
          @endforeach
         
        </div>
      </div>
    </div>
  </section>
  