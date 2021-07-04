@extends('homelayout')
@section('title','All Categories')
@section('content')
<div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="row my-4">
                        @if(count($categories)>0)
                            @foreach($categories as $category)
                            <div class="col-md-4">
                                <div class="card" >
                                    <a href="{{url('category/'.Str::slug($category->title).'/'.$category->id)}}"><img src="{{asset('img/'.$category->image)}}" class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{url('category/'.Str::slug($category->title).'/'.$category->id)}}">{{$category->title}}</a> </h5>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <p class="text text-info">No Category Found</p>
                        @endif
                    </div>
                    {{$categories->links()}}
                </div>
                
                
@endsection
