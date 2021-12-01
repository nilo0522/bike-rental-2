@extends('layouts.rentbike')
@section('title','Bike Listing')

@section('content')
<style>
* {
    font-family: Roboto, 'Times New Roman', Times, serif;
}
.hbContainer {
    max-width: 400px;
    margin: auto;
    color:#111921;
    background-color:#f2d9bf;
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
.calendarList1 {
    list-style: none;
    width: 100%;
    margin: 0;
    padding: 0;
    text-align: center;
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    grid-template-rows: repeat(1, 40px);
    align-items: center;
    justify-items: center;
    grid-gap: 12px;
    font-size: 14px;
    color: #2767b1;
}
.calendarList2 {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: center;
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    grid-template-rows: repeat(6, 40px);
    align-items: center;
    justify-items: center;
    grid-gap: 8px;
    font-size: 14px;
    color: #111921;
}
.calendarYearMonth {
    margin-top: 24px;
}
.calendarYearMonth p {
    display: inline-block;
    vertical-align: middle;
    font-size: 20px;
}
.calBtn {
    user-select: none;
    cursor: pointer;
    background: white;
    margin: 8px 0;
    padding: 8px 10px;
    border-radius: 12px;
    font-size: 10px;
    line-height: 22px;
    color: #e6823c;
    border: 3px solid #c75b5b;
}

  </style>

<link rel="stylesheet" href="style.css" />
  
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">

@forelse ($BikeDetail as $key=>$data)
<br>
<section id="listing_img_slider">

<div><img src="{{asset('uploads/'.$data->bikepic)}}" class="img-responsive" alt="image" width="950" height="600"></div>
<br>
<div><img src="{{asset('uploads/'.$data->bikepic)}}" class="img-responsive" alt="image" width="950" height="600"></div>
<br>
<div><img src="{{asset('uploads/'.$data->bikepic)}}" class="img-responsive" alt="image" width="950" height="600"></div>

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
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Vendor Details</a></li>
              <li role="presentation"><a href="#book-sched" aria-controls="book-sched" role="tab" data-toggle="tab">Booking Schedule</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                
                <div class="row">
                  <div class="col-sm-7">
                      <div class="card">
                        <div class="card-body">
                            <img src="{{asset('uploads/'.$data->bikepic)}}" width = "300px" height="150px" style="background-repeat: no-repeat" />
                          </div> 

                      </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="card">
                      <div class="card-body">
                          <div class="form-group text-center">
                            <h1>{{$data->bikename}}</h1>
                            @foreach ($owner as $own)
                          <small>{{$own->fname}} {{$own->lname}}</small>
                          @endforeach
                            <h3>₱ {{$data->bikeprice}} / perday</h3>
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
                          <h5>{{$data->bikemodel}}</h5>
                          <p>Model</p>
                        </li>
                        <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                          <h5>{{$data->biketype}}</h5>
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
                  <p>Contact Number: {{$data->personnumber}}</p>
                  <p>Owner Address: {{$data->address}}</p>
                  <p>City: {{$data->location}}</p>
                </tbody>
                </table>
                
              </div>

           
          <!--END Accessories-->
           <!--Booking Schedule-->
          <div role="tabpanel" class="tab-pane" id="book-sched"> 
                <!--Booking Schedule-->
     
<section id="myCalendar">
            <div class="hbContainer">
                <div class="calendarYearMonth center">
                    <p class="left calBtn" onclick="prevMonth()"><strong> Prev </strong></p>
                    <p id="yearMonth"> Jan 2021  </p>
                    <p class="right calBtn" onclick="nextMonth()"><strong>Next </strong></p>
                </div>
                <div>
                    <ol class="calendarList1">
                        <li class="day-name">Sat</li>
                        <li class="day-name">Sun</li>
                        <li class="day-name">Mon</li>
                        <li class="day-name">Tue</li>
                        <li class="day-name">Wed</li>
                        <li class="day-name">Thu</li>
                        <li class="day-name">Fri</li>
                    </ol>
                    <ol class="calendarList2" id="calendarList">
          
                    </ol>
                </div>
                </div> 
        </section>
              </div>
 <!--ENDBooking Schedule-->
            </div>
          </div>
          
        </div>

   
      </div>
      
      <div class="col-sm-3">
              <!--Side-Bar-->
      
      
        <div class="share_vehicle " style="margin-top: 60px;!important" >
          <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
        </div>
        <div class="sidebar_widget">

         <a href="../booking/{{$data->id}} "  class="btn">Book Now! <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></i></h5>
      </div>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>

    
  </div>
</section>
<!--/Listing-detail--> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>

<script>
const months = [
    { 'id': 1, 'name': 'Jan' },
    { 'id': 2, 'name': 'Feb' },
    { 'id': 3, 'name': 'Mar' },
    { 'id': 4, 'name': 'Apr' },
    { 'id': 5, 'name': 'May' },
    { 'id': 6, 'name': 'Jun' },
    { 'id': 7, 'name': 'Jul' },
    { 'id': 8, 'name': 'Aug' },
    { 'id': 9, 'name': 'Sep' },
    { 'id': 10, 'name': 'Oct' },
    { 'id': 11, 'name': 'Nov' },
    { 'id': 12, 'name': 'Dec' },
];
var currentYear = new Date().getFullYear();
var currentMonth = new Date().getMonth() + 1;
function letsCheck(year, month) {
    var daysInMonth = new Date(year, month, 0).getDate();
    var firstDay = new Date(year, month, 01).getUTCDay();
    var array = {
        daysInMonth: daysInMonth,
        firstDay: firstDay
    };
    return array;
}
function makeCalendar(year, month) {
    var getChek = letsCheck(year, month);
    getChek.firstDay === 0 ? getChek.firstDay = 7 : getChek.firstDay;
    $('#calendarList').empty();
    for (let i = 1; i <= getChek.daysInMonth; i++) {
        if (i === 1) {
            var div = '<li id="' + i + '" style="grid-column-start: ' + getChek.firstDay + ';">1</li>';
        } else {
            var div = '<li id="' + i + '" >' + i + '</li>'
        }
        $('#calendarList').append(div);
    }
    monthName = months.find(x => x.id === month).name;
    $('#yearMonth').text(year + ' ' + monthName);
}
makeCalendar(currentYear, currentMonth);
function nextMonth() {
    currentMonth = currentMonth + 1;
    if (currentMonth > 12) {
        currentYear = currentYear + 1;
        currentMonth = 1;
    }
    $('#calendarList').empty();
    $('#yearMonth').text(currentYear + ' ' + currentMonth);
    makeCalendar(currentYear, currentMonth);
}
function prevMonth() {
    currentMonth = currentMonth - 1;
    if (currentMonth < 1) {
        currentYear = currentYear - 1;
        currentMonth = 12;
    }
    $('#calendarList').empty();
    $('#yearMonth').text(currentYear + ' ' + currentMonth);
    makeCalendar(currentYear, currentMonth);
}
</script>

  <script>
  $( "#Owndisable" ).click(function() {
    swal({
  title: "It is Your Bike",
  text: "You're Not Allowed To Book You Own Bike!",
  icon: "error",
  button: "X",
});
});
  </script>
@empty
            no data found
        @endforelse
@endsection
