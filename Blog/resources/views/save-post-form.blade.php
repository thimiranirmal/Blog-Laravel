@extends('homelayout')
@section('title','Add Post')
@section('content')
<div class="container mt-4">
            <div class="row">
            <h3>Add New Post</h3>
                <div class="col-md-8">
                    <div class="row my-4">
                        <div class="table-responsive" style="margin:10px;">
                            @if($errors)
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{($error)}}</p>
                            @endforeach
                            @endif
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <form method="post" action="{{url('save-post-form')}}" enctype="multipart/form-data">
                            @csrf

                                <table class="table table-bordered">
                                    
                                    <tr>
                                        <th>Category</th>
                                        <td>
                                        <select name="category" class="form-control">
                                        @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td><input class="form-control" type="text" name="title"/></td>
                                    </tr>
                                    <tr>
                                        <th>Thumb</th>
                                        <td><input type="file" name="thumb"/></td>
                                    </tr>
                                    <tr>
                                        <th>Full Image</th>
                                        <td><input type="file" name="full_img"/></td>
                                    </tr>
                                    <tr>
                                        <th>Detail</th>
                                        <td><textarea class="form-control" type="text" name="detail"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Tags</th>
                                        <td><input class="form-control" type="text" name="tag"/></td>
                                    </tr>
                                </table>

                                <input class="btn btn-primary" type="submit" value="CREATE" style="margin:10px;"/>
                            </form>    
                        </div>
                    </div>
                    
                </div>
@endsection
 