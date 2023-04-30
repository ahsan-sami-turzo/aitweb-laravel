
<style>
    .img-style{
        height: 250px !important;
    }
    .topButton{
        float: right !important;
        color: blue !important;
        font-size: 40px !important;
    }

    .portfolio-categ li a {
        background: white !important;
    }
    .portfolio-area li a {
        background: white !important;
    }
    .galleryhead{
        color: #163249;
        text-align: center;
        border-bottom: 6px solid #163249;
        width: 12%;
        margin: 0 auto;
        font-weight: 600;
        padding-bottom: 4px;
        font-size: 40px;
        
    }
    .stage{
        text-align: center;
    }
    .stage a {
        line-height: 1em;
        letter-spacing: 0.06em;
        font-family: 'Roboto', sans-serif !important;
        font-weight: normal;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        background: #163249;
        display: inline-block;
        padding: 15px 12px 15px 15px;
        transition: background 200ms;
        border-radius: 4px;
    }
</style>
    <!--/gallery -->
    <section class="w3-gallery py-5  page-section" id="gallery" style="background-color: #f2f8ff">
        <div class="container py-md-5">
          {{-- <h1 class="galleryhead"> Gallery</h1>
            --}}
          <div class="heading text-center mx-auto">
            <h3>Gallery</h3>
            
          </div>
            <ul class="portfolio-area clearfix p-0 m-0">
                @foreach ($gallery as $key => $gal)
                    <li class="portfolio-item2 content" data-id="id-{{$key}}" data-type="cat-item-{{$gal->img_type_id_fk}}">
                        <span class="image-block">
                            <a class="image-zoom" target="__blank" href="{{asset('uploads/images/gallery/')}}/{{$gal->image}}" data-gal="prettyPhoto[gallery]">
                                <div class="content-overlay"></div>
                                <img src="{{asset('uploads/images/gallery/')}}/{{$gal->image}}" class="img-fluid img-style w3layouts agileits" alt="portfolio-img">
                            </a>
                        </span>
                    </li> 
                @endforeach 
            </ul>
            <div class="stage">

                <a href="{{ url('allGallery/')}}">See More</a>
              </div>
            <!--end portfolio-area -->
        </div>
        
        <!-- //gallery container -->
    </section>
       
