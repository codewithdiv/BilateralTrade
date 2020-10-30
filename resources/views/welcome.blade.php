@extends('layouts.main')

@section('content')
    <!-- Banner Section -->

        <section class="banner-section banner-one">



            <div class="banner-carousel owl-theme owl-carousel">

                <!-- Slide Item -->

                <div class="slide-item">

                    <div class="image-layer" style="background-image: url(images/background/IMG_2977.jpg);"></div>
                    {{-- <div class="image-layer" style="background-image: url(images/background/IMG_2977.jpg);"></div> --}}

                    <div class="auto-container">

                        <div class="content-box">

                            <div class="content clearfix">

                                <div class="inner">

                                    <h1>Check Out <br>The Division's Upcoming <br>Events</h1>

                                    <div class="text">The department have series of events that are being oraginsed in different places and different countries</div>

                                    <div class="links-box clearfix">

                                        <a href="/ourevent" class="theme-btn btn-style-one"><span class="btn-title">See All Events</span></a>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>



                <!-- Slide Item -->

                <div class="slide-item">

                    <div class="image-layer" style="background-image: url(images/main-slider/6.jpg);"></div>

                    <div class="auto-container">

                        <div class="content-box">

                            <div class="content clearfix">

                                <div class="inner">

                                    <h1>See all signed <br>Agreements and MoU's</h1>

                                    <div class="text">The Department houses all MoU's and Agreements signed by the Nigerian Goverment</div>

                                    <div class="links-box clearfix">

                                        <a href="/downloads" class="theme-btn btn-style-one"><span class="btn-title">View Documents</span></a>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>



                <!-- Slide Item -->

                {{-- <div class="slide-item">

                    <div class="image-layer" style="background-image: url(images/main-slider/3.jpg);"></div>

                    <div class="auto-container">

                        <div class="content-box">

                            <div class="content clearfix">

                                <div class="inner">

                                    <h1>the world's <br>largest urban <br>museum</h1>

                                    <div class="text">We're starting off with a handful of spots that should also be on your bucket list.</div>

                                    <div class="links-box clearfix">

                                        <a href="about.html" class="theme-btn btn-style-one"><span class="btn-title">Learn More</span></a>



                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                </div> --}}



            </div>

        </section>

        <!--End Banner Section -->

<!--Services Section-->

        <section class="services-section">

            <div class="sec-title with-separator centered">

                <h2>Division's Services</h2>


                <div class="lower-text" style="margin-top: -30px;">Bilateral Department render's 3 major services and these are</div>

            </div>

            <div class="auto-container">
                <div class="row clearfix">
                    <!--Featured Service Block-->
                    <div class="">

                        <div class="col-inner">

                            <div class="row clearfix">

                                <!--Feature Block-->

                                <div class="featured-block-two col-lg-6 col-md-6 col-sm-12">

                                    <div class="inner-box">

                                        <div class="content-box">

                                            <div class="icon-box"><span class="icon flaticon-sheriff-badge"></span></div>

                                            <div class="content">

                                                <h4><a href="policing-crime.html">Initiation, negotiation, implementation and assessment of BTA's</a></h4>

                                                <div class="text">Bilateral Trade Division is primarily responsible for the initiation, negotiation, implementation and assessment of Bilateral Trade Agreements (BTAs) and Memorandum of Understandings ( MoUs) between Nigeria and her prospective trading partners. </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <!--Feature Block-->

                                <div class="featured-block-two col-lg-6 col-md-6 col-sm-12">

                                    <div class="inner-box">

                                        <div class="content-box">

                                            <div class="icon-box"><span class="icon flaticon-traffic-light"></span></div>

                                            <div class="content">

                                                <h4><a href="transport-traffice.html">Participates in Bi—National Joint Commission Sessions and Trade Missions</a></h4>

                                                <div class="text">The Division also participates in Bi—National Joint Commission Sessions and Trade Missions organized by Bilateral Chambers and City Chambers of Commerce with a view to exploring business potentialities and improvement of our balance of trade position.</div>



                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <!--Feature Block-->

                                <div class="featured-block-two col-lg-6 col-md-6 col-sm-12">

                                    <div class="inner-box">

                                        <div class="content-box">

                                            <div class="icon-box"><span class="icon flaticon-statue"></span></div>

                                            <div class="content">

                                                <h4><a href="arts-culture.html">Organizes business forum</a></h4>

                                                <div class="text">The Division does organize business forum for match making and interface between businessmen of the country and other countries</div>



                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <!--Feature Block-->

                                {{-- <div class="featured-block-two col-lg-6 col-md-6 col-sm-12">

                                    <div class="inner-box">

                                        <div class="content-box">

                                            <div class="icon-box"><span class="icon flaticon-museum"></span></div>

                                            <div class="content">

                                                <h4><a href="land-department.html">Housing & <br>land department</a></h4>

                                                <div class="text">Our power of choice untrammelled and when nothing prevents what like best. </div>



                                            </div>

                                        </div>

                                    </div>

                                </div> --}}



                            </div>

                        </div>

                    </div>

                </div>



            </div>



        </section>




        <!--Events Section-->

        <section class="events-section">

            <div class="auto-container">

                <div class="row clearfix">



                    <div class="left-column col-xl-8 col-lg-12 col-md-12 col-sm-12">

                        <div class="col-inner">

                            <div class="sec-title with-separator">

                                <h2>Latest Department Activities & Events</h2>

                                <div class=""><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>

                            </div>



                            <div class="carousel-box">

                                <!--Event Block-->

                                <div class="event-block">

                                    <div class="inner-box">

                                        @foreach ($events as $event)
                                            <div class="content-box">

                                                <div class="date-box">
                                                    <div class="date">
                                                        <span class="type">{!! \Carbon\Carbon::parse($event['date'])->format('l jS, F Y') !!}</span>
                                                    </div>
                                                </div>

                                                <div class="content">

                                                    <div class="cat-info"><a href="#">{{ $event['eventType'] }}</a></div>

                                                    <h3><a href="event-details.html">{{ $event['eventName'] }}</a></h3>

                                                    <div class="location"><b>Venue:</b> {{ $event['venue'] }}</div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="see-all">

                                        <a href="/ourevent"><span class="arrow flaticon-right-2"></span> View All Upcoming Events</a>

                                    </div>

                                </div>





                            </div>



                        </div>

                    </div>



                    <div class="right-column col-xl-4 col-lg-12 col-md-12 col-sm-12">

                        <div class="col-inner">

                            <div class="newsletter-box">

                                <div class="image-box">

                                    <div class="image-layer" style="background-image: url(images/background/image-3.jpg);"></div>

                                    <div class="icon-box"><img src="images/icons/icon-email.png" alt=""></div>

                                    <h3>Subscribe Us</h3>

                                    <div class="text">Get latest News and Events Details.</div>

                                </div>

                                <div class="form-box">

                                    <form method="post" action="http://st.ourhtmldemo.com/new/City.Govt/contact.html">

                                        <div class="form-group clearfix">

                                            <input type="email" name="email" value="" placeholder="Enter email address" required>

                                            <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Subscribe Us</span></button>

                                        </div>

                                    </form>



                                </div>

                            </div>




                        </div>

                    </div>



                </div>

            </div>

        </section>


        <!--About Section-->

        <section class="about-section">

            <div class="image-layer" style="background-image: url(images/background/IMG_2977.jpg);"></div>

            {{-- <div class="pattern-layer" style="background-image: url(images/background/pattern-1.png);"></div> --}}

            <div class="auto-container">

                <div class="content-box">

                    <div class="content">

                        <div class="sec-title light">

                            <h2>From the Deputy Director (Bilaterial)'s Desk</h2>

                        </div>

                        <div class="upper-text desk clearfix">The division is meant for the consumption of the general public with advice to make use of it.</div>

                        <div class="text desk">Beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee.</div>



                        <div class="info">

                            <div class="name" style="font-size:larger">Ishaku Zakaria</div>

                            <div class="designation">Deputy Director (Bilaterial)</div>

                        </div>

                    </div>



                    <!--Quote-->



                </div>

            </div>

        </section>


        <!--Contact Info Section-->

        <section class="contact-info-section">

            <div class="image-layer" style="background-image: url(images/background/image-5.jpg);"></div>

            <div class="auto-container">

                <div class="sec-title with-separator centered">

                    <h2>Suggestion and Complaints</h2>


                    <div class="lower-text" style="margin-top:-30px">We are open to all forms of Suggestions and complaint from the general public</div>

                </div>

                <div class="info-outer clearfix">

                    <!--Info Box-->

                    <div class="info-box">

                        <div class="inner">

                            <div class="icon"><span class="flaticon-password"></span></div>

                            <strong>Call on</strong>

                            <div class="info"><a href="tel:+23408010000000">08010000000</a></div>

                        </div>

                    </div>

                    <!--Info Box-->

                    <div class="info-box">

                        <div class="inner">

                            <div class="icon"><span class="flaticon-contact"></span></div>

                            <strong>Mail at</strong>

                            <div class="info"><a href="mailto:Mail@mygovt.com">Mail@mygovt.com</a></div>

                        </div>

                    </div>

                    <!--Info Box-->

                    <div class="info-box">

                        <div class="inner">

                            <div class="icon"><span class="flaticon-circular-clock"></span></div>

                            <strong>Off hrs</strong>

                            <div class="info">8am to 4pm</div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
@endsection
