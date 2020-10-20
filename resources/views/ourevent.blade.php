@extends('layouts.main')

@section('content')
    <!-- Banner Section -->

        <section class="page-banner">


            <div class="image-layer" style="background-image: url(images/main-slider/8.jpg);"></div>
            <div class="banner-inner">

                <div class="auto-container">

                    <div class="inner-container clearfix">

                        <h1>Departments Events & Activities</h1>



                    </div>

                </div>

            </div>

        </section>


        <!--Services Section-->

        <section class="services-section-three">



            <div class="auto-container">

                <h3>Pull all events from the database here</h3>

                @foreach ($events->chunk(3) as $items)
                    <div class="row row-cols-1 row-cols-md-3">
                    @foreach ($items as $event)
                        <div class="col mb-4">
                            <div class="card">
                                <img src="images/main-slider/8.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event['eventName'] }}</h5>
                                    <div class="card-text">
                                        <span class="event-type">
                                            Date:</span> <span class="type mr-5"> {{ $event['date'] }}
                                        </span>
                                    </div>
                                    <div class="mt-2 card-text">
                                        <span class="event-type">Type of Event:</span> <span class="type mr-5">{{ $event['eventType'] }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <h5><small class="text-muted">Event Description</small></h5>
                                        <p class="card-footer">{{ $event['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endforeach
            </div>

        </section>
@endsection
