@extends('admin.layouts.master')

@push('style')

@endpush

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{$orders[0]->user->name}} Users Details</h4>
                    <p class="category">List of all registered users</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Oder ID</th>
                            <th>Product Name</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($orders as $order)
                                <tr>

                                    <td>{{$order->id}}</td>
                                    <td>{{$order->products[0]->name}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->orderitems[0]->quantity}}</td>
                                    <td>{{$order->orderitems[0]->price}}</td>
                                    <td>{{$order->created_at}}</td>

                                    <td>

                                        @if($order->status == true)
                                            <span class="label label-success">Confirmed</span>

                                        @else
                                            <span class="label label-warning">Pending</span>
                                        @endif

                                    </td>


                                </tr>

                            @endforeach



                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush