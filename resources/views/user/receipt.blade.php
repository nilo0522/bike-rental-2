@extends('layouts.rentbike')
@section('title','Payments')
@section('content')
<style>
body {
    margin-top: 20px;
}
</style>




<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
           
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Rent A bike</strong>
                        <br>
                       Cagayan De Oro City
                        <br>
                        Misamis Oreintal
                        <br>
                        <abbr title="Phone">Mobile #:</abbr> 0956-096-3490
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p> @foreach($pay as $pay)
                        <em>{!! date('d-M-Y H:i:s', strtotime($pay->payment_date)) !!}</em>
                    </p>
                    <p>
                        <em>Receipt #: {{($pay->payment_id)}}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Your Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Bike name</th>
                            <th>Rent Days</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        
                        <tr>
                            <td class="col-md-9"><em>{{$pay->bikename}}</em></h4></td>
                            <td class="col-md-1" style="text-align: center">{{$pay->rentdays}} </td>
                            <td class="col-md-1 text-center">₱{{$pay->bikeprice}}</td>
                            <td class="col-md-1 text-center">₱{{$pay->fullpayment}}</td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax:  </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>₱{{$pay->sub_total}}</strong>
                            </p>
                            <p> 
                                <strong>₱{{$pay->transfee}}</strong>
                               
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>₱{{$pay->total_amount}}</strong></h4></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <a type="button" href="../home" class="btn btn-success btn-md btn-block">
                    Back to Home   <span class="glyphicon glyphicon-chevron-right"></span>
</a></td>
            </div>
        </div>
    </div>

</div>

@endsection