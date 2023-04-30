
@include('frontEnd.partials.detailsHeader')
<style>
    .open-description p > span{
        font-size: 14px !important;
        font-family: 'Roboto', sans-serif !important;
    }

    .stage {
        padding:40px;
        text-align:center;
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
    .stage a:hover {
        background:#cea052;
    }
   

    .stage a:hover:after {
        color:#231f20;
    }
    .socialClass a{
        padding: 0px !important;
        background: transparent !important;
        font-size: 30px !important;
        color: #4267B2 !important;
    }
    .detailsImage{
       margin-bottom: 20px;
       margin-top:20px;
    }

</style>
<section id="newsDetails"> <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="socialClass" style="float: right;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('frontEnd/newsDetails/'.$news->id )}}&display=popup"> <i class="fa fa-facebook"></i></a> 
                    <a href="https://twitter.com/intent/tweet?u={{ url('frontEnd/newsDetails/'.$news->id )}}">&nbsp<i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/login?u={{ url('frontEnd/newsDetails/'.$news->id )}}&display=popup">&nbsp<i class="fa fa-linkedin"></i></a>
               </div>
                <h2 class="text-center" style=" margin-bottom: 22px;font-size:60px;float:left;"><b>{{$news->title}}</b></h2><br>
                <div class="detailsImage">
                    <img src="{{asset('uploads/images/news/')}}/{{$news->image}}" alt="" width="99%" height="500">
                </div><br>
                <div class="open-description">
                    <p class="newsStyle">{!! htmlspecialchars_decode($news->description) !!}</p>
                </div>
                <div class="stage">
                   <div class="socialClass" style="float: left; margin-left: -44px;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('frontEnd/newsDetails/'.$news->id )}}&display=popup"> <i class="fa fa-facebook"></i></a> 
                        <a href="https://twitter.com/intent/tweet?u={{ url('frontEnd/newsDetails/'.$news->id )}}">&nbsp<i class="fa fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/login?u={{ url('frontEnd/newsDetails/'.$news->id )}}&display=popup">&nbsp<i class="fa fa-linkedin"></i></a>
                   </div>
                    <a href="{{ url('frontEnd/news/')}}">Back</a>
                </div>
            </div>
            
        </div>
    </div> 
</section> 
@include('frontEnd.partials.footer1')  