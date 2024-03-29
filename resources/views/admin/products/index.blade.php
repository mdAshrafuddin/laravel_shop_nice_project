@extends('admin.layouts.master')
@section('page')
    View Products

@endsection
@push('style')

@endpush

@section('content')

    <div class="row">

        <div class="col-md-12">
            @include('admin.layouts.meassage')
            <div class="card">
                <div class="header">
                    <h4 class="title">All Products</h4>
                    <p class="category">List of all stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Desc</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $key => $product)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{str_limit($product->description,'10')}}</td>
                                <td><img src="{{url('uploads').'/'.$product->image}}" alt="" class="img-thumbnail"
                                         style="width: 50px"></td>
                                <td>

                                    {!! Form::open(['route' => ['products.destroy',$product->id], 'method' => 'DELETE']) !!}

                                        {{ Form::button('<span class="fa fa-trash"></span>',['type'=>'submit', 'class' => 'btn btn-sm btn-danger btn-sm', 'onclick'=>'return confirm("Are You sure you want to delete this?")']) }}

                                        {!! link_to_route('products.edit','',$product->id , ['class' => 'btn btn-sm btn-info ti-pencil-alt'] ) !!}
                                        {!! link_to_route('products.show','',$product->id , ['class' => 'btn btn-sm btn-primary ti-view-list-alt'] ) !!}
                                    {!! Form::close() !!}


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