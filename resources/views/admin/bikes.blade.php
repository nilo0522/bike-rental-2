@extends('layouts.app', ['activePage' => 'bikes', 'titlePage' => __('Bikes'  )])

@section('content')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}"/>

<!-- jQuery Library -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<style>
  #bikes{
    width:100%;
    white-space: nowrap;
}
#bikes_filter{
  margin-right:1%;
  width:50%;
   float: right;
   text-align: right;
}
}
#bikes_paginate{
  width: 100%;

}
</style>



<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Bikes</h4>
            <p class="card-category"> Posted Bikes of the Customer</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <div class="large-12 columns">
              <table class="table table-hovered"id="bikes">
                <thead class=" text-primary text-center">
                    <th>
                   <!-- PARA SA PIC-->
                   Image
                  </th>
                  <th>
                   Bike name
                  </th>
                  <th>
                   Owner's name
                  </th>
                  <th>
                    Bike Price/Day
                  </th>
                  <th>
                    Address
                  </th>
                  <th>
                    Model
                  </th>
                  <th class="text-right">
                      Actions
                    </th>
                </thead>
                <tbody class="text-center">

                @forelse ($owner as $key=>$data)
                  <tr>
                  <td>
                  <div class="product-listing-img"><img  src="{{asset('uploads/'.$data->bikepic)}}" width="80px" height="80px"class="img-responsive" alt="Image" /> 
                    </td>
                    <td>
                    {{$data->bikename}}
                    </td>
                    <td>
                    {{$data->fname}}  {{$data->lname}}
                    </td>
                    <td>
                    {{$data->bikeprice}}
                    </td>
                    <td>
                    {{$data->address}}
                    </td>
                    
                    <td>
                    {{$data->bikemodel}}
                    </td>
                    <td class="td-actions text-right">
                   
                    <a rel="tooltip" class="btn btn-success btn-link" data-toggle="modal" data-target="#show{{$data->id}}" data-id="">
                    <i class="fa fa-eye"></i>
                  
                    </a>
                 
                        <div class="ripple-container"></div>
                    </a>
                      
                    </td>
                  </tr>
                  @include('admin/viewbike')
                  @empty
                   no data found
                 @endforelse

                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>





      
<!-- Script -->
<script type="text/javascript"> 

     $(document).ready(function(){
      $('#bikes').DataTable( {
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
                pageSize: 'LEGAL',
                download: 'open'
            }
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\₱,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                '₱'+pageTotal +' ( ₱'+ total +' total)'
            );
        },   
    } );
} );




      </script>

 

      @endsection