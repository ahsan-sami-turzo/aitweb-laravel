
    <!-- ***** footer Area Starts ***** -->
    
    <style>
        .planButton{
            color: #fff;
            padding: .6em;
            border:1px solid #163249;
            display: inline-block;
            letter-spacing: .125em;
            text-transform: uppercase;
            background: #163249;
            font: 400 1.5625em/1.3em Gilroy-SemiBold,sans-serif;
            /* float:right; */
            font-size: 12px !important;
        }

        
        label {
           font-size:20px !important;
        }  
         
        .form-control {
            font-size:13px;
        }
         
        .submitBtn{
            background: #0B1925;
            font-size: 15px;
            border: 1px solid #0B1925;
            font-weight:bold;
        }
        .closeBtn{
            background: red;
            font-size: 15px;
            border: 1px solid red;
            font-weight:bold;
        }

        .contactH{
            margin-left: 22px;
            padding-bottom: 11px;
            margin-top:0px;
        }
        .folowUs{
           font-size:24px; 
         
        }

        .locF{
            padding: 0px;
            margin: 0px !important;;
            list-style-type: none;
        }
        .conLi{
            padding-left:20px;
        }

        .footterRes{
            font-size:14px; 
            padding-left:40px;
        }
        #button {
            display: inline-block;
            background-color: #163249 !important;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s, 
                        opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }
        #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #fff;
        }
        #button:hover {
            cursor: pointer;
            background-color: #333;
        }
        #button:active {
            background-color: #555;
        }
        #button.show {
            opacity: 1;
            visibility: visible;
        }
        .social li a{
            background-color: transparent !important;
            font-size: 24px;
            border-bottom: none;
        }
        .social{
           
            list-style-type: none;
        }

        .fa-facebook{
            border-radius: 50%;
            background: #3B5998;
            color: #FFFFFF;
            padding: 0.05em 0.3em;
        }
        .fa-twitter{
            border-radius: 50%;
            background: #4099FF;
            color: #FFFFFF;
            padding: 0.05em 0.07em;
        }
        .fa-linkedin{
            border-radius: 50%;
            background: #4099FF;
            color: #FFFFFF;
            padding: 0.05em 0.10em; 
        }


        @media (max-width:667px)  { 
            .location{
                padding-left:0px !important;
               
                
            }
            .address{
                padding-left:0px !important;
                font-size: 12px !important;
            }

            .conLi{
                padding-left:0px;
            }

            .footterRes {
                font-size: 12px !important;
                padding-left: 7px !important;
            }

            .contactH {
                margin-left: 4px !important;
            }

            .folowUs {
                /* margin: 0px; */
                padding-left: 0px !important;
                margin: 0px !important;
                
             }

            .social{
                padding-left: 0px !important; 
            }
        }
        
    </style> 
    <section id="footerContact"> 
        <div class="container-fluid">
            <div class="footerHead" >
                <h3 class="text-center"><!--Where To <span>Find Us ?</span>--></h3><br>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12">
                   <div class="want-to-be-parent">
                        <div class="current-parent">
                            <div class="contactFotter" >
                                <ul class="locF">
                                    <li>
                                        <h4 class="location" style=" margin-top:0px;">Location: </h4>
                                        <h6 class="address"><br> House-67, Block-Ka, <br> Piciculture Housing Society Shyamoli, <br> Dhaka 1207, Bangladesh.</h6>
                                        <h4 class="folowUs" style="margin-top: 0px!important; margin-bottom:0px !important;margin-top: -0.6em;">Follow us: </h4>
                                        <ul class="social">
                                            <li class="socialMedia"><a href="https://www.facebook.com/ambalait/" target="__blank"><i class="fa fa-facebook circle"></i></a></li>
                                            <li class="socialMedia"><a href="https://twitter.com/ambala_it?lang=en" target="__blank"><i class="fa fa-twitter circle"></i></a></li>
                                            <li class="socialMedia"><a href="https://www.linkedin.com/company/ambalait/" target="__blank"><i class='fa fa-linkedin'></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="conLi">
                                        <h4 class="location contactH">Contact: </h4>
                                        <span class="footterRes"><img src="{{asset('assets/images/contact-info-01.png')}}" alt="" height="15px;">&nbsp;01708408686</span><br>
                                        <span class="footterRes"><img src="{{asset('assets/images/contact-info-02.png')}}" alt="" height="15px;">&nbsp;info@ambalait.com</span><br>
                                        <span class="footterRes"><img src="{{asset('assets/images/contact-info-03.png')}}" alt="" height="15px;">&nbsp;www.ambalait.com</span><br>     
                                    </li>
                                </ul>
                            </div>      
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d912.8193213438486!2d90.36290318446333!3d23.773138333712655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0a517cabad3%3A0x9d4efa939a6b90bd!2sAmbala%20IT!5e0!3m2!1sen!2sbd!4v1623163727450!5m2!1sen!2sbd" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                   </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                <button type="button" style="font-size:16px" data-toggle="modal" data-target="#exampleModal"  class="planButton">Send Email<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button></i>
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-body">
                   
                    <div class="container-contact100">
                        {{-- <button class="contact100-btn-hide">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button> --}}
                        <button type="button" class="contact100-btn-hide" data-dismiss="modal"> <i class="fa fa-close" aria-hidden="true"></i></button>
                        <form class="contact100-form validate-form">
                            <span class="contact100-form-title">
                                Contact Us
                            </span>
            
                            <div class="wrap-input100  validate-input" data-validate="Name is required">
                                <span class="label-input100">Your Name</span>
                                <input class="input100" type="text" name="name" placeholder="Enter your name">
                                <span class="focus-input100"></span>
                            </div>
            
                           
                            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="text" name="email" placeholder="Enter your email addess">
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate = "Message is required">
                                <span class="label-input100">Message</span>
                                <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
                                <span class="focus-input100"></span>
                            </div>
            
                            <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn">
                                    <span>
                                        Submit
                                        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </section> 
    </div>
    <a id="button"></a>    

                        

<script src="{{asset('frontEnd/js/jquery-2.2.3.min.js')}}"></script>  
<script>
    $(document).ready(function() {
        var btn = $('#button');

    $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });
    $('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = $(this).attr('href');
        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();
        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
    let mybutton = document.getElementById("btn-back-to-top");
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);
    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
});
</script>

<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script type='text/javascript' src='https://microfin360.com/web/wp-content/themes/Avada/includes/lib/assets/min/js/library/bootstrap.tabb12b.js?ver=3.1.1'></script>
<script type='text/javascript'>
var fusionTabVars = {"content_break_point": "800"};
</script>

<script type='text/javascript'>
    var fusionVideoVars = {"status_vimeo": "1"};
</script>
<script type='text/javascript' src='https://microfin360.com/web/wp-content/plugins/fusion-builder/assets/js/min/general/fusion-animations68b3.js?ver=1'></script>
<script type='text/javascript' src='https://microfin360.com/web/wp-content/plugins/fusion-builder/assets/js/min/general/fusion-flip-boxes68b3.js?ver=1'></script>




</body>
</html>