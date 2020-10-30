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

                @foreach ($events->chunk(3) as $items)
                    <div class="row row-cols-1 row-cols-md-3">
                        @foreach ($items as $event)
                            <div class="col mb-4">
                                <div class="card">
                                    <img src="images/main-slider/8.jpg" height="100px" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event['eventName'] }}</h5>
                                        <div class="mb-2 card-text">
                                            <span class="event-type">Venue:</span> <span class="type mr-5">{{ $event['venue'] }}</span>
                                        </div>
                                        <div class="card-text">
                                            <span class="event-type">Date:</span> <span class="type mr-5">{!! \Carbon\Carbon::parse($event['date'])->format('l jS, F Y') !!}
                                            </span>
                                        </div>
                                        <div class="mt-2 card-text">
                                            <span class="event-type">Event Type:</span> <span class="type mr-5">{{ $event['eventType'] }}</span>
                                        </div>
                                        <a class="mt-3 btn btn-success" href="{{ route('eventDetails', $event->id) }}">Event Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                @endforeach
            </div>

        </section>
@endsection
