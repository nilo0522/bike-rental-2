@extends('layouts.app', ['activePage' => 'return', 'titlePage' => __('Dashboard')])

@section('content')
<!-- Datatable CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.dataTables.min.css')}}"/>

<!-- jQuery Library -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<style>
#returntable{
    width:100%;
    white-space: nowrap;
}
#returntable_filter{
  width:50%;
   float: right;
   text-align: right;
}
}
#returntable_paginate{
  width: 100%;

}
</style>
  <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Returned Bikes</h4>
              <p class="card-category"> Here you can manage users</p>
            </div>
            <div class="card-body">
                              <div class="row">
               
              </div>
              <div class="table-responsive">
              <div class="large-12 columns">
                <table class="table table-hover mytable" id='returntable'>
                  <thead class="text-primary thead-outline text-center">
                    <tr>
                    <th>Bike name</th>
                    <th>Renter Name</th>
                    <th>Owner Name</th>
                    <th>MeetUp Location</th>
                    
                    <th class="" >
                    Return Date
                    </th>
                  </tr></thead>
                  <tbody class="text-center">
                    @forelse ($return as $key=>$data)
                        <tr>
                        <td>{{$data->bikename}}</td>
                        <td>{{$data->rentername}} {{$data->renterlname}}</td>
                        <td>{{$data->ownername}} {{$data->lastname}}</td>
                        <td>{{$data->meetup}}</td>
                        <td lass="td-actions">
                        {{$data->created_at}}
                        </td>
                        @empty
                   no data found
                 @endforelse
                      </tr>
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
<!-- Script -->
<script type="text/javascript"> 

     $(document).ready(function(){
      $('#returntable').DataTable( {
        "order": [[ 0, "asc" ]],
        "scrollX": false,
        "searching":true,
        "language": {
        "search": '<i class="fa fa-search" style="width:25px;hieght:25px;"></i>',
        "searchPlaceholder": "Search records"
    },
        "paging": true,
        "iDisplayLength": 5,
        "lengthChange": false,
        "pagingType": "numbers",
        "info":false,
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '16pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                download: 'open'
            }
        ],
        
    } );
} );




      </script>

  @endsection