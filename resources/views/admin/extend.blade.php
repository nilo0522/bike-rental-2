@extends('layouts.app', ['activePage' => 'extend', 'titlePage' => __('Extended Bikes')])

@section('content')
<!-- Datatable CSS -->
<style>
  #extend{
    width:100%;
    white-space: nowrap;
}
#extend_filter{
  width:50%;
  margin-right:1%;
  float: right;
  text-align: right;
}
}
#extend_paginate{
  width: 100%;

}
</style>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Extend Bikes</h4>
              <p class="card-category"> Here you can see extend bikes for users</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <div class="large-12 columns">
              <table class="display nowrap table" cellspacing="0"id="extend">
                  <thead class="text-primary thead-outline text-center">
                    <tr>
                    <th>Renter Name</th>
                    <th>Bike Name</th>
                    <th>Extend Date</th>
                    <th>Paid</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                       
                      </tr>
                  </tbody>
                  <tfoot>
                <td colspan="3" style="text-align:right">Total Income:</th>
             </tfoot>
                </table>
              
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
      $('#extend').DataTable( {
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
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                '₱'+pageTotal +' ( ₱'+ total +' total)'
            );
        },   
    } );
} );

      </script>


  @endsection