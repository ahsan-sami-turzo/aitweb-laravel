<style>

h1 {
color: #fff;
padding: 10px 0;
}
.card:hover{
   transform: scale(1.05);
   box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
  }
/* .card {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.9);
transition: 0.3s;
border: none;
&:hover {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
} */
a {
  color: initial;
  &:hover {
    text-decoration: initial;
  }
}
  h1 {
      color: #fff;
      padding: 0px !important;
  }
  .card-img-top {
      height: 100px !important;
  }
.head{
    font-size: 100px;
    text-transform: uppercase;
    color: #fff;
    line-height: 264px;
    text-shadow: 0 20px 35px rgb(44 49 56 / 50%);
    /* margin-bottom: 40px; */
    z-index: 60;
    font-weight:800;
}

#technologies > img {
  position: absolute;
  right: 16.18%;
  margin-top: -140px;
}

.technologies{
  background-color: rgba(44, 49, 56, 0.03);
}
.w3l-open-block-services .card {
  height: 361px !important;
}
@import url(@import url(https://fonts.googleapis.com/css?family=Lato:400,300);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css);
.stage {
padding:40px;
text-align:center;}
.stage a {
  line-height:1em;
  letter-spacing:0.06em;
  font-family: 'Lato', sans-serif;
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
.stage a:after {
  font-family: 'FontAwesome', sans-serif;
  font-weight:300;
  content: "\f105";
  margin-left:20px;
  color:#fff;
  font-size:18px;
  vertical-align:middle;
  transition:color 200ms;
}

.stage a:hover:after {
  color:#231f20;
}
</style>


<br>
<section id="technologies" class="technologies page-section">
 
<img width="391" height="257" src="{{asset('assets/images/tech.jpg')}}" class="attachment-clients-image size-clients-image" alt="Image of business men sitting at a desk in a meeting" data-parallax="-0.15" srcset="{{asset('assets/images/tech.jpg')}} 391w, {{asset('assets/images/tech.jpg')}} 300w, {{asset('assets/images/tech.jpg')}} 125w, {{asset('assets/images/tech.jpg')}} 259w, {{asset('assets/images/tech.jpg')}} 97w, {{asset('assets/images/tech.jpg')}} 135w" sizes="(max-width: 391px) 100vw, 391px" />	
  <div class="container">
    <h2 class="head" style="position: relative; color:#163249;">Our Technologies</h2>
      <div class="heading text-center mx-auto">
  </div>
      <div class="row" >
          <div class="col-lg-12 col-md-6 col-xs-12">
          <div class="col-md-2">
              <img src="{{asset('assets/images/our experties icon/PHP.png')}}" alt="" width="150">
          </div>
          <div class="col-md-2">
              <img src="{{asset('assets/images/our experties icon/Bootstrap01.png')}}" alt="" width="150" >
          </div>
          <div class="col-md-2">
                  <img src="{{asset('assets/images/our experties icon/Cake_PHP.png')}}" alt="" width="150" >
          </div>
          <div class="col-md-2">
              <img src="{{asset('assets/images/our experties icon/Android.png')}}" alt="" width="150" >
          </div>
          <div class="col-md-2">
              <img src="{{asset('assets/images/our experties icon/mysql.png')}}" alt="" width="150" >
          </div>
          <div class="col-md-2" >
              <img src="{{asset('assets/images/our experties icon/laravel_02.png')}}" alt="" width="150">
          </div>
          </div>
      </div>
      <div class="row" >
        <div class="col-lg-12 col-md-6 col-xs-12 col-sm-12">
          <div class="col-md-2" style="padding-top: 40px;">
            <img src="{{asset('assets/images/our experties icon/Apache.png')}}" alt="" width="150">
          </div>
          <div class="col-md-2" style="padding-top: 40px;">
              <img src="assets/images/our experties icon/jquery-.png" alt="" width="150">
          </div>
          <div class="col-md-2" style="padding-top: 40px;" >
              <img src="assets/images/our experties icon/React01.png" alt="" width="150">
          </div>
          <div class="col-md-2" style="padding-top: 40px;">
              <img src="assets/images/our experties icon/vue-js.png" alt="" width="150">
          </div>
          <div class="col-md-2" style="padding-top: 40px;">
              <img src="assets/images/our experties icon/SQLite.png" alt="" width="150">
          </div>
          <div class="col-md-2" style="padding-top: 40px;">
              <img src="assets/images/our experties icon/Mongodb01.png" alt="" width="150">
          </div>
        </div>
    </div>
  </div>
</section>
<!-- ***** Our Clients Start ***** -->
@include('frontEnd.clients.client')
@include('frontEnd.news.news')
<!-- ***** Our Clients End ***** -->

  
