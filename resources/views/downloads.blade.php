@extends('layouts.main')

@section('content')
    <!-- Banner Section -->

        <section class="page-banner">

            <div class="image-layer" style="background-image: url(images/main-slider/7.jpg);"></div>

            <div class="banner-inner">

                <div class="auto-container">

                    <div class="inner-container clearfix">

                        <h1>Agreements & MOU's</h1>



                    </div>

                </div>

            </div>

        </section>

        <!--Services Section-->

        <section class="services-section-three">
            <div class="sidebar-page-container" style="margin-top: -90px;">

                <div class="auto-container">

                    <div class="row clearfix">
                        <!--Content Side-->
                        <div class="content-side col-lg-11 col-md-12 col-sm-12">
                            <div class="content-inner">
                                <div class="service-details">
                                    <div class="download-links">
                                        <h3>Download Agreements & MOU's</h3>

                                        <div class="limiter">
                                            <div class="container-table100">
                                                <div class="wrap-table100">
                                                    <div class="table100">
                                                        <table>
                                                            <thead>
                                                                <tr class="table100-head">
                                                                    <th class="column1">ID</th>
                                                                    <th class="column2">Document Name</th>
                                                                    <th class="column3">Document Type</th>
                                                                    <th class="column4">Status</th>
                                                                    <th class="column5">Action</th>
                                                                    {{-- <th class="column6">Total</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($documents as $document)
                                                                    <tr>
                                                                        <td class="column1">{{ $document['id'] }}</td>
                                                                        <td class="column2">
                                                                         {{ $document['name'] }}
                                                                        </td>
                                                                        <td class="column3">{{ $document['documentType'] }}</td>
                                                                        <td class="column4">{{ $document['status'] }}</td>
                                                                        <td class="column5">
                                                                            <a href="{{ $document->document }}" target="_blank">
                                                                                <span class="download">     Download
                                                                                </span>
                                                                            </a>
                                                                        </td>

                                                                        {{-- <td class="column6">$999.00</td> --}}
                                                                    </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
	                                    </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!--Sidebar Side-->

                        <div class="sidebar-side col-lg-1 col-md-12 col-sm-12">

                            <aside class="sidebar">














                            </aside>

                        </div>



                    </div>

                </div>

            </div>

        </section>

@endsection
