
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->
    <head>
        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>Intrusion System</title>

        <meta name="author" value="10" content="themesflat.com">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" value="10" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Bootstrap  -->
        <link rel="stylesheet" type="text/css" href="{{asset('ui-data/stylesheets/bootstrap.css')}}" >

        <!-- Theme Style -->
        <link rel="stylesheet" type="text/css" href="{{asset('ui-data/stylesheets/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('ui-data/stylesheets/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('ui-data/stylesheets/colors/color1.css')}}" id="colors">
        <link rel="stylesheet" type="text/css" href="{{asset('ui-data/stylesheets/animate.css')}}">

        <!-- REVOLUTION LAYERS STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('ui-data/revolution/css/layers.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('ui-data/revolution/css/settings.css')}}">

        <link rel="shortcut icon" href="{{asset('ui-data/images/favicon.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('ui-data/images/favicon-apple.png')}}">


    </head>  
    <body class="bg-body3"> 
        <div class="boxed">
            <div class="preloader">
                <span class="loader">
                    <span class="loader-inner"></span>
                </span>
            </div> <!-- /.preloader -->

            <div id="header" class="bg-fff style1">
                <div class="container">
                    <div class="header-wrap clearfix">
                        <div id="logo">
                            <a href="index.html">
                                <h4>IntrusionSys</h4>
                                <!-- <img src="{{asset('ui-data/images/logo/logo.png')}}" alt="bookflare" width="157" height="29" data-retina="{{asset('ui-data/images/logo/logo@2x.png')}}" data-width="157" data-height="29"> -->
                            </a>
                        </div>
                        <div class="nav-wrap flat-text-right style1">
                            <nav id="main-nav">
                                <ul class="menu" >
                                @if (Route::has('login'))
                                
                                    <li class="active"><a href="/">HOME</a></li>
                                    @auth
                                        <li class=""><a href="{{ route('dashboard') }}">DASHBOARD</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}">LOGIN</a></li>   
                                        @if (Route::has('register'))                                       
                                            <li><a href="{{ route('register') }}">REGISTER</a></li>  
                                        @endif
                                    @endauth
                                @endif 
                                </ul>
                            </nav>
                        </div>

                        <div class="mobile-button">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div> <!-- #header -->

            <div class="flat-slider style1">
                <!-- SLIDER -->
                <div class="rev_slider_wrapper fullwidthbanner-container" >
                    <div id="rev-slider1" class="rev_slider fullwidthabanner" data-version="5.4.8">
                        <ul>
                            <!-- Slide 1 -->
                            <li data-transition="random">
                                <!-- Main Image -->
                                <img src="{{asset('ui-data/images/slider/bg-slider-1.jpg')}}" alt="bookflare"  class="rev-slidebg" 
                                data-bgposition="center center" 
                                data-bgfit="cover" 
                                data-bgrepeat="no-repeat" 
                                data-bgparallax="15" >
                                <div class="overlay"></div>

                                <!-- Layers --> 
                                <div class="tp-caption tp-resizeme font-Poppins font-weight-700  color-fff letter-spaceing-001 not-hover"
                                data-x="['center','center','center','center']" data-hoffset="['10','10','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-167','-167','-72','-72']"
                                data-fontsize="['80','80','60','40']"
                                data-lineheight="['100','100','80','60']"
                                data-width="full"
                                data-height="none"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                data-mask_in="x:0px;y:[100%];" 
                                data-mask_out="x:inherit;y:inherit;" 
                                data-start="1000" 
                                data-splitin="none" 
                                data-splitout="none"
                                data-textAlign="['center','center','center','center']" 
                                data-responsive_offset="on"  ><span style="text-shadow: 2px 2px #f3728b">Access Detection and Denial Model</span></div> 

                                
                                <div class="tp-caption"
                                data-x="['left','left','left','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['70','67','123','123']"
                                data-width="full"
                                data-height="none"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                data-mask_in="x:0px;y:[100%];" 
                                data-mask_out="x:inherit;y:inherit;" 
                                data-start="1800" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-responsive_offset="on" 
                                data-paddingtop= "['50','50','50','50']"
                                data-paddingbottom= "['50','50','50','50']"
                                data-textAlign="['center','center','center','center']"><a href="#free_check" class="flat-button btn-start-slider border-ra4 ">  RUN A QUICK CHECK</a>  </div>
                            </li><!-- /End Slide 1 -->    
                        </ul>
                    </div>
                </div> 
            </div> <!-- /.flat-slider -->

            <section class="flat-featured style3">
                <div class="wrap-featured">
                    <div class="container">
                        <div class="flat-iconbox clearfix style3 ">
                            <a href="{{ route('register') }}">
                            <div class="iconbox one-of-three style3 flat-text-center left  ">
                                <div class="iconbox-icon">
                                    <span class="icon-contract-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span></span>
                                </div>
                                <div class="iconbox-content">
                                    <h6 class="title"><a href="{{ route('register') }}">Create Account</a></h6>
                                </div>
                            </div>
                            </a>
                            <a href="{{ route('login') }}">
                            <div class="iconbox one-of-three style3 flat-text-center active">
                                <div class="iconbox-icon">
                                    <span class="icon-portfolio-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span></span>
                                </div>
                                <div class="iconbox-content">
                                    <h6 class="title"><a href="{{ route('login') }}">Access your Account</a></h6>
                                </div>
                            </div>
                            </a>
                            <a href="#">
                            <div class="iconbox one-of-three style3 flat-text-center right ">
                                <div class="iconbox-icon">
                                    <span class="icon-portfolio-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span></span>
                                </div>
                                <div class="iconbox-content style3">
                                    <h6 class="title"><a href="#">About Project</a></h6>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </section> <!-- /.flat-featured -->

            <section class="flat-testimonials style1 effect-animation" data-animation="pulse" data-animation-delay="0" data-animation-offset="75%">
                <div class="container">
                    <div class="flat-title flat-text-center">
                        <h2 class="title">Cyber Security Awareness Zone</h2>
                        <p class="description">How much do you know about the cyber security threats that company networks face, the risks they introduce and how to mitigate security best practices to guide their behavior.</p>
                    </div>
                    
                    <div class="flat-carousel"  data-column="2" data-column2="1" data-loop="true"  data-column3="1" data-gap ="30" data-dots="true" data-nav="false" >
                        <div class="wrap-testimonials clearfix owl-carousel">
                            @foreach ($awareness as $item)
                            <div class="testimonial clearfix">
                                <div class="wrap-avata-socails flat-text-center">
                                    <div class="avata">
                                        <a href="#"><img style="height: 150px;" src="<?php echo asset("medias/$item->media_url")?>" alt="{{$item->caption}}"></a>
                                    </div>
                                </div>
                                <div class="wrap-content">
                                    <div class="info">
                                        <h4 class="name"><a href="#">{{ucfirst($item->caption)}}</a></h4>
                                        <p class="position">{{date('jS M, Y', strtotime($item->created_at))}}</p>
                                    </div>
                                    <blockquote>
                                        {{substr($item->body, 0, 200)}}
                                    </blockquote>
                                </div>
                            </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
            </section> <!-- flat-testimonials -->

            <section class="flat-register-now" id="free_check">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 effect-animation" data-animation="fadeInLeft" data-animation-delay="0.2s" data-animation-offset="75%">
                            <div class="wrap-form">
                                <h4 class="free flat-text-center py-2" >Free Security Health Check</h4>
                                <div class="row" style="background: #fff; padding-top: 3%; font-size:20px;">
                                    @include('layouts.message')
                                    <form action="{{ route('assessment') }}" id="checklistForm" method="POST">
                                        @csrf
                                        <div class="row form-group">
                                            <div class="col-md-6 ">
                                                <p>Is multi-factor authentication practiced in your company?</p>
                                                <input type="radio" name="authentication" value="10" id="authentication_true"> True <br>
                                                <input type="radio" name="authentication" value="0" id="authentication_false"> False 
                                            </div>
                                            
                                            <div class="wrap-input col-md-6 ">
                                                <p>Do you employ a people-centric security approach?</p>
                                                <input type="radio" name="people_centric" value="10" id="people_centric_true"> True <br>
                                                <input type="radio" name="people_centric" value="0" id="people_centric_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p>Do you often reduce the level of employee negligence?</p>
                                                <input type="radio" name="reduce_negligence" value="10" id="reduce_negligence_true"> True <br>
                                                <input type="radio" name="reduce_negligence" value="0" id="reduce_negligence_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p>Do you inform employees about common phishing techniques?</p>
                                                <input type="radio" name="common_phishing" value="10" id="common_phishing_true"> True <br>
                                                <input type="radio" name="common_phishing" value="0" id="common_phishing_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p>Do protect access from remote devices?</p>
                                                <input type="radio" name="protect_remote_access" value="10" id="protect_remote_access_true"> True <br>
                                                <input type="radio" name="protect_remote_access" value="0" id="protect_remote_access_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p> Does your company use the principle of least privilege?</p>
                                                <input type="radio" name="least_privilege" value="10" id="least_privilege_true"> True <br>
                                                <input type="radio" name="least_privilege" value="0" id="least_privilege_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p>Does your company keep an eye on privileged users?</p>
                                                <input type="radio" name="privileged_users" value="10" id="privileged_users_true"> True <br>
                                                <input type="radio" name="privileged_users" value="0" id="privileged_users_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p>Does your company monitor third-party access to your data?</p>
                                                <input type="radio" name="third_party_access" value="10" id="third_party_access_true"> True <br>
                                                <input type="radio" name="third_party_access" value="0" id="third_party_access_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p>Does your back up your sensitive data?</p>
                                                <input type="radio" name="sensetive_data" value="10" id="sensetive_data_true"> True <br>
                                                <input type="radio" name="sensetive_data" value="0" id="sensetive_data_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p>Does your company conduct regular cybersecurity audits?</p>
                                                <input type="radio" name="security_audit" value="10" id="security_audit_true"> True <br>
                                                <input type="radio" name="security_audit" value="0" id="security_audit_false"> False 
                                            </div>

                                            <div class="wrap-input col-md-6 ">
                                                <p>Does your company employ biometric security?</p>
                                                <input type="radio" name="biometric_security" value="10" id="biometric_security_true"> True <br>
                                                <input type="radio" name="biometric_security" value="0" id="biometric_security_false"> False 
                                            </div>

                                        </div>
    
                                        <div class="wrap-btn">
                                            <button type="submit" class="flat-button btn-apply">SUBMIT NOW</button>
                                        </div>
                                    </form>                    
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </section> <!-- /.flat-register-now -->

            <div class="bottom bg-15222e">
                <div class="container">
                    <div class="row">
                        <div class="  col-md-6">
                            <div class="copyright flat-text-left">
                                <p>© Copyright {{date('Y')}} Ogbonnaya cyber security model, 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.bottom -->
            
            <a id="scroll-top"></a>
        </div>


        <script src="{{asset('ui-data/javascript/jquery.min.js')}}"></script>
        <script src="{{asset('ui-data/javascript/parallax.js')}}"></script>
        <script src="{{asset('ui-data/javascript/owl.carousel.min.js')}}"></script>
        <script src="{{asset('ui-data/javascript/jquery-fancybox.js')}}"></script>
        <script src="{{asset('ui-data/javascript/imagesloaded.min.js')}}"></script>
        <script src="{{asset('ui-data/javascript/jquery-isotope.js')}}"></script>
        <script src="{{asset('ui-data/javascript/waypoints.min.js')}}"></script>
        <script src="{{asset('ui-data/javascript/jquery.easing.js')}}"></script>
        <script src="{{asset('ui-data/javascript/jquery.cookie.js')}}"></script>
        
        <script src="{{asset('ui-data/javascript/smoothscroll.js')}}"></script>
        <script src="{{asset('ui-data/javascript/main.js')}}"></script>

        <!-- Revolution Slider -->
        <script src="{{asset('ui-data/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/slider.js')}}"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script src="{{asset('ui-data/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>

        <script>

        </script>
    </body>
</html>