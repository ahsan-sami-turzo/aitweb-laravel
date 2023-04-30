<style>
  .area-box-info h4{
    font-size:20px !important;
  }
  .long_content{
    font-size:13px !important;
    font-family: 'Roboto', sans-serif !important;
  }
  .imginfo__box:hover{
    background-color: #163249;
    color: #fff;
    position: absolute;
    right: 85px;
    bottom: 10px;
    padding: 35px;
    box-shadow: 30px 30px 30px rgb(0 0 0 / 20%);
    min-width: 200px;
    border-radius: var(--border-radius);
    min-height: 200px;
    opacity: 0.8;
    transform: rotate(
    
45deg
);
    text-align: center;
}
</style>
<section id="about" class="page-section">
    <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">
                <div class="col-lg-6 left-wthree-img">
                    <div class="position-relative">
                        <img src="{{asset('uploads/images/about/')}}/{{$aboutUs->image}}" alt="" class="img-fluid radius-image-full" height="500px" width="500px">
                        <div class=""> </div>
                        <div class="imginfo__box">
                            <div class="imginfo__info">
                                <h6 class="imginfo__title">5+</h6>
                                <p class="mt-1">Years of <br>Experience. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 about-right-faq align-self">
                    <h5 class="title-small mb-1">{{$aboutUs->small_title}}</h5>
                    <h3 class="title-big">{{$aboutUs->big_title}}</h3>
                    <h4 class="mt-4">{{$aboutUs->short_content}}</h4>
                    <p class="mt-4 long_content" style="color:black;">{{$aboutUs->long_content}}</p>  
                </div>
            </div>
        </div>
    </div>
</section>

  </footer>
  <!-- //footer -->
  
  
 
  <script src="{{asset('frontEnd/aboutUs/js/bootstrap.min.js')}}"></script>

  
  <script src="{{asset('frontEnd/aboutUs/js/jquery.magnific-popup.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
  
        fixedContentPos: false,
        fixedBgPos: true,
  
        overflowY: 'auto',
  
        closeBtnInside: true,
        preloader: false,
  
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
      });
  
      $('.popup-with-move-anim').magnificPopup({
        type: 'inline',
  
        fixedContentPos: false,
        fixedBgPos: true,
  
        overflowY: 'auto',
  
        closeBtnInside: true,
        preloader: false,
  
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-slide-bottom'
      });
    });
  </script>
  
  
  
  
 
  
  <script src="{{asset('frontEnd/aboutUs/js/bootstrap.min.js')}}"></script>
 