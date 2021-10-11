@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">update <small>{{$role->name}}</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{route('roles.update', $role->id)}}" method="POST">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{$role->name}}">
                            </div>
                            @error('name')
                            <span class="error">{{$message}}</span>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputEmail1">Permissions</label>
                                <select class="form-control" name="permissions[]" multiple>
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}"
                                                @foreach($role->permissions as $role_permit)
                                                    @if($role_permit->id == $permission->id)
                                                        selected
                                                    @endif
                                                @endforeach
                                        >
                                            {{$permission->name}}
                                        </option>
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



