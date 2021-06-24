@extends('layout')
@section('title',$title)
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add New Post</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Generate Report</a>
                    </div>
            </div>
            <div class="table-responsive" style="margin:10px;">
                @if($errors)
                @foreach($errors->all() as $error)
                <p class="text-danger">{{($error)}}</p>
                @endforeach
                @endif
                @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
                @endif
                <form method="post" action="{{url('admin/post')}}" enctype="multipart/form-data">
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
            <!-- End of Main Content -->
@endsection
 