@extends('layout')
@section('title',$title)
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Posts</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                <div class="table-responsive">
                    @if(Session::has('success'))
                    <p class="text-success">{{session('success')}}</p>
                    @endif
                    @if(Session::has('warning'))
                    <p class="text-danger">{{session('warning')}}</p>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>User Id</th>
                            <th>Cat Id</th>
                            <th>Title</th>
                            <th>Thumb</th>
                            <th>Full Image</th>
                            <th>Detail</th>
                            <th>Tags</th>
                            <th>Action</th>
                        </tr>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->user_id}}</td>
                            @foreach($cats as $cat)
                                @if($data->cat_id==$cat->id)
                                <td>{{$cat->title}}</td>
                                @endif
                            @endforeach
                            <td>{{$data->title}}</td>
                            <td><img src="{{asset('img/postthumb')}}/{{$data->thumb}}" alt="" width="100px"><br></td>
                            <td><img src="{{asset('img/postfullimg')}}/{{$data->full_img}}" alt="" width="100px"></td>
                            <td>{{$data->detail}}</td>
                            <td>{{$data->tags}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{url('admin/post/'.$data->id.'/edit')}}">Update</a><a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/post/'.$data->id.'/delete')}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            <!-- End of Main Content -->
@endsection
            