<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Ambala IT</title>
    <!-- Additional CSS Files -->
    
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-breezed.css">
   
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="{{asset('assets/css/client.css')}}">
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Jost:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Template CSS -->
    <link href="{{asset('frontEnd/aboutUs/css/style-starter.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('assets/css/responsive.css')}}" type="text/css" rel="stylesheet" media="all"> 
    <link href="{{asset('frontEnd/css/font-awesome.css')}}" type="text/css" rel="stylesheet" media="all"> 
    <link href="{{asset('frontEnd/css/style.css')}}" type="text/css" rel="stylesheet" media="all"> 
    <link href="{{asset('frontEnd/css/style1.css')}}" type="text/css" rel="stylesheet" media="all"> 
    <link href="{{asset('frontEnd/css/bootstrap1.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('frontEnd/css/bootstrap3.css')}}" type="text/css" rel="stylesheet" media="all"> 
   {{--fontawesome--}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Template CSS -->
   
    <script src="{{asset('frontEnd/js/jquery-2.2.3.min.js')}}"></script>  
    <!-- Owl Carousel Assets -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    {{-- contact us css start--}}
    <link rel="stylesheet" type="text/css" href=" {{asset('frontEnd/contact/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontEnd/contact/css/main.css')}}">
    {{-- service style --}}
    <link rel="stylesheet" href="{{asset('frontEnd/service/css/style-starter.css')}}">
   
     <!-- Client style -->
     <link rel="stylesheet" href="{{asset('frontEnd/client/assets/css/client-starter.css')}}">
    <style>
        .typedSlogan {
            padding: .2em 0;
        }
        .line-1 {
            position: relative;
            top: 50%;
            width: 24em;
            margin: 0 auto;
            border-right: 2px solid rgba(255, 255, 255, 1.0);
            font-size: 200%;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            transform: translateY(-50%);
            color: rgb(255, 250, 250);
        }

        /* Animation */
        .anim-typewriter {
            animation: typewriter 3s steps(44) 1s 1 normal both,
                blinkTextCursor 500ms steps(44) infinite normal;
        }

        @keyframes typewriter {
            from {
                width: 0;
            }

            to {
                width: 11em;
            }
        }

        @keyframes blinkTextCursor {
            from {
                border-right-color: rgba(255, 255, 255, 1.0);
            }

            to {
                border-right-color: transparent;
            }
        }


        
        element.style {
        }
        .footer {
            width: 30%;
            background: url(assets/images/footer-img.jpg);
           // opacity: 95%;
            color: white;
            text-align: center;
            position: relative;
            image: fill;
            top: 110px;
        }
        nav a {
            margin: 6px 0 3px 30px !important;
        }

    /* body {
        background-image: url("assets/images/home-backfround.png"); */

        body {
            background-image: url("assets/images/home-backfround.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .line-1 {
            margin: 0px !important;
            font-size: 96% !important;
            border-right: none !important;
            left:-11px !important;
         
        }
        .typedSlogan {
            padding: 0px !important;
            margin-top: 12px !important;
            margin-left: 7px !important;
        }   
        /* p{
            padding: 0px !important; 
            margin: 0px !important; 
        }  */

        @media (max-width:667px)  { 
            .typedSlogan{
                color: black !important
            }
        }

        /* service style */
        	.text-light {
			color: #fff;
		}
		.serviceHead{
			font-family: "Poppins";
			font-weight: 400;
			letter-spacing: 1px;
            font-size: 44px;
		}
		.section-head.text-light h6 {
			opacity: 0.7;
			font-size: 12px;
             letter-spacing: 2px;
		}
        .owl-item {width: 128.906px; margin-right: 10px; background:powderblue; }
        #menuToggle span:before, #menuToggle span:after {
            background:  #85878A !important;
        }
        
        #menuToggle span {
            background: #85878A;
        }
        

#fixedMenu {
    position:relative;
    width:700px;
    height:30px;
}
#fixedMenu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width:650px;
    height:30px;
}
#fixedMenu li {
    display: table-cell;
    width:120px;
    height:30px;
    text-align:center;
    vertical-align:middle;
}
li.active a, #fixedMenu li>a:hover, a.active {
    color:#FF0000 !important;
}


    </style>
</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div id="myHeader" class="col-12">
                    <div class="logo">
						<h1><a href="{{asset('/')}}" class="">
                            <img src="{{asset('assets\images\logo.png')}}" class="img-responsive" style="height: 44px; padding-top:8px;">
                        </a></h1>
                        <p class="line-1 anim-typewriter typedSlogan">We Design Your Dream</p>
					</div> 
                    
					<div class="menu" id="fixedMenu">
						<a href="" id="menuToggle"> <span class="navClosed"></span> </a>
						<nav class="navigation" id="mainNav">
							<a href="#home" class=" scroll">Home</a> 
							<a href="{{asset('/')}}#about" class="scroll">About</a> 
                            <a href="{{ asset('/') }}#services" class="scroll">Services</a>   
                            <a href="{{ asset('/') }}#gallery" class="scroll">Gallery</a>   
							<a href="#projects" class="scroll">Product</a> 
                            <a href="{{asset('/')}}#clients" class="scroll">Clients</a>  
                            <a href="#news" class="scroll">News</a>  
							<a href="#footerContact" class="scroll">Contact Us</a> 
						</nav>
						<script>
						(function($){
							// Menu Functions
							$(document).ready(function(){
							$('#menuToggle').click(function(e){
								var $parent = $(this).parent('.menu');
							  $parent.toggleClass("open");
							  var navState = $parent.hasClass('open') ? "hide" : "show";
							  $(this).attr("title", navState + " navigation");
									// Set the timeout to the animation length in the CSS.
									setTimeout(function(){
										console.log("timeout set");
										$('#menuToggle > span').toggleClass("navClosed").toggleClass("navOpen");
									}, 200);
								e.preventDefault();
							});
						  });
						})(jQuery);
						</script>
		 
					</div>
                </div>
            </div>
        </div>
    </header>
    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        } 
    </script>
       