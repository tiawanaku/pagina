<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Log In</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,400i,700,900">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
  </head>
  <body oncontextmenu=”return false” onkeydown=”return false”>
    <!-- Page-->
    <div class="text-left page">
      <!-- Page preloader-->
      <div class="page-loader">
        <div>
          <div class="page-loader-body">
            <div class="icon-gradient-block">
              <div class="icon-gradient-item"><span class="icon mdi mdi-trending-up"></span></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Header-->
      <header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="80px" data-lg-stick-up-offset="46px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand-name" href="index.html"><img src="images/brand-33.png" width="232" height="44" alt=""></a></div>
              </div>
              <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">Sobre Nosotros</a>
                      <!-- RD Navbar Dropdown-->
                      
                    </li>
                    
                      <!-- RD Navbar Dropdown-->
                      
                    </li>
                   
                      
                    </li>
                    
                      <!-- RD Navbar Megamenu-->
                      
                        </li>
                        <li>
                         
                        </li>
                        <li>
                          
                        </li>
                        <li>
                          
                        </li>
                      </ul>
                    </li>
                    
                  </ul>
                </div>
                <!--RD Navbar Search-->
                <div class="rd-navbar-search"><a class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search" href="#"><span></span></a>
                  <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                    <div class="form-wrap">
                      <label class="form-label form-label" for="rd-navbar-search-form-input">Search...</label>
                      <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
                      <div class="rd-search-results-live" id="rd-search-results-live"></div>
                    </div>
                    <button class="rd-search-form-submit fa-search"></button>
                  </form>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- Breadcrumbs Section-->
      <section class="section breadcrumb-wrapper bg-primary">
        <div class="shell">
          <h1>Login</h1>
          <ol class="breadcrumb-custom">
            <li><a href="./">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li>Login
            </li>
          </ol>
        </div>
      </section>
      <!-- Log In/Register Section-->
      <section class="section section-lg bg-white text-center">
        <div class="shell">
          <div class="range range-xs-center tabs-custom-wrap text-center">
            <div class="cell-sm-10 cell-md-8 cell-lg-4">
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal" id="tabs-1">
                <!-- Nav tabs-->
                <ul class="nav-custom nav-custom-tabs nav-custom-tabs-inline">
                  <li class="active"><a href="#tabs-1-1" data-toggle="tab">Login</a></li>
                  <!--<li><a href="#tabs-1-2" data-toggle="tab">Registration</a></li>-->
                </ul>
              </div>
            </div>
          </div>
          <div class="range range-xl range-xs-center">
            <div class="cell-sm-10 cell-md-8 cell-lg-4">
              <div class="tab-content text-left">
                <div class="tab-pane fade in active" id="tabs-1-1">
                  <!-- RD Login Form-->
                 <form method="post" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordar mi contraseña
                                    </label>
                                </div>
                                <div class="cell-md-12">
                    <!--Google captcha-->
                    <div class="form-wrap text-left form-validation-left">
                      <div class="recaptcha" id="captcha1" data-sitekey="6LfZlSETAAAAAC5VW4R4tQP8Am_to4bM3dddxkEt"></div>
                    </div>
                  </div>
                </div>
                <div class="form-button form-button-captha">
                  <button class="button button-primary" type="submit">Sign In</button>
                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                
                            </fieldset>
                        </form>
                  
                </div>
                <div class="tab-pane fade" id="tabs-1-2">
                  <!-- RD Register Form
                  <form class="rd-mailform text-left">
                    <div class="form-wrap form-wrap-validation">
                      <label class="form-label form-label-outside" for="forms-register-name">Username</label>
                      <input class="form-input" id="forms-register-name" type="text" name="name" data-constraints="@Required">
                    </div>
                    <div class="form-wrap form-wrap-validation">
                      <label class="form-label form-label-outside" for="forms-register-email">E-mail</label>
                      <input class="form-input" id="forms-register-email" type="email" name="email" data-constraints="@Email @Required">
                    </div>
                    <div class="form-wrap form-wrap-validation">
                      <label class="form-label form-label-outside" for="forms-register-password">Password</label>
                      <input class="form-input" id="forms-register-password" type="password" name="password" data-constraints="@Required">
                    </div>
                    <div class="form-wrap form-wrap-validation">
                      <label class="form-label form-label-outside" for="forms-register-confirm-password">Confirm Password</label>
                      <input class="form-input" id="forms-register-confirm-password" type="password" name="password" data-constraints="@Required">
                    </div>
                    <ul class="group-md group-middle">
                      <li>
                        <button class="button button-primary" type="submit">register</button>
                      </li>
                      <li>
                        <ul class="group-sm">
                          <li><a class="icon icon-md icon-circle icon-default fa-facebook" href="#"></a></li>
                          <li><a class="icon icon-md icon-circle icon-default fa-twitter" href="#"></a></li>
                        </ul>
                      </li>
                    </ul>
                  </form>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer
      <footer class="section page-footer section-md bg-gray-darker">
        <div class="shell shell-wide">-->
          <!-- RD Google Map
          <div class="rd-google-map-wrap">
            <div class="rd-google-map rd-google-map__model" data-zoom="15" data-y="40.643180" data-x="-73.9874068" data-styles="[{&quot;featureType&quot;:&quot;all&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:40}]},{&quot;featureType&quot;:&quot;all&quot;,&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;all&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#000000&quot;},{&quot;lightness&quot;:17}]}]">
              <ul class="map_locations">
                <li data-y="40.643180" data-x="-73.9874068">
                  <p>
                    2130 Fulton Street San Diego,
                    CA 94117-1080 USA
                  </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="range range-lg range-xs-center range-xl-right range-40 range-lg-60 range-xl-80">-->
            <!-- Contact Information
            <div class="cell-sm-5 cell-md-4 cell-lg-4 cell-xl-3">
              <h5>Contact Information</h5>
              <div class="heading-divider"></div>
              <ul class="list contact-list">
                <li>
                  <div class="unit unit-spacing-xs unit-xxs-horizontal">
                    <div class="unit-left"><span class="icon icon-md icon-secondary mdi mdi-map-marker"></span></div>
                    <div class="unit-body"><a href="#">2130 Fulton Street San Diego,<br>CA 94117-1080 USA</a></div>
                  </div>
                </li>
                <li>
                  <div class="unit unit-spacing-xs unit-xxs-horizontal">
                    <div class="unit-left"><span class="icon icon-md icon-secondary mdi mdi-phone"></span></div>
                    <div class="unit-body"><a href="callto:#">1-800-1234-567</a></div>
                  </div>
                </li>
                <li>
                  <div class="unit unit-spacing-xs unit-xxs-horizontal">
                    <div class="unit-left"><span class="icon icon-md icon-secondary mdi mdi-email-outline"></span></div>
                    <div class="unit-body"><a href="mailto:#">info@demolink.org</a></div>
                  </div>
                </li>
              </ul>-->
              <!-- Inline List
              <ul class="inline-list-md">
                <li><a class="icon icon-sm icon-default fa-facebook" href="#"></a></li>
                <li><a class="icon icon-sm icon-default fa-twitter" href="#"></a></li>
                <li><a class="icon icon-sm icon-default fa-instagram" href="#"></a></li>
                <li><a class="icon icon-sm icon-default fa-google" href="#"></a></li>
                <li><a class="icon icon-sm icon-default fa-pinterest-p" href="#"></a></li>
                <li><a class="icon icon-sm icon-default fa-linkedin" href="#"></a></li>
              </ul>
            </div>-->
            <!-- Quick Links
            <div class="cell-sm-5 cell-md-3 cell-lg-4 cell-xl-2">
              <h5>Quick Links</h5>
              <div class="heading-divider"></div>
              <ul class="list list-marked">
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="team.html">Our Team</a></li>
                <li><a href="classic-blog.html">Blog</a></li>
                <li><a href="contacts.html">Contacts</a></li>
              </ul>
            </div>-->
            <!-- Newsletter
            <div class="cell-sm-10 cell-md-5 cell-lg-4 cell-xl-3">
              <h5>Newsletter</h5>
              <div class="heading-divider"></div>
              <p>Keep up with our always upcoming product features and technologies. Enter your e-mail and subscribe to our newsletter.</p>-->
              <!-- Mailchimp
              <form class="rd-mailform rd-mailform-inline text-left" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                <div class="form-wrap form-wrap-validation">
                  <label class="form-label form-label-sm" for="forms-newsletter-email">Enter your e-mail</label>
                  <input class="form-input form-input-sm" id="forms-newsletter-email" type="email" name="email" data-constraints="@Email @Required">
                </div>
                <button class="button button-xs button-primary-accent" type="submit">Subscribe</button>
              </form>
            </div>
            <div class="cell-xs-12 cell-sm-10 cell-md-12 cell-xl-8">
              <p class="copyright">&#169; <span id="copyright-year"></span> All Rights Reserved <a href="terms-of-use.html">Terms of Use</a> and <a href="privacy-policy.html">Privacy Policy</a>
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>-->
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>