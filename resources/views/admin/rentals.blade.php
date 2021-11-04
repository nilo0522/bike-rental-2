@extends('layouts.app', ['activePage' => 'rentals', 'titlePage' => __('Rentals')])

@section('content')

<!-- Datatable CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



<div class="content">
  <div class="container-fluid">
    <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title">Rentals</h3>
            <p class="card-category"> Rental details and history of the customer</p>
         </div>
         <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                
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
                   Total Amount
                  </th>
                
                  <th>
                   Rent Days
                  </th>
                  <th class="text-right">
                      Actions
                    </th>
                </thead>
                <tbody>
                @forelse ($rental as $key=>$data)
                  <tr>
                  <td>
                  {{$data->fname}} {{$data->lname}}
                    </td>
                    <td>
                    {{$data->rname}} {{$data->rlname}}
                    </td>

                    <td>
                    {{$data->bikename}}
                    </td>
                    <td>
                    {{$data->rent_start_date}}
                    </td>
                    <td>
                    {{$data->rent_end_date}}
                    </td>
                 
                    <td>
                    {{$data->total_amount}}
                    </td>
                    <td>
                    {{$data->rentdays}}
                    </td>
                    <td class="td-actions text-right">
                    
                   

                        <a rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="">
                              <i class="material-icons">delete</i>
                              <div class="ripple-container"></div>
                            </a>
                    </td>
                  </tr>
                


                  @empty
                   no data found
                 @endforelse
                </tbody>
              </table>
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
