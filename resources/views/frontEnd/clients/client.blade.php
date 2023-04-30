<style>
.tesheading {
    color: rgba(0,0,0,0.47);
    font-size: 39px;
    text-align: center;
    text-shadow: 0 1px 0 #ffffff;
    position: relative;
    padding-top:20px;
}
.fpage-quote{
 
    border-radius: 10px solid #fff;
   
}
.w3l-clients .testimonial p {
    font-family: 'Roboto', sans-serif !important;
    font-size: 14px !important;
    color: black;
}
.testimonial-content {
    font-family: 'Roboto', sans-serif !important;
}

</style>
<!-- testimonials section -->
<section id="clients" class="w3l-clients page-section"  style="padding: 0px; background:linear-gradient(-45deg, #dddddd 50%, #cccccc 50%) !important; clip-path:polygon(50% 40px, 100% 0, 100% 100%, 0 100%, 0 0);">
    <div class="container py-md-5 py-4" >
        <div class="text-center mb-sm-5 mb-4">
            <h3 class="text-center tesheading">Sweet Words from the <strong>Happy Clients</strong></h3><br>
        </div>
        <div id="owl-demo2" class="owl-carousel owl-theme pb-5">
        @foreach ($clients as $key => $client)
            <div class="item">
                <div class="testimonial-content">
                    <div class="testimonial">
                        <blockquote>
                            <q>{{$client->title}}</q>
                        </blockquote>
                        <p>{{$client->short_desc}}</p>
                    </div>
                    <div class="bottom-info mt-4">
                        <a class="comment-img" href="#url"><img src="{{asset('uploads/images/clients/')}}/{{$client->image}}"
                            class="img-responsive" alt="placeholder image"></a>
                        <div class="people-info align-self">
                            <h3>{{$client->name}}</h3>
                            <p class="identity">{{$client->designation}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
