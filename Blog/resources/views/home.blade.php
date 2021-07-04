@extends('homelayout')

@section('content')
<div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="row my-4">
                        @if(count($posts)>0)
                            @foreach($posts as $post)
                            <div class="col-md-4">
                                <div class="card" >
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
                
                <div class="col-md-4">
                    <div class="card mb-4 shadow" >
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form action="{{url('/')}}">
                                <div class="input-group mb-3">
                                    
                                    <input type="text" class="form-control" name="q" aria-describedby="button-addon2">
                                    <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4 shadow">
                        <div class="card-header">Recent Post</div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @if($recent_posts)
                                    @foreach($recent_posts as $post)
                                        <a href="#" class="list-group-item">{{$post->title}}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 shadow">
                        <div class="card-header">Popular Post</div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item">Post 1</a>
                                <a href="#" class="list-group-item">Post 2</a>
                                <a href="#" class="list-group-item">Post 3</a>
                                <a href="#" class="list-group-item">Post 4</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
@endsection
