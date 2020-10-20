@extends('layouts.main')

@section('content')
    <section class="page-banner">

           <div class="image-layer" style="background-image: url(images/main-slider/9.jpg);"></div>



            <div class="banner-inner">

                <div class="auto-container">

                    <div class="inner-container clearfix">

                        <h1>Contact Us</h1>



                    </div>

                </div>

            </div>

        </section>


        <!--Contact Section-->

        <section class="contact-section">

            <div class="auto-container">

                <div class="row clearfix">

                    <div class="left-col col-lg-5 col-md-12 col-sm-12">

                        <div class="inner-box">



                            <div class="contact-info-box">

                                <div class="inner">

                                    <ul class="info">

                                        <li class="clearfix">

                                            <h4>Quick contact</h4>

                                            <div class="content">

                                                <span class="icon flaticon-telephone-2"></span>

                                                <span>Call on</span><br>

                                                <a class="txt" href="">+234 (0)</a>

                                            </div>

                                        </li>

                                        <li class="clearfix">

                                            <h4>Email address</h4>

                                            <div class="content">

                                                <span class="icon flaticon-postcard"></span>

                                                <span>Mail to</span><br>

                                                <a href="mailto:info@citygovt.com" class="txt">info@bilaterial.gov.ng</a>

                                            </div>

                                        </li>

                                        <li class="clearfix">

                                            <h4>Visit our office</h4>

                                            <div class="content">

                                                <span class="icon flaticon-map"></span>

                                                <span class="txt">Block G, Old Secretariat Area 1, Garki, Abuja
                                                    Federal Ministry of Industry, Trade & Investment,
                                                    Department of Trade</span>

                                            </div>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="right-col col-lg-6 col-md-12 col-sm-12">

                        <div class="inner">

                            <div class="sec-title with-separator">

                                <h2>Contact Us Form</h2>

                                <div class=""><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>

                                <div class="lower-text">Please fill the below form for enquiries</div>

                            </div>

                            <div class="default-form form-box">
                                <form method="POST">

                                    <div class="form-group">

                                        <div class="field-inner">

                                            <input type="text" name="username" placeholder="Your name *" required="" value="">

                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <div class="field-inner">

                                            <input type="email" name="email" placeholder="Email" required="" value="">

                                        </div>

                                    </div>




                                    <div class="form-group">

                                        <div class="field-inner">

                                            <textarea name="message" placeholder="Message..." required=""></textarea>

                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Send Message</span></button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>



            </div>







        </section>
@endsection
