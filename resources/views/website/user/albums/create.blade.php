@extends('website.layout.index')
@section('content')
    @include('website.layout.header')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Add new <span class="main-color"> Album</span></h2>
            <form method="POST" action="{{route('albums.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset>
                    <legend>Create an Album</legend>
                    <div class="form-group">
                        <label for="name">Album Name</label>
                        <input name="name" type="text" class="form-control"placeholder="Album Name" value="{{old('name')}}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="description">Album Description</label>
                        <textarea name="description" type="text"class="form-control" placeholder="Album description">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="cover_image">Select a Cover Image</label>
                        <input type="file" name="cover_image" class="form-control">
                    </div>
                    @error('cover_image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="1" name="is_public" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Public
                        </label>
                    </div>
                    <button type="submit" class="btn btn-warning">Create!</button>
                </fieldset>
            </form>


        </div>
    </section>
@endsection





