@extends('website.layout.index')
@section('content')
    @include('website.layout.header')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Check Our <span class="main-color"> Packages</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>
            <div class="row">
                @forelse ($albums as $album)
                    <div class="col-md-4">
                        <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="card-header">
                                <img src="{{asset('images/albums/'.$album->cover_image)}}" class="lazyload">
                            </div>
                            <div class="card-body">
                                <h4> <a href="#"> {{$album->name}}</a></h4>
                                <p class="package-price">
                                    <span>{{$album->user->name}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Albums yet</p>
                @endforelse


            </div>
        </div>
    </section>
@endsection





