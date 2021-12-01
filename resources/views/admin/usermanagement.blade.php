@extends('layouts.app', ['activePage' => 'usermanagement', 'titlePage' => __('Dashboard')])

@section('content')
<!-- Datatable CSS -->

<!-- jQuery Library -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

<style>
  #user{
    width:100%;
    white-space: nowrap;
}
#user_filter{
  width:50%;
  margin-right:1%;
  float: right;
  text-align: right;
}
}
#user_paginate{
  width: 100%;

}

  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

@if (session('message'))
    <div>
    <script>
      Command: toastr["success"]("Successfully Approved User")
      toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "5",
          "hideDuration": "2",
          "timeOut": "5000",
          "extendedTimeOut": "50",
          "showEasing": "swing",
          "hideEasing": "swing",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
      </script>
    </div>
    @endif

    @if (session('status'))
    <div>
    <script>
      Command: toastr["error"]("Successfully Disabled User")
      toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "5",
            "hideDuration": "2",
            "timeOut": "5000",
            "extendedTimeOut": "50",
            "showEasing": "swing",
            "hideEasing": "swing",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
      </script>
    </div>
    @endif
    

    
     




   <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can manage users</p>
              <h6 > Tap the buttons below action column if you want to perform actions</h6>
            </div>
            <div class="card-body">
   
                <div class="col-12 text-right">
                 
                </div>
              </div>
              <div class="table-responsive">
              <table class="display nowrap table" cellspacing="0"id="user">
                  <thead class="text-primary thead-outline text-center">
               
                    <tr>
                   
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Street</th>
                    <th> City</th>
                    <th> Status</th>
                    <th class="">
                      Actions
                    </th>
                    <th class="">
                      Details
                    </th>
                  </tr></thead>
                  <tbody class="text-center">
                  @foreach ($users as $key=>$data)
                        <tr>
                        <td> {{$data->email}}</td>
                        <td> {{$data->number}}</td>
                        <td> {{$data->street}}</td>
                        <td> {{ $data->id }}</td>
                        @if($data->email_verified_at==null)
                        <td> <span class="badge badge-danger">Not Verified</span></td>
                        @else
                          <td> <span class="badge badge-success">Verified</span></td>
                       @endif
                       <!-- TOOGLE APPROVAL -->



                       @if($data->email_verified_at==null)
                          <form id="approval" method="post" action="{{route('approval')}}">
                          @csrf
                          <td> 
                          <input type="hidden"id="user_id" name='user_id' value="{{$data->id}}">
                            <input type="hidden"id="email_verified_at" name='email_verified_at' value="{{Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')}}"></input>
                            <button  type="submit"class ="btn btn-success btn-sm" id="approve" name="approve">Approve</button>
                          </td>
                     <form>
                      @else
                      <form id="disable" method="post" action="{{route('disable')}}">
                          @csrf
                          <td>
                          <input type="hidden"id="user_id" name='user_id' value="{{$data->id}}">
                          <input type="hidden"id="email_verified_at" name='email_verified_at' value=""></input>
                            <button  type="submit" class ="btn btn-danger btn-sm" id="disable" name="disable">Disable</button>
                          </td>
                      
                        @endif




                        <td class="td-actions ">
                        <a rel="tooltip" class="btn btn-success btn-link" href="#" data-toggle="modal" data-target="#edit{{$data->id}}">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a>
                          </td>
                      </tr>
                   
                      @include('admin/edituser')
                     
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
<!-- Script -->





<script type="text/javascript"> 
      $(document).ready(function(){
      $('#user').DataTable( {
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
      });
  
      });
      </script>


  @endsection