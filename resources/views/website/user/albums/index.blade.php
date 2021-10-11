@extends('website.layout.index')
@section('content')
    @include('website.layout.header')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">My <span class="main-color"> Albums</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>
            <div class="row">
                @foreach($userAlbums as $album)
                    <div class="col-md-4">
                        <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="card-header">
                                <a href="{{route('albums.show', $album->id)}}">
                                    <img src="{{asset('images/albums/'.$album->cover_image)}}" class="lazyload">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4> <a href="{{route('albums.show', $album->id)}}"> {{$album->name}}</a></h4>
                                <p class="package-price">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <a class="btn btn-success btn-md center-block" Style="width: 100px;" href="{{route('albums.edit', $album->id)}}">Edit</a>
                                        <a class="btn btn-danger btn-md center-block" Style="width: 100px;"
                                           onclick="if(confirm('Are You Sure, Delete This item')){
                                               event.preventDefault;
                                               document.getElementById('delete-form-{{$album->id}}').submit();
                                               }else{
                                               event.preventDefault;
                                               }
                                               "
                                        >Delete</a>
                                    </div>
                                </div>
                                <form id="delete-form-{{$album->id}}" action="{{route('albums.destroy',$album->id)}}" style="display: none;" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection





