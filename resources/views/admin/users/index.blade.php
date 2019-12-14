@extends('admin.layouts.master')

@push('style')

@endpush

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Users</h4>
                    <p class="category">List of all registered users</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td><span class="label label-warning">Blocked</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-success ti-check"
                                                title="Active User"></button>

                                        {{ link_to_route('users.show', 'show',$user->id,['class'=>'btn btn-info btn-sm']) }}
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