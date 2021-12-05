@extends('layouts.rentbike')
@section('title', 'Bike Listing')

@section('content')
    <style>
        * {
            font-family: Roboto, 'Times New Roman', Times, serif;
        }

        .hbContainer {
            max-width: 400px;
            margin: auto;
            color: #111921;
            background-color: #f2d9bf;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .center {
            text-align: center;
        }

        .ui-datepicker {
            margin-left:15%;
            height: 325px ;
            width:70%;
            font-size: 25px;
        }
        .ui-datepicker .ui-datepicker-title {
    margin: 0 0.3em;
    line-height: 1.8em;
    text-align: center;
        }
        .ui-datepicker td.ui-state-disabled>span{
            background: #808080;  
        }
        .ui-datepicker td.ui-state-disabled{
            opacity:25;
        }
        .square {
            text-align: center;
            height: 15px;
            width: 15px;
            background-color: #808080;
            }
            .white {
            text-align: center;
            height: 15px;
            width: 15px;
            border: 1px solid;
            background-color: #ffff;
            }
         
    </style>

    <link rel="stylesheet" href="style.css" />

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">



    <br>
    <section id="listing_img_slider">

        <div><img src="{{ asset('uploads/' . $BikeDetail->bikepic) }}" class="img-responsive" alt="image" width="950"
                height="600"></div>
        <br>
        <div><img src="{{ asset('uploads/' . $BikeDetail->bikepic) }}" class="img-responsive" alt="image" width="950"
                height="600"></div>
        <br>
        <div><img src="{{ asset('uploads/' . $BikeDetail->bikepic) }}" class="img-responsive" alt="image" width="950"
                height="600"></div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </section>
    <!--/Listing-Image-Slider-->




    <!--Listing-detail-->
    <section class="listing-detail">
        <div class="container">

            <div class="row">
                <div class="col-md-9">

                    <div class="listing_more_info ">
                        <div class="listing_detail_wrap ">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs gray-bg" role="tablist">
                                <li role="presentation" class="active"><a href="#vehicle-overview "
                                        aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview
                                    </a></li>

                                <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab"
                                        data-toggle="tab">Vendor Details</a></li>
                                <li role="presentation"><a href="#book-sched" aria-controls="book-sched" role="tab"
                                        data-toggle="tab">Booking Schedule</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- vehicle-overview -->
                                <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('uploads/' . $BikeDetail->bikepic) }}"
                                                        width="300px" height="150px" style="background-repeat: no-repeat" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group text-center">
                                                        <h1>{{ $BikeDetail->bikename }}</h1>
                                                        @foreach ($owner as $own)
                                                            <small>{{ $own->fname }} {{ $own->lname }}</small>
                                                        @endforeach
                                                        <h3>₱ {{ $BikeDetail->bikeprice }} / perday</h3>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <div class="main_features">
                                                <ul>

                                                    <li> <i class="fa fa-industry" aria-hidden="true"></i>
                                                        <h5>{{ $BikeDetail->bikemodel }}</h5>
                                                        <p>Model</p>
                                                    </li>
                                                    <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                                                        <h5>{{ $BikeDetail->biketype }}</h5>
                                                        <p>Bike Type</p>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <!-- Accessories -->
                                <div role="tabpanel" class="tab-pane" id="accessories">
                                    <!--Accessories-->
                                    <table>
                                        <tbody>
                                            <p>Contact Number: {{ $BikeDetail->personnumber }}</p>
                                            <p>Owner Address: {{ $BikeDetail->address }}</p>
                                            <p>City: {{ $BikeDetail->location }}</p>
                                        </tbody>
                                    </table>

                                </div>


                                <!--END Accessories-->
                                <!--Booking Schedule-->
                                <div role="tabpanel" class="tab-pane" id="book-sched">


                                <div>Unavailable Dates</div>
                                <div class="square center"></div>
                                <div>Available Dates</div>
                                <div class="white"></div>

                                    <section class="text-primary  " >
                                        <div id="calendar" class="text-primary" >
                                        </div>
                                    </section>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>

                <div class="col-sm-3">
                    <!--Side-Bar-->


                    <div class="share_vehicle " style="margin-top: 60px;!important">
                        <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i
                                    class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i
                                    class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i
                                    class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
                    </div>
                    <div class="sidebar_widget">

                        <a href="../booking/{{ $BikeDetail->id }} " class="btn">Book Now! <span
                                class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></i>
                        </h5>
                    </div>
                    <!--/Side-Bar-->
                </div>

                <div class="space-20"></div>
                <div class="divider"></div>


            </div>
    </section>
    <!--/Listing-detail-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js">
    </script>



    <script>
        $("#Owndisable").click(function() {
            swal({
                title: "It is Your Bike",
                text: "You're Not Allowed To Book You Own Bike!",
                icon: "error",
                button: "X",
            });
        });
    </script>


    <script>
        var dateRange = []; // array to hold the range
        // populate the array
        var rental = @json($rental);
        $.each(rental, function(key, value) {
            for (var d = new Date(value.rent_start_date); d <= new Date(value.rent_end_date); d.setDate(d
                    .getDate() + 1)) {
                dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
                ""
            }
        });


        function disableDates(date) {
            var string = $.datepicker.formatDate('yy-mm-dd', date);
            return [dateRange.indexOf(string) == -1];
        }
        $('#calendar').datepicker({
            
            dateFormat: 'yy-mm-dd',
            minDate: new Date(),
            beforeShowDay: disableDates
        })
    </script>

@endsection
