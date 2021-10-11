@extends('website.layout.index')
@section('content')
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Sign Up To Join Us</h3>

            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form action="{{route('register.submit')}}" method="post">
                            @csrf
                            <div class="form-group ">
                                <label for="inputName">Write Your Name</label>
                                <input type="text" id="inputName" class="form-control"
                                       placeholder="Write Your Name" name="name" value="{{old('name')}}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input type="email" id="inputEmail" class="form-control"
                                       placeholder="Write Your Email" name="email" value="{{old('email')}}">
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
                                    Sign Up
                                </button>
                            </div>

                            <div >
                                <b> <span>Have An Account ?</span> <a href="{{route('login')}}" class="main-color ">Login</a></b>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
