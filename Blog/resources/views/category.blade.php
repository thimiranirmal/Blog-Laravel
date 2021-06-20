@extends('layout')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Category</h1>
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
                            <th>id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach($categorydata as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->title}}</td>
                            <td><img src="{{asset('img').'/'.$data->image}}" alt="" width="150px"></td>
                            <td>
                                <a class="btn btn-primary" href="{{url('admin/category/'.$data->id.'/edit')}}">Update</a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/category/'.$data->id.'/delete')}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            <!-- End of Main Content -->
@endsection
            