<div class="form-group">

    {{ Form::label('name', 'Product Name:') }}
    {{ Form::text('name' ,$products->name, ['class'=>'form-control border-input','placeholder' => 'Macbook pro']) }}


</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

    {{ Form::label('price', 'Product Price:') }}
    {{ Form::text('price' ,$products->price, ['class'=>'form-control border-input','placeholder' => '$2500']) }}

    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description' ,$products->description, ['class'=>'form-control border-input','placeholder' => 'Product Description']) }}

    <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>

</div>

<div class="form-group">
    {{ Form::label('file', 'File') }}
    {{ Form::file('image',['class'=>'form-control border-input', 'id' => 'image'] ) }}
    <div id="thumb-output"></div>

</div>