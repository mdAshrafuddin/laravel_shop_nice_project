@extends('front.layouts.master')

@push('style')

@endpush

@section('content')
    <div class="container">

            <h2>Order Details </h2>
            <hr>

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

            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">User Details</h4>
                            <p class="category">List of all stock</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <tbody>

                                <tr>
                                    <th>ID</th>
                                    <td>{{$order->user->id}}</td>
                                </tr>

                                <tr>
                                    <th>Name</th>
                                    <td>{{$order->user->name}}</td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>{{$order->user->email}}</td>
                                </tr>

                                <tr>
                                    <th>Register</th>
                                    <td>{{$order->user->created_at->diffForHumans()}}</td>
                                </tr>


                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Product Details</h4>
                            <p class="category">List of all stock</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <tbody>

                                <tr>
                                    <th>ID</th>
                                    <td>{{$order->products[0]->id}}</td>
                                </tr>

                                <tr>
                                    <th>Name</th>
                                    <td>{{$order->products[0]->name}}</td>
                                </tr>

                                <tr>
                                    <th>Price</th>
                                    <td>{{$order->products[0]->price}}</td>
                                </tr>



                                <tr>
                                    <th>Image</th>
                                    <td><img src="{{ url('uploads/',$order->products[0]->image) }}" alt="" class="img-thumbnail" style="width: 150px;"></td>
                                </tr>

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection

@push('script')

@endpush