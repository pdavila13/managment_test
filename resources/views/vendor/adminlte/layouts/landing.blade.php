<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Managment - Crèdit de síntesi</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/templatemo-style.css') }}">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- start preloader -->
    <div class="preloader">
        <div class="sk-spinner sk-spinner-rotating-plane"></div>
    </div>
    <!-- end preloader -->
    <!-- start navigation -->
    <nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">scool</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left text-uppercase">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#feature">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#download">Download</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
    <!-- start home -->
    <section id="home">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="text-upper">Managment Landing Page</h1>
                        <p class="tm-white">Configuration, migration between years, maintenance periods academics, other data, integration with external applications such as Ldap/Moodle<a rel="nofollow" href="http://www.facebook.com/templatemo" target="_parent">templatemo</a>. Images by <a rel="nofollow" href="http://pixabay.com" target="_blank">Pixabay</a></p>
                        <img src="{{ asset ('/images/software-img.png') }}" class="img-responsive" alt="home img">
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->
    <!-- start divider -->
    <section id="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                    <i class="fa fa-laptop"></i>
                    <h3 class="text-uppercase">RESPONSIVE LAYOUT</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                </div>
                <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                    <i class="fa fa-twitter"></i>
                    <h3 class="text-uppercase">BOOTSTRAP 3.3.4</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                </div>
                <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                    <i class="fa fa-font"></i>
                    <h3 class="text-uppercase">GOOGLE FONT</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end divider -->

    <!-- start feature -->
    <section id="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                    <h2 class="text-uppercase">Our Software Features</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><span><i class="fa fa-mobile"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><i class="fa fa-code"></i>Quis autem velis reprehenderit et quis voluptate velit esse quam.</p>
                </div>
                <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                    <img src="{{ asset ('/images/software-img.png') }}" class="img-responsive" alt="feature img">
                </div>
            </div>
        </div>
    </section>
    <!-- end feature -->

    <!-- start feature1 -->
    <section id="feature1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <img src="{{ asset ('/images/software-img.png') }}" class="img-responsive" alt="feature img">
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <h2 class="text-uppercase">More of Your Software</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><span><i class="fa fa-mobile"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><i class="fa fa-code"></i>Quis autem velis reprehenderit et quis voluptate velit esse quam.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end feature1 -->

    <!-- start download -->
    <section id="download">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                    <h2 class="text-uppercase">Download Our Software</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                    <button class="btn btn-primary text-uppercase" onclick="location.href='https://github.com/pdavila13/managment_test';" value="Go to Github"><i class="fa fa-download"></i> Download</button>
                </div>
                <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                    <img src="{{ asset ('/images/software-img.png') }}" class="img-responsive" alt="feature img">
                </div>
            </div>
        </div>
    </section>
    <!-- end download -->

    <!-- start contact -->
    <section id="contact">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <h2 class="text-uppercase">Contact Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                        <address>
                            <p><i class="fa fa-map-marker"></i>Avd. Colom 34-42, Tortosa, Tarragona</p>
                            <p><i class="fa fa-phone"></i> 977500949 or 977503064</p>
                            <p><i class="fa fa-envelope-o"></i> info@iesebre.com</p>
                        </address>
                    </div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="contact-form">
                            <form action="#" method="post">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" placeholder="Message" rows="4"></textarea>
                                </div>
                                <div class="col-md-8">
                                    <input type="submit" class="form-control text-uppercase" value="Send">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact -->

    <!-- start footer -->
    <footer>
        <div class="container">
            <div class="row">
                <p>Copyright © 2084 Paolo Dávila</p>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <script src="{{ asset ('/js/jquery.js') }}"></script>
    <script src="{{ asset ('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('/js/wow.min.js') }}"></script>
    <script src="{{ asset ('/js/jquery.singlePageNav.min.js') }}"></script>
    <script src="{{ asset ('/js/custom.js') }}"></script>
</body>
</html>
