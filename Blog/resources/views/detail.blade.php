@extends('homelayout')
@section('title',$detail->title)
@section('content')
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <h4 class="card-header">{{$detail->title}} </h4>
                        <img src="{{asset('img/postfullimg/'.$detail->full_img)}}" class="card-img-top" alt="{{$detail->title}}">
                        <div class="card-body">
                            <p>{{$detail->detail}}</p>
                        </div>
                        <div class="card-footer">
                            Category : <a href="{{url('category/'.Str::slug($detail->category->title).'/'.$detail->category->id)}}">{{$detail->category->title}}+++++++++++++++++++++++++++++++++</a>
                        </div>
                                
                    </div>
                    <span class="float-right  btn btn-primary">Views={{$detail->views}}</span>
                    <div class="card">
                        <h5 class="card-header">Comments <span class="badge badge-dark">{{count($detail->comments)}}</span></h5>
                            <div class="card-body">
                                @if($detail->comments)
                                    @foreach($detail->comments as $comment)
                                    <figure>
                                        <blockquote class="blockquote">
                                            <p>{{$comment->comment}}</p>
                                        </blockquote>
                                        @if($comment->user_id==0)
                                        <figcaption class="blockquote-footer">
                                            Admin 
                                        </figcaption>
                                        @else
                                        <figcaption class="blockquote-footer">
                                            {{$comment->user->name}} 
                                        </figcaption>
                                        @endif
                                    </figure>

                                    @endforeach
                                @endif
                            </div>
                    </div>   

                    <div class="card mt-2">
                        <h5 class="card-header form-control">Add Comment</h5>
                        <form action="{{url('save-comment/'.Str::slug($detail->title).'/'.$detail->id)}}" method="post">
                        @csrf
                            <div class="card-body">
                                <textarea name="comment" id="" cols="30" rows="2" class="form-control"></textarea>
                                <input type="submit" class="btn btn-dark mt-2" value="Comment">
                            </div>
                            </form>
                    </div>

                </div>
                
    
@endsection('content')