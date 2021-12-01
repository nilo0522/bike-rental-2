@extends('layouts.app', ['activePage' => 'payments', 'titlePage' => __('Payments')])

@section('content')


<!-- jQuery Library -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

<style>
  #rental{
    width:100%;
    white-space: nowrap;
}
#rental_filter{
  margin-right:1%;
  width:50%;
   float: right;
   text-align: right;
}
}
#rental_paginate{
  width: 100%;

}
</style>

<div class="content">
  <div class="container-fluid">
    <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title">Payments</h3>
            <p class="card-category"> Payments details and history of the customer</p>
         </div>
         <div class="card-body">
            <div class="table-responsive">
            <div class="large-12 columns">
            
              <table class="table" id="rental">
                <thead class=" text-primary text-center">
                
                <th>
                    Owner name
                  </th>
                  <th>
                   Renter Name
                  </th>
                  <th>
                    Bike Name
                  </th>
                  <th>
                    Rent Start
                  </th>
                  <th>
                    Rent End
                  </th>
                  <th>
                  Rent Days
                  </th>
                
                  <th>
                  Total Amount
                  </th>
                  
                </thead>
                <tbody class="text-center">
                @forelse ($rental as $key=>$data)
                  <tr>
                  <td class="text-center">
                  {{$data->fname}} {{$data->lname}}
                    </td>
                    <td class="text-center">
                    {{$data->rname}} {{$data->rlname}}
                    </td>
                    <td class="text-center">
                    {{$data->bikename}}
                    </td>
                    <td class="text-center">
                    {!! date('M-d-Y', strtotime($data->rent_start_date)) !!}
                    </td>
                    <td class="text-center">
                    {!! date('M-d-Y', strtotime($data->rent_end_date)) !!}
                    </td>
                    <td class="text-center">
                    {{$data->rentdays}}
                    </td>
                    <td class="text-center">
                    {{$data->sub_total}}
                    </td>
                  </tr>
                  @empty
                   no data found
                 @endforelse
                </tbody>
                <tfoot>
            <tr>
                <th colspan="6" style="text-align:right"> Owner's Income:</th>
                <th></th>
            </tr>
  </tfoot>
              </table>
            </div>
          </div>
</div>
<!-- Script -->
<script type="text/javascript"> 
     $(document).ready(function(){
      $('#rental').DataTable( {
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
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 6 ).footer() ).html(
                '₱'+pageTotal +' ( ₱'+ total +' total)'
            );
        },   
    } );
} );



      </script>

@endsection
