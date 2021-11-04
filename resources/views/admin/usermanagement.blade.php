@extends('layouts.app', ['activePage' => 'usermanagement', 'titlePage' => __('Dashboard')])

@section('content')
<!-- Datatable CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can manage users</p>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="#" class="btn btn-sm btn-primary">Add user</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover mytable">
                  <thead class="text-primary thead-outline">
                    <tr>
                      <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Phone Number</th>
                    <th>Street</th>
                    <th> City</th>
                    <th> Status</th>
                    <th class="">
                      Actions
                    </th>
                  </tr></thead>
                  <tbody>
                  @forelse ($users as $key=>$data)
                          <tr>
                        <td> {{$data->fname}} {{$data->lname}}</td>
                        <td> {{$data->email}}</td>
                        @if($data->bikename==null)
                        <td> Renter</span></td>
                        @else
                          <td>Renter / Owner</td>
                       @endif
                        <td> {{$data->number}}</td>
                        <td> {{$data->street}}</td>
                        <td> {{$data->city}}</td>

                        @if($data->email_verified_at==null)
                        <td> <span class="badge badge-danger">Not Verified</span></td>
                        @else
                          <td> <span class="badge badge-success">Verified</span></td>
                       @endif
                        <td class="td-actions ">
                        <a rel="tooltip" class="btn btn-success btn-link" href="#" data-toggle="modal" data-target="#edit{{$data->id}}">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a>
                                                    </td>
                      </tr>
                      @include('admin/edituser')
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
  </div>
</div>
<!-- Script -->
<script type="text/javascript"> 
     $(document).ready(function(){

      $('table').DataTable({
        scrollX: false,
        searching:true,
        "paging": true,
        "lengthChange": false,
        "info":     false
      });
  
      });
      </script>


  @endsection