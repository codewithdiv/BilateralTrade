<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Welcome to Bilaterial Website</title>

    <!-- Stylesheets -->

    <link href="/css/bootstrap.css" rel="stylesheet">

    <link href="/css/style.css" rel="stylesheet">

    <!-- Responsive File -->

    <link href="/css/responsive.css" rel="stylesheet">



    <link rel="shortcut icon" href="/images/nigerialogo.png" type="image/x-icon">

    <link rel="icon" href="/images/nigerialogo.png" type="image/x-icon">



    <!-- Responsive Settings -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->

    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</head>



<body>



    <div class="page-wrapper">

        <!-- Preloader -->

        <div class="preloader">
            <div class="icon"></div>
        </div>



        <!-- Main Header -->

        <header class="main-header header-style-one">

            <!-- Header Top -->

            <!--<div class="header-top header-top-one" style="display:none">

                <div class="auto-container">

                    <div class="inner clearfix">

                        <div class="top-left clearfix">



                            <div class="email"><a href="mailto:support@mygov.com"><span class="icon fa fa-envelope"></span>info@bilaterial.gov.ng</a></div>

                        </div>



                        <div class="mid-text"><span>Visiting London?</span> Find events, residents and more.</div>



                        <div class="top-right clearfix">

                            <div class="phone"><a href="tel:18001234567"><span class="icon fa fa-phone-alt"></span>call on: 1800 123 45 67</a></div>

                            <div class="hours">

                                <div class="hours-btn">Open: Mondays - Fridays: 8am - 4pm<span class="arrow flaticon-down-arrow"></span></div>



                            </div>

                        </div>

                    </div>

                </div>

            </div>-->



            <!-- Header Upper -->

            <div class="header-upper">

                <div class="auto-container">

                    <div class="inner-container clearfix">

                        <!--Logo-->

                        <div class="logo-box clearfix">

                            <div class="logo">
                                <a href="index.html"><img src="/images/nigerialogo.png" alt="Logo" title=""></a><span class="ml-2" style="font-size:18px">Bilaterial</span>
                            </div>

                            <div class="search-btn search-btn-one"><button type="button" class=""><span class="txt"></span> </button></div>

                        </div>



                        <!--Nav-->

                        <div class="nav-outer clearfix">

                            <!--Mobile Navigation Toggler-->

                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>



                            <!-- Main Menu -->

                            <nav class="main-menu navbar-expand-md navbar-light">

                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">

                                    <ul class="navigation clearfix ">

                                        <li class="current"><a href="/" class="ml-1">Home</a>



                                        </li>

                                        <li class=""><a href="/about">About</a>

                                        </li>

                                        <!-- <li class=""><a href="departments.html">Departments Services</a>



                                        </li>-->

                                        <li class=""><a href="/events">Events & Activities</a>



                                        </li>

                                        <li class=""><a href="/downloads">PDF Downloads</a>



                                        </li>

                                        <li><a href="/contactus">Contact</a></li>

                                    </ul>

                                </div>

                            </nav>

                        </div>



                        <!--Other Links-->

                        <div class="other-links clearfix">

                            <!--Language-->



                            <!--Social Links-->

                            <div class="social-links-one">

                                <ul class="clearfix">

                                    <li><a href="#" class="has-tooltip"><span class="fab fa-facebook-f"></span><div class="c-tooltip"><div class="tooltip-inner">Facebook</div></div></a></li>

                                    <li><a href="#" class="has-tooltip"><span class="fab fa-twitter"></span><div class="c-tooltip"><div class="tooltip-inner">Twitter</div></div></a></li>

                                    <li><a href="#" class="has-tooltip"><span class="fab fa-linkedin-in"></span><div class="c-tooltip"><div class="tooltip-inner">Linkedin</div></div></a></li>

                                </ul>

                            </div>



                        </div>



                    </div>

                </div>

            </div>

            <!--End Header Upper-->



            <!-- Sticky Header  -->

            <div class="sticky-header">

                <div class="auto-container clearfix">

                    <!--Logo-->

                    <div class="logo pull-left">

                        <a href="index.html" title=""><img src="images/nigerialogo.png" alt="" title="" width="20px"></a>

                    </div>

                    <!--Right Col-->

                    <div class="pull-right">

                        <!-- Main Menu -->

                        <nav class="main-menu clearfix">

                            <!--Keep This Empty / Menu will come through Javascript-->

                        </nav>
                        <!-- Main Menu End-->

                    </div>

                </div>

            </div>
            <!-- End Sticky Menu -->



            <!-- Mobile Menu  -->

            <div class="mobile-menu">

                <div class="menu-backdrop"></div>

                <div class="close-btn"><span class="icon flaticon-targeting-cross"></span></div>



                <nav class="menu-box">

                    <div class="nav-logo">
                        <a href="index.html"><img src="images/nigerialogo.png" alt="" title="" width="20px"></a>
                    </div>

                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>

                    <!--Social Links-->

                    <div class="social-links">

                        <ul class="clearfix">

                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>

                            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>

                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>

                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>

                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>

                        </ul>

                    </div>

                </nav>

            </div>
            <!-- End Mobile Menu -->

        </header>

        <!-- End Main Header -->
        <main>
            @yield('content')
        </main>

        <!-- Main Footer -->

    <footer class="main-footer">



        <!--Widgets Section-->

        <div class="widgets-section">

            <div class="auto-container">

                <div class="row clearfix">



                    <div class="column col-lg-4 col-md-6 col-sm-12">

                        <div class="footer-widget links-widget">

                            <div class="widget-title">

                                <h4>Quick Links</h4>

                            </div>

                            <div class="widget-content">

                                <ul class="links">

                                    <li><a href="/">Home</a></li>

                                    <li><a href="/about">About</a></li>

                                    <li><a href="/page/events">Events & Activities</a></li>

                                    <li><a href="/contactus">Contact</a></li>



                                </ul>

                            </div>

                        </div>

                    </div>

                    <!--Column-->

                    <div class="column col-lg-4 col-md-6 col-sm-12">

                        <div class="footer-widget num-widget">

                            <div class="widget-title">

                                <h4>Downloads</h4>

                            </div>

                            <div class="widget-content">

                                <ul class="num-links">

                                    <li><a href="/downloads">PDFs</a></li>



                                </ul>

                            </div>

                        </div>

                    </div>

                    <!--Column-->

                    <div class="column col-lg-3 col-md-6 col-sm-12">

                        <div class="footer-widget about-widget">


                            <div class="widget-title">

                                <h4>Contact</h4>

                            </div>

                            <div class="address">



                                <div class="text">Block G, Old Secretariat Area 1, Garki, Abuja <br>Federal Ministry of Industry, Trade & Investment, <br/>Department of Trade</div>

                            </div>

                            <div class="address">

                                <h5>Opening hrs</h5>

                                <div class="text">8am to 4pm</div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- Footer Bottom -->

        <div class="footer-bottom">

            <div class="auto-container">

                <div class="inner">

                    <div class="copyright">Copyrights &copy; Bilaterial. All rights reserved.</div>



                </div>

            </div>

        </div>



    </footer>

        <script src="/js/jquery.js"></script>

        <script src="/js/popper.min.js"></script>

        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/jquery-ui.js"></script>

        <script src="/js/jquery.fancybox.js"></script>

        <script src="/js/owl.js"></script>

        <script src="/js/scrollbar.js"></script>

        <script src="/js/appear.js"></script>

        <script src="/js/wow.js"></script>

        <script src="/js/custom-script.js"></script>
    </body>
</html>
