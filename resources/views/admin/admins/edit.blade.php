@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit {{$admin->name}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{route('admins.update', $admin->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{$admin->name}}">
                            </div>
                            @error('name')
                            <span class="error">{{$message}}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$admin->email}}">
                            </div>
                            @error('email')
                            <span class="error">{{$message}}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                            </div>
                            @error('password')
                            <span class="error">{{$message}}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                            </div>
                            @error('password')
                            <span class="error">{{$message}}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Roles</label>
                                <select class="form-control" name="roles[]" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}"
                                                @foreach($admin->roles as $admin_role)
                                                    @if($role->id === $admin_role->id)
                                                        selected
                                                    @endif
                                                @endforeach
                                        >{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('permissions')
                            <span class="error">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection



