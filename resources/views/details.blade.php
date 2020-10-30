@extends('layouts.main')

@section('content')
    <!-- Banner Section -->

        <section class="page-banner">


            <div class="image-layer" style="background-image: url(/images/main-slider/8.jpg);"></div>
            <div class="banner-inner">

                <div class="auto-container">

                    <div class="inner-container clearfix">
                        <h1>{{ $eventDetail->eventName }}</h1>
                    </div>

                </div>

            </div>

        </section>


        <!--Services Section-->

        <div class="sidebar-page-container">

            <div class="auto-container">

                <div class="row clearfix">



                    <!--Content Side-->

                    <div class="content-side col-lg-4 col-md-4 col-sm-12">
                        <img src="\images/main-slider/8.jpg" alt="">
                    </div>
                    <div class="content-side col-lg-8 col-md-12 col-sm-12">

                        <div class="content-inner">

                            <div class="service-details">

                                <h2>Event Details</h2>

                                <div class="text-block">

                                    <h4>Event Type: {{ $eventDetail->eventType }}</h4>

                                    <h4>Venue: {{ $eventDetail->venue }}</h4>

                                    <h4>
                                        Date: {!! \Carbon\Carbon::parse($eventDetail->date)->format('l jS, F Y') !!}
                                    </h4>

                                    <h4>Event Description: {{ $eventDetail->description }}</h4>

                                    <h4>
                                        <a class="btn btn-success btn-group-lg" href="{{ $eventDetail->eventProgram }}" target="_blank">
                                            <span>View Event Program</span>
                                        </a>
                                    </h4>

                                </div>
                            </div>

                        </div>

                    </div>



                    <!--Sidebar Side-->

                    {{-- <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">

                        <aside class="sidebar">

                            <div class="bg-layer">



                                <div class="image-layer" style="background-image:url(images/background/sidebar-bg-image.jpg);"></div>

                            </div>

                            <div class="sidebar-widget services-widget" style="margin-top: -80px;">

                                <div class="widget-content">
                                    <div class="sidebar-title">



                                        <h4>Related Events</h4>

                                    </div>

                                    @foreach ($eventDetail as $event)
                                        <ul class="links clearfix">

                                        <li><a href="policing-crime.html"><span class="icon flaticon-sheriff-badge"></span> <span class="ttl">{{ $event->name }}</span></a></li>

                                        <li><a href="arts-culture.html"><span class="icon flaticon-statue"></span> <span class="ttl">Arts & culture</span></a></li>


                                    </ul>
                                    @endforeach

                                </div>

                            </div>






                        </aside>

                    </div> --}}



                </div>

            </div>

        </div>
@endsection
