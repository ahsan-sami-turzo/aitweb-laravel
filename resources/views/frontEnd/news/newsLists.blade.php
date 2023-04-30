
@include('frontEnd.partials.detailsHeader')

<style>
    .detailsParagraph{
        text-align:justify;
    }
    .modules{
        text-align:justify;
        color:#000;
    }
    .modules strong{
        font-weight: 700;
        font-size: 15px;
    }
    .productP{font-size: 20px;
        color: #000;
        font-weight: 500;
    }
    .element-to-position, li a {
        padding-bottom: 10px !important;
        color:#939393;
        border-bottom:1px solid #939393;
        padding-left: 0px !important;
    }
    

    .list-group, li a {
        background-color: #fff !important;
    }
    #footerContact {
        background-image:  url('{{ asset('assets/images/dotted-map-bg.png')}}');
        background-repeat: no-repeat;
        margin-top: 60px;
    }

    .open-description p > span{
        font-family: 'Roboto', sans-serif !important;
        color:rgb(85, 85, 85) !important; 
        
    }

    .newsHead{
        color: #163249;
        text-align: center;
        border-bottom: 6px solid #163249;
        width: 10%;
        margin: 0 auto;
        font-weight: 600;
        padding-bottom: 4px;
        font-size: 40px;
    }
    .w3l-open-block-services h4.mission {
        color: #163249;
        font-size: 16px;
        line-height: 28px;
        font-weight: 600;
        margin-top: 25px;
        font-family: 'Roboto', sans-serif !important;
    }  
    .w3l-open-block-services .card {
      height: 320px !important;
    }
    .open-description p > span{
        font-size: 14px !important;
        font-family: 'Roboto', sans-serif !important;
    }
    
</style>   

<section id="" style="padding-top:0px; background:rgba(44, 49, 56, 0.03);">
  <div class="w3l-open-block-services py-5" id="services">
    <div class="container py-lg-5 pt-4">
      <div class="heading text-center mx-auto">
        <h1 class="newsHead">News</h1>
      </div>
      <div class="row pt-5 mt-3">
        @foreach ($news as $new)
        <div class="col-lg-3 col-md-6" style="padding-bottom:10px;">
        <a href="{{ url('frontEnd/newsDetails/'.$new->id )}}">
          <div class="card text-center">
            <div class="icon-holder">
              <span class="" ><img src="{{asset('uploads/images/news/')}}/{{$new->image}}" width="100%" height="150px"></span>
            </div>
            <h4 class="mission">{{$new->title}}</h4>
            <div class="open-description">
              <p class="newsStyle">{!!\Illuminate\Support\Str::limit(htmlspecialchars_decode($new->description),200,"...")!!}</p>
            </div>
          </div>
          
        </a>
        </div>
        @endforeach
      </div>
  </div>
</section>
@include('frontEnd.partials.footer')  