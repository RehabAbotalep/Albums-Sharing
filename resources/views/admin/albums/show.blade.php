@extends('admin.layout.index')
@section('content')
    <div class="container">
        <h2 class=" wow fadeInDown">Album <span class="main-color"> {{$album->name}}</span></h2>
        <p>{{$album->description}}</p>
        <div class="row">
            @foreach($album->images as $image)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('images/albumImages/'.$image->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{$image->description}}.</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection



