<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-items-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">My Account</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <main>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @if(count($posts)>0)
                            @foreach($posts as $post)
                            <div class="col-md-4">
                                <div class="card" >
                                    <a href="{{url('detail/'.$post->id)}}"><img src="{{asset('img/postthumb/'.$post->thumb)}}" class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{url('detail/'.$post->id)}}">{{$post->title}}</a> </h5>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <p class="text text-info">No Post Found</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow" >
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="button-addon2">
                                <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 shadow">
                        <div class="card-header">Recent Post</div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item">Post 1</a>
                                <a href="#" class="list-group-item">Post 2</a>
                                <a href="#" class="list-group-item">Post 3</a>
                                <a href="#" class="list-group-item">Post 4</a>
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
    </main>
</body>
</html>