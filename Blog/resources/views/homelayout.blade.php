<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Home Page')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('home')}}">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-items-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('home')}}">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{url('all-category')}}">Categories</a>
            </li>
            @guest
            <li class="nav-item">
            <a class="nav-link" href="{{url('login')}}">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{url('register')}}">Register</a>
            </li>
            @else
            <li class="nav-item">
            <a class="nav-link" href="{{url('save-post-form')}}">Add Post</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
            </li>
            <form id="logout-form" action="{{route('logout')}}" method="post" class="d-none"></form>
            @endguest
        </ul>
        </div>
    </div>
    </nav>
    <main>
    @yield('content')
    <div class="col-md-4">
                    <div class="card mb-4 shadow" >
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form action="{{url('/')}}">
                                <div class="input-group mb-3">
                                    <input type="text" name="q" class="form-control" aria-describedby="button-addon2">
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
                            @if($popular_posts)
                                @foreach($popular_posts as $post)
                                <a href="#" class="list-group-item">{{$post->title}} <span class="btn btn-info">{{$post->views}}</span></a>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>