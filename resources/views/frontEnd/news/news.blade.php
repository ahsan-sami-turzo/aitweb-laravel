<style>
    .open-description p > span{
        font-size: 14px !important;
        font-family: 'Roboto', sans-serif !important;
    }
</style>
<section id="news" class="page-section" style="padding-top:0px; background:rgba(44, 49, 56, 0.03);">
    <div class="w3l-open-block-services py-5" id="services">
      <div class="container py-lg-5 pt-4">
        <div class="heading text-center mx-auto">
          <h3 >Latest News</h3>
          
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
        <div class="stage">
          
          <a href="{{ url('frontEnd/news/')}}">Read More</a>
        </div>
    </div>
</section>