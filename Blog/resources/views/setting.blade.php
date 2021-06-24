@extends('layout')
@section('title',$title)
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Setting</h1>
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
                <form method="post" action="{{url('admin/setting')}}" enctype="multipart/form-data">
                @csrf

                    <table class="table table-bordered">
                        <tr>
                            <th>Comment Auto Approve</th>
                            <td><input class="form-control" type="text" name="comment_auto" @if($setting) value="{{$setting->comment_auto}}" @endif/></td>
                        </tr>
                        <tr>
                            <th>User Auto Approve</th>
                            <td><input class="form-control" type="text" name="user_auto" @if($setting) value="{{$setting->user_auto}}" @endif/></td>
                        </tr>
                        <tr>
                            <th>Recent Post Limit</th>
                            <td><input class="form-control" type="text" name="recent_post" @if($setting) value="{{$setting->recent_post}}" @endif/></td>
                        </tr>
                        <tr>
                            <th>Popular Post Limit</th>
                            <td><input class="form-control" type="text" name="popular_post" @if($setting) value="{{$setting->popular_post}}" @endif/></td>
                        </tr>
                        <tr>
                            <th>Recent Comments Limit</th>
                            <td><input class="form-control" type="text" name="recent_comment_post" @if($setting) value="{{$setting->recent_comment_post}}" @endif/></td>
                        </tr>
                        
                        
                    </table>

                    <input class="btn btn-primary" type="submit" value="UPDATE" style="margin:10px;"/>
                </form>    
            </div>
            <!-- End of Main Content -->
@endsection
 