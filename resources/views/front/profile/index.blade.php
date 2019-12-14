@extends('front.layouts.master')

@push('style')

@endpush

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12" id="register">

                            <div class="card col-md-12">
                                <div class="card-body">

                        <h2 class="card-title">User Profile </h2>
                            <hr>
                        <table class="table table-bordered">
                            <thead>

                            <tr>
                                <th colspan="2">User Details <a href="" class="pull-right"><i class="fa fa-cogs"></i>Edit user</a></th>

                            </tr>
                            </thead>

                            <tr>
                                <th>Id</th>
                                <td>{{ $user->id }}</td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>

                            <tr>
                                <th>Register At</th>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        </table>

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

                                                @foreach($user->order as $key => $order)

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

                                                            <a href="{{ url('/user/order'.'/'.$order->id) }}" class="btn btn-outline-dark btn-xs">Details</a>

                                                        </td>
                                                    </tr>

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

@endsection

@push('script')




@endpush