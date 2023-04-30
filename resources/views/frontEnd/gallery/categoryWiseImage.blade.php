
@include('frontEnd.partials.galleryHeader')
<style>
    .img-fluid{
        height: 200px !important;
        margin-top: 30px;
        width:100%;
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
        /* border-bottom: 6px solid #163249; */
        width: 12%;
        margin: 0 auto;
        font-weight: 600;
        padding-bottom: 4px;
        font-size: 36px;
        font-family: 'Roboto', sans-serif !important;
    }
    .category a{
        font-size: 25px !important;
        margin-left: 5px;
        border-bottom: 2px solid #939393;
    }
    .stage{
        text-align: center;
    }
    .stage a {
        line-height:1em;
        letter-spacing:0.06em;
        font-family: 'Roboto', sans-serif !important;
        font-weight:normal;
        font-size:16px;
        text-decoration:none;
        color:#fff;
        background:#163249;
        display:inline-block;
        padding:15px 12px 15px 15px;
        transition:background 200ms;
        border-radius:4px;
    }
</style>
    <!--/gallery -->
    <section class="w3-gallery py-5">
        <div class="container py-md-5">
            <h1 class="galleryhead">Gallery</h1><br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="category">
                        <a href="#" title="Category {{$categoryWiseImage->id}}">{{$categoryWiseImage->name}}</a>
                    </div>
                </div>
            </div> 
            <br>
            <div class="row">
                @foreach ($categoryWiseImage->gallary as $key => $gal)
                <div class="col-md-3">
                    <span class="image-block">
                        <a class="image-zoom" target="__blank" href="{{asset('uploads/images/gallery/')}}/{{$gal->image}}" data-gal="prettyPhoto[gallery]">
                            <div class="content-overlay"></div>
                            <img src="{{asset('uploads/images/gallery/')}}/{{$gal->image}}" class="img-fluid img-style w3layouts agileits" alt="portfolio-img">
                        </a>
                    </span>
                </div>
                @endforeach
            </div><br>
            <div class="stage">
                <a href="{{ url('allGallery/')}}">Back</a>
            </div>
           
        </div>
        <!-- //gallery container -->
    </section>
    </footer>
    <!-- all js scripts and files here -->

    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function () {
            $("#owl-demo1").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        loop: false
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->
    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->
    <!-- jQuery-Photo-filter-lightbox-portfolio-plugin -->
    
    <script src="{{asset('frontEnd/gallery/js/jquery-1.7.2.js')}}"></script>
    <script src="{{asset('frontEnd/gallery/js/jquery.quicksand.js')}}"></script>
    <script src="{{asset('frontEnd/gallery/js/script.js')}}"></script>
    <script src="{{asset('frontEnd/gallery/js/jquery.prettyPhoto.js')}}"></script>
    <!-- //jQuery-Photo-filter-lightbox-portfolio-plugin -->
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>

 <!-- move top -->
 
@include('frontEnd.partials.footer')  
<button onclick="topFunction()" id="movetop" class="topButton" title="Go to top">
    &#10548;
</button>
    