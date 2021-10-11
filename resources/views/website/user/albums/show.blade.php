@extends('website.layout.index')
@section('content')
    @include('website.layout.header')
    <section class="check_demo_movie">
        <div class="container">
            <div class="float-right">
                <a class="btn btn-gradiant" href="{{route('image.add', $album->id)}}">Add New image to album</a>
            </div>

            <h2 class=" wow fadeInDown">Album <span class="main-color"> {{$album->name}}</span></h2>
            <p>{{$album->description}}</p>
            <div class="row">
                @foreach($album->images as $image)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('images/albumImages/'.$image->image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">{{$image->description}}.</p>
                                <a href="{{route('image.delete', $image->id)}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection





