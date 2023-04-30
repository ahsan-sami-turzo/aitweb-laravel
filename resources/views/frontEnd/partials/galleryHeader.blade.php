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
   
   
        

   
    <link href="{{asset('frontEnd/css/style.css')}}" type="text/css" rel="stylesheet" media="all"> 
    <link href="{{asset('frontEnd/css/style1.css')}}" type="text/css" rel="stylesheet" media="all"> 
    <link href="{{asset('frontEnd/css/bootstrap1.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('frontEnd/css/bootstrap3.css')}}" type="text/css" rel="stylesheet" media="all"> 
    {{-- <link href="{{asset('frontEnd/css/contactStyle')}}" type="text/css" rel="stylesheet" media="all"> --}}
    <!-- google fonts -->
    
    <!-- Template CSS -->
   
    <script src="{{asset('frontEnd/js/jquery-2.2.3.min.js')}}"></script>  
    
    <link rel="stylesheet" type="text/css" href=" {{asset('frontEnd/contact/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontEnd/contact/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/test.css') }}">
    <link href="{{asset('frontEnd/css/font-awesome.css')}}" type="text/css" rel="stylesheet" media="all"> 
    

     <!-- gallery CSS -->
     <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/gallery/css/style-starter.css')}}">
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

        /* body {
            background-image:  url('{{ asset('assets/images/dBack.jpg')}}');
            background-repeat: no-repeat;
        } */

        body {
            /* background-image:  url('{{ asset('assets/images/dotted-map-bg.png')}}'); */

            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        

        #menuToggle {
            /* background: #666666 !important; */
            top:29px !important;
        }
        #menuToggle span {
            background: #000;
        }

        #menuToggle span:before, #menuToggle span:after {
            background: #000 !important;
        }
        .logo{
            margin: 16px !important;
        }
        #menuToggle span:before, #menuToggle span:after {
            background:  #85878A !important;
        }
        
        #menuToggle span {
            background: #85878A;
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
    <section class="header-area header-sticky navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-12" id="myHeader" >
                    <div class="logo">
						<h1><a href="{{asset('/')}}" class="">
                            <img src="{{asset('assets\images\logo.png')}}" class="img-responsive" style="height: 44px;">
                        </a></h1>
					</div> 
					<div class="menu">
						<a href="" id="menuToggle"> <span class="navClosed"></span> </a>
						<nav>  
                            <a href="#home" class=" scroll">Home</a> 
							<a href="{{asset('/')}}#about" class="scroll">About</a> 
                            <a href="{{ asset('/') }}#services" class="scroll">Services</a>   
                            <a href="{{ asset('/') }}#gallery" class="scroll">Gallery</a>  
							<a href="{{ asset('/') }}#projects" class="scroll">Product</a> 
                            <a href="{{asset('/')}}#clients" class="scroll">Clients</a>  
                            <a href="{{ asset('/') }}#news" class="scroll">News</a>  
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
    </section><br><br>
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