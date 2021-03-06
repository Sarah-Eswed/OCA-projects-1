@extends('admin.layout.layout')

@section('content')

    {{--Container start--}}
    <div class="content-wrapper">
        <div class="content">
            {{--Form Start--}}
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">Manage Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Admin</h3>
                            </div>
                            <hr>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <form action="/adminside" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="admin_name" class="control-label mb-1">Admin Name</label>
                                    <input  name="admin_name" type="text" class="form-control" value="{{ old('user_name') }}">
                                    @if ($errors->has('user_name'))
                                        <div class="alert alert-danger">{{ $errors->first('user_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="admin_email" class="control-label mb-1">Admin Email</label>
                                    <input  name="admin_email" type="email" class="form-control" value="{{ old('user_email') }}">
                                    @if ($errors->has('user_email'))
                                        <div class="alert alert-danger">{{ $errors->first('user_email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="admin_password" class="control-label mb-1">Admin Password</label>
                                    <input  name="admin_password" type="password" class="form-control" value="{{ old('user_password') }}">
                                    @if ($errors->has('user_password'))
                                        <div class="alert alert-danger">{{ $errors->first('user_password') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="admin_image" class="control-label mb-1">Admin Image</label>
                                    <input  name="admin_image" type="file" class="form-control">
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" name="submit">Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--Form End--}}
            {{--Table Start--}}
            <div class="row justify-content-center align-items-center mt-4">
                <div class="col-8">
                    <!-- Recent Order Table -->
                    <div class="card card-table-border-none" id="recent-orders">
                        <div class="card-header justify-content-between">
                            <h2>Admins</h2>

                        </div>
                        <div class="card-body pt-0 pb-5">
                            <table
                                class="table card-table table-responsive table-responsive-large"
                                style="width: 100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Admin Name</th>
                                    <th class="d-none d-md-table-cell">Admin Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->user_id}}</td>
                                        <td><img src="images/{{$admin->user_image}}" width="55" height="55" class="rounded-circle"/></td>
                                        <td>
                                            <a class="text-dark" href="">{{$admin->user_name}}</a>
                                        </td>
                                        <td>{{$admin->user_email}}</td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a
                                                    class="dropdown-toggle icon-burger-mini"
                                                    href=""
                                                    role="button"
                                                    id="dropdown-recent-order1"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    data-display="static"
                                                ></a>
                                                <ul
                                                    class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdown-recent-order1">
                                                    <li class="dropdown-item">
                                                        <a href="{{ route('adminside.edit', $admin->user_id)  }}">Edit</a>
                                                    </li>
                                                    <form method="post" action="{{route('adminside.destroy', $admin->user_id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li class="dropdown-item">
                                                            <button type="submit"><a>Remove</a></button>
                                                        </li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--Table End--}}
        </div>
    </div>
    {{--Container End--}}
@endsection
