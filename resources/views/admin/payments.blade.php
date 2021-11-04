@extends('layouts.app', ['activePage' => 'payments', 'titlePage' => __('Payments')])

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
            <h4 class="card-title ">Payments</h4>
            <p class="card-category"> Payments details and history of the customer</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                
                <th>
                    RenterName
                  </th>
                  <th>
                    Payment type
                  </th>
                  <th>
                    Payment Date
                  </th>
                  <th>
                  Trans Fee. 
                  </th>
                  <th>
                   Bike ID
                  </th>
                  <th class="text-right">
                      Actions
                    </th>
                </thead>
                <tbody>
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
                    <td>
                    {{$data->transfee}}
                    </td>
                    <td>
                    {{$data->bike_id}}
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