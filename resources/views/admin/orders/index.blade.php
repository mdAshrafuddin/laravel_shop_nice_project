@extends('admin.layouts.master')

@section('page')
    View Order
@endsection

@push('style')

@endpush

@section('content')

    <div class="row">

        <div class="col-md-12">
            @include('admin.layouts.meassage')
            <div class="card">
                <div class="header">
                    <h4 class="title">Orders</h4>
                    <p class="category">List of all orders</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            {{--<th>Address</th>--}}
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($orders as $key => $order)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>

                                        @foreach($order->products as $item)

                                           {{ $item->name }}

                                        @endforeach

                                    </td>
                                    <td>
                                        @foreach($order->orderitems as $item)

                                            {{ $item->quantity }}

                                        @endforeach

                                    </td>
                                    <td>

                                        @if($order->status == true)

                                            <span class="label label-success">Confirmed</span>
                                        @else

                                            <span class="label label-success">Pending</span>

                                        @endif

                                    </td>
                                    <td>

                                        @if($order->status == true)
                                            {{ link_to_route('order.pending','Pending',$order->id,['class'=>'btn btn-warning btn-sm']) }}
                                        @else
                                            {{ link_to_route('order.confirm','Confirm',$order->id,['class'=>'btn btn-success btn-sm']) }}
                                        @endif

                                            {{ link_to_route('orders.show','Show',$order->id,['class'=>'btn btn-red btn-sm']) }}




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