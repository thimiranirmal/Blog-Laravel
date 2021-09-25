@extends('homelayout')

@section('content')
<div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="row my-4">
                        @if(count($posts)>0)
                            @foreach($posts as $post)
                            <div class="col-md-4">
                                <div class="card my-2">
                                    <a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}"><img src="{{asset('img/postthumb/'.$post->thumb)}}" class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a> </h5>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <p class="text text-info">No Post Found</p>
                        @endif
                    </div>
                    {{$posts->links()}}
                </div>
                
                
@endsection
