<style>
    .element-to-position, li a {
        padding: 0px !important;
    }
    .list-group, li a {
        background-color: #fff !important;
        color:#0071C1;
        padding-top:10px;
        font-family: 'Roboto', sans-serif !important;
    }
    #projects{
        padding-bottom:200px;
    }
    @media (max-width:667px)  { 
        #technologies > img {
        right: -3.82% !important;
        margin-top: -158px !important;
        width: 235px !important;
    }
    .head {
    font-size: 28px !important;
    line-height: 209px !important;
}
    }
</style>
<!-- ***** Our Projects Area Starts ***** -->
<section class="section  page-section" id="projects">
    <div class="container" style="border-bottom: 2px solid #D9D9D9;">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading">
                    <!-- <h6>Our Projects</h6> -->
                    <h2>Our Products</h2>
                </div>
                <div class="">
                    <ul class="list-group">
                        <li><a href="#" hidden>All</a></li>
                        @foreach ($products as $product)
                        <li><a href="{{ url('frontEnd/productDetails/'.$product->id )}}">{{$product->product_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="filters-content">
                    <div class="row">
                    @foreach ( $featureImages as  $featureImage)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
                            <div class="item">
                                <a href="{{ url('frontEnd/productDetails/'.$product->id )}}"><img src="{{asset('uploads/images/products/')}}/{{ $featureImage->image}}" alt="" height="200px"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
                            <div class="item">
                                <a href="{{asset('assets/images/product/nabaERP.jpg')}}" data-lightbox="image-1" ><img src="{{asset('assets/images/product/nabaERP.jpg')}}" alt="" height="200px"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
                            <div class="item">
                                <a href="{{asset('assets/images/product/ShikkhaPlus_web.jpg')}}" data-lightbox="image-1" ><img src="{{asset('assets/images/product/ShikkhaPlus_web.jpg')}}" alt="" height="200px"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
                            <div class="item">
                                <a href="{{asset('assets/images/product/AmbalaIT.jpg')}}" data-lightbox="image-1" ><img src="{{asset('assets/images/product/AmbalaIT.jpg')}}" alt="" height="200px"></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>