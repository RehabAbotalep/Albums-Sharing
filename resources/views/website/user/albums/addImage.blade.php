@extends('website.layout.index')
@section('content')
    @include('website.layout.header')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Add image to<span class="main-color"> {{$album->name}}</span></h2>
            <form method="POST" enctype="multipart/form-data" action="{{route('image.submit')}}">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                        <label for="description">Image Description</label>
                        <textarea name="description" type="text"class="form-control" placeholder="description">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="cover_image">Select an Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <input type="hidden" name="album_id" value="{{$album->id}}">

                    <button type="submit" class="btn btn-warning">Add!</button>
                </fieldset>
            </form>


        </div>
    </section>
@endsection





