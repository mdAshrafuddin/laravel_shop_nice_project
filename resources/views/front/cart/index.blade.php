@extends('front.layouts.master')

@push('style')

@endpush

@section('content')
    <div class="container">

        <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
        <hr>

        {{--<h4 class="mt-5">Shopping Cart</h4>--}}

        <div class="cart-items">

            <div class="row">

                <div class="col-md-12">

                    <table class="table">

                        <tbody>

                        @if(Cart::instance('default')->count() > 0)

                           @foreach(Cart::instance('default')->content() as $item)
                               <tr>
                            <td><img src="{{ url('/uploads').'/'. $item->model->image }}" style="width: 5em"></td>
                            <td>
                                <strong>{{ $item->model->name }}</strong><br> {{ $item->model->description }}
                            </td>

                            <td>

                                <form action="{{ route('cart.destroy',$item->rowId) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link btn-link-dark btn-sm" type="submit">Remove</button>

                                </form>

                                <form action="{{ route('cart.saveLater',$item->rowId) }}" method="post">

                                    @csrf
                                    <button type="submit" class="btn btn-link btn-link-dark btn-sm">Save for later</button>
                                </form>


                            </td>

                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>

                            <td>$ {{ $item->model->price }}</td>
                        </tr>
                           @endforeach



                        </tbody>

                    </table>

                </div>
                <!-- Price Details -->
                <div class="col-md-6">
                    <div class="sub-total">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th colspan="2">Price Details</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>Subtotal </td>
                                <td>${{ Cart::subtotal() }} </td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>${{ Cart::tax() }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th>${{ Cart::total() }}</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="{{ url('/') }}" class="btn btn-outline-dark">Continue Shopping</a>
                    <a href="{{ url('/checkout') }}" class="btn btn-outline-info">Proceed to checkout</a>
                    <hr>

                </div>

                @else

                    <h3>There Is not Item in your Cart </h3>
                    <a href="{{ url('/') }}" class="btn btn-outline-dark">Continue Shopping</a>
                    <hr>

                @endif

                <div class="col-md-12">

                    @if(Cart::instance('saveForLater')->count() > 0)

                        <h4>2 items Save for Later</h4>
                        <table class="table">

                            <tbody>

                            @foreach(Cart::instance('saveForLater')->content() as $item)
                                <tr>
                                    <td><img src="{{ url('/uploads').'/'. $item->model->image }}" style="width: 5em"></td>
                                    <td>
                                        <strong>{{ $item->model->name }}</strong><br> {{ $item->model->description }}
                                    </td>

                                    <td>

                                        <form action="{{ route('saveLater.destroy',$item->rowId) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link btn-link-dark btn-sm" type="submit">Remove</button>

                                        </form>

                                        <form action="{{ route('saveLater.moveToCart',$item->rowId) }}" method="post">

                                            @csrf
                                            <button type="submit" class="btn btn-link btn-link-dark btn-sm">Move to later</button>
                                        </form>


                                    </td>

                                    <td>
                                        <select name="" id="" class="form-control" style="width: 4.7em">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </td>

                                    <td>$ {{ $item->model->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>


                    @endif



                </div>
            </div>


        </div>
    </div>
@endsection

@push('script')

@endpush