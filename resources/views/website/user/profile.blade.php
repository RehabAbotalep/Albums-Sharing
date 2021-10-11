@extends('website.layout.index')
@section('content')
    @include('website.layout.header')
    <section class="contact-us bg-light">
        <div class="container">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <h3 class="text-center">Update your profile</h3>

            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form action="{{route('profile.update')}}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group ">
                                <label for="inputName">Your Name</label>
                                <input type="text" id="inputName" class="form-control"
                                       placeholder="Write Your Name" name="name" value="{{$user->name}}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input type="email" id="inputEmail" class="form-control"
                                       placeholder="Write Your Email" name="email" value="{{$user->email}}">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="inputPassword">Enter Password </label>
                                <input type="password" id="inputPassword" class="form-control" placeholder=" Write Your password" name="password">
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="inputConfirmPassword">Confirm Password </label>
                                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="  Confirm Your password" name="password_confirmation">
                            </div>
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-gradiant">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
