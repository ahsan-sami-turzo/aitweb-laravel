
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
    .serviceP{
        font-size: 20px;
        color: #000;
        font-weight: 500;
        font-family: 'Roboto', sans-serif !important;
    }
    .element-to-position, li a {
        padding-bottom: 10px !important;
        color:#939393;
        border-bottom:1px solid #939393;
        padding-left: 0px !important;
        font-family: 'Roboto', sans-serif !important;
    }
    

    .list-group, li a {
        background-color: #fff !important;
    }
    #footerContact {
        /* background-image:  url('{{ asset('assets/images/dotted-map-bg.png')}}'); */
        background-repeat: no-repeat;
        margin-top: 60px;
    }
    .service_style p{
        text-align: justify;
        font-family: 'Roboto', sans-serif !important;
        font-size: 14px;
    }
    .service_title{
        font-family: 'Roboto', sans-serif !important;
    }
    
</style>

    <section id="producDetails"> <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 service_style">
                    <!-- <p>PROJECT DETAILS</p> -->
                    <h2 class="service_title">{{$service->title}}</h2><br>
                    <div class="detailsImage">
                        <img src="{{asset('uploads/images/services/')}}/{{$service->image}}" alt="" width="99%">
                    </div><br>
                    <p class="detailsParagraph">
                        {{-- {!!html_entity_decode($service->longDescription)!!} --}}
                        {!!$service->longDescription!!}
                    </p><br><br>
                    {{-- <p class="modules">
                        <strong>We have several modules for the mentioned sectors which are:</strong>
                    </p><br>
                    <p class="modules">
                        <strong>Common Modules for All::</strong>
                    </p>
                    <div class="listservice">
                        <ul class="list-group">
                            @foreach ($services as $service)
                                <li>{{$service->title}}</li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                <br>
                <br>
                <br>
                <br>
                    <p class="serviceP">Service</p>
                    <ul class="list-group">
                        @foreach ($services as $service)
                        <li><a href="{{ url('frontEnd/serviceDetails/'.$service->id )}}">{{$service->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> 
    </section> 
@include('frontEnd.partials.footer')  