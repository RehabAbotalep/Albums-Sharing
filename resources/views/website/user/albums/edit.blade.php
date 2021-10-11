@extends('website.layout.index')
@section('content')
    @include('website.layout.header')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Update <span class="main-color"> {{$album->name}}</span></h2>
            <form method="POST" action="{{route('albums.update', $album->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <fieldset>
                    <div class="form-group">
                        <label for="name">Album Name</label>
                        <input name="name" type="text" class="form-control"placeholder="Album Name" value="{{$album->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="description">Album Description</label>
                        <textarea name="description" type="text"class="form-control" placeholder="Album description">{{$album->description}}</textarea>
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
                        <input class="form-check-input" type="checkbox" value="1" name="is_public"
                               @if($album->is_public)
                                checked
                               @endif
                        >
                        <label class="form-check-label" for="flexCheckChecked">
                            Public
                        </label>
                    </div>
                    <button type="submit" class="btn btn-warning">Update!</button>
                </fieldset>
            </form>


        </div>
    </section>
@endsection





