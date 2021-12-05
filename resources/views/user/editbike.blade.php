@extends('layouts.rentbike')
@section('title', 'Edit Bike')

@section('content')

    @forelse ($BikeDetail as $key=>$data)


        <!--Page Header-->
        <section class="page-header contactus_page">
            <div class="container">
                <div class="page-header_wrap">
                    <div class="page-heading">
                        <h1>Edit Bike Details</h1>
                    </div>
                    <ul class="coustom-breadcrumb">
                        <li><a href="home">Home</a></li>
                        <li>Edit Bike Details</li>
                    </ul>
                </div>
            </div>
            <!-- Dark Overlay-->
            <div class="dark-overlay"></div>
        </section>
        <!-- /Page Header-->


        <section>
            <div class="uploadcontainer">

                <form id="contact" action="{{route('updatebikes')}}" method="get">
                    @csrf
                    <h2 class='hidden'><a> {{ $data->id }}</a></h2>
                    <h2><a>{{ $data->bikename }}</a></h2>
                    <h4><a>Provide The Details</a></h4>

                    <fieldset>
                    <input  type="hidden" name="bike_id" value="{{ $data->id }}">
                    <input placeholder="Bike name" type="text" name="bikename" value="{{ $data->bikename }}" readonly>
                    </fieldset>
                   

                    <fieldset>
                            <select name="bikeprice" id="Location" required>
                                <option value="{{ $data->bikeprice }}" readonly>{{ $data->bikeprice }}</option>
                                <option value="300">300 - min</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800 - max</option>
                            </select>
                        </fieldset>
                    <fieldset>
                        <input placeholder="Bike Model" type="number" name="bikemodel" value="{{ $data->bikemodel }}"
                            required readonly>
                    </fieldset>

                    <fieldset>
                        <input placeholder="biketype" type="text" name="biketype" value="{{ $data->biketype }}"
                            required readonly>
                    </fieldset>

                    <fieldset>
                        <input placeholder="Address" name="address" type="text" value="{{ $data->address }}" required readonly>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Your Phone Number" value="{{ Auth::user()->number }}" name="personnumber"
                            type="tel" required readonly>
                    </fieldset>

                    <input style="display:none" value='{{ Auth::user()->id }}' name="user_id" />

                    <fieldset>
                        <input  type="text" name="location" value="{{ $data->location }}"
                            required readonly>
                    </fieldset>
                 <fieldset>
                
                    <p class="mt-4" style="color:white;"><strong>Note:</strong>You can only change the price of your posted bike.</p>
                

                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <button class="btn"type="submit">Save Changes</button>
                        </div>
                    </fieldset>
                </form>
            </div>

        </section>
    @empty
        no data found
    @endforelse

@endsection
