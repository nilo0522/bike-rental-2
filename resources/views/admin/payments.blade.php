@extends('layouts.app', ['activePage' => 'rentals', 'titlePage' => __('Rental Fees')])

@section('content')
<style>
#payments{
    width:100%;
    white-space: nowrap;
}
#payments_filter{
    margin-right:1%;
    width:50%;
    float: right;
    text-align: right;
}
}
#payments_paginate{
  width: 100%;
}


</style>
<!-- Datatable CSS -->

<!-- jQuery Library -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Rental Fees</h4>
            <p class="card-category"> Rental fee details and history of the customer</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <div class="large-12 columns">
              <table class="display nowrap table" cellspacing="0"id="payments">
                <thead class=" text-primary text-center">
                
                <th>
                    RenterName
                  </th>
                  <th>
                    Payment type
                  </th>
                  <th>
                    Payment Date
                  </th>
                  <th class = "text-center">
                  Trans Fee. 
                  </th>
                 
               
                </thead>
                <tbody class='text-center'>
                @forelse ($pay as $key=>$data)
                  <tr>
                  <td>
                  {{$data->fname}}
                    </td>
                    <td>
                    {{$data->paid_by}}
                    </td>
                    <td>
                    {{$data->payment_date}}
                    </td>
                    <td class="td-actions text-center">
                    {{$data->transfee}}
                    </td>
                  </tr>
                
                  @empty
                   no data found
                 @endforelse
                </tbody>
                <tfoot>
            <tr>
                <th colspan="4" cellspacing="0"style="text-align:right"></th>
            </tr>
  </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
    </div>
  </div>
</div>

<script type="text/javascript"> 
     $(document).ready(function(){
      $('#payments').DataTable( {
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
            $( api.column( 3 ).footer() ).html('Total Income: '+
                '₱'+pageTotal +' ( ₱'+ total +' total)'
            );
        },   
    } );
} );

      </script>
   
@endsection