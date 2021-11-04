@extends('layouts.app', ['activePage' => 'bikes', 'titlePage' => __('Bikes'  )])

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
            <h4 class="card-title ">Bikes</h4>
            <p class="card-category"> Posted Bikes of the Customer</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hovered">
                <thead class=" text-primary justify">
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
                    Location
                  </th>
                  <th>
                    Model
                  </th>
                  <th class="text-right">
                      Actions
                    </th>
                </thead>
                <tbody>

                @forelse ($owner as $key=>$data)
                  <tr>
                  <td>
                  <div class="product-listing-img"><img  src="{{asset('uploads/'.$data->bikepic)}}" width="80px" height="80px"class="img-responsive" alt="Image" /> 
                    </td>
                    <td>
                    {{$data->bikename}}
                    </td>
                    <td>
                    {{$data->fname}}    {{$data->lname}}
                    </td>
                    <td>
                    {{$data->bikeprice}}
                    </td>
                    <td>
                    {{$data->address}}
                    </td>
                    <td>
                    {{$data->location}}
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
                        <a rel="tooltip" class="btn btn-danger btn-link" href="" data-original-title="" title="">
                              <i class="material-icons">delete</i>
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