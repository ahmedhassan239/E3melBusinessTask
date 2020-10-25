<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      
        @if (Route::has('login'))
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                @auth
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/sitebackend') }}">Home <span class="sr-only">(current)</span></a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                             <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>       
                    @endif
                @endauth
            </ul>
         @endif
        <form class="form-inline my-2 my-lg-0" action="/search" method="POST">
          <input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          {{csrf_field()}}
        </form>
      </div>
    </nav>
    <br>
    <div class="container">
      <div class="row">
          @foreach ($therapist as $row)
              <div class="col-md-4">
                 <div class="card" style="width: 18rem; margin-top: 15px;">
                    <img width="370" height="240" src="{{$row->image_url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                       <div class="row">
                          <div class="col-md-7">
                             <h6 class="card-title">Name: {{$row->name}}</h6>
                          </div>
                          <div class="col-md-5">
                             <h6 class="card-title">
                             Price:{{$row->price}}</h5>
                          </div>
                       </div>
                       <hr>
                       <h6 class="card-title">
                       Title:{{$row->title}}</h5>
                       <a href="#" class="btn btn-primary">Show More</a>
                    </div>
                 </div>
              </div>   
          @endforeach
      </div>

    </div>
</body>
</html>