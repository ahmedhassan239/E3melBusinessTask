<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style type="text/css">
       .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

    </style>
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
                   <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Back <span class="sr-only">(current)</span></a>
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
          <input class="form-control mr-sm-2" type="search"  name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          {{csrf_field()}}
        </form>
      </div>
    </nav>
    <br>
    <div class="container">

        @if ($therapists->count() > 0)
              <div class="row">
                @foreach ($therapists as $row)
                    <div class="col-md-4">
                       <div class="card" style="width: 18rem; margin-top: 15px ; border: 1px solid #ccc;border-radius: 2px;">
                          <img width="370" height="240" src="{{$row->image_url}}" class="card-img-top" alt="...">
                          <div class="card-body">
                             <div class="row">
                                <div class="col-md-7">
                                   <h6 class="card-title">Name: <small>{{$row->name}}</small></h6>
                                </div>
                                <div class="col-md-5">
                                   <h6 class="card-title">
                                   Price:<small>{{$row->price}}</small></h5>
                                </div>
                             </div>
                             <br>
                             <hr>
                             <h6 class="card-title">
                             Title:<small> {{$row->title}}</small></h5>
                             <a href="#" class="btn btn-primary">Show More</a>
                          </div>
                       </div>
                    </div>   
                @endforeach
            </div>
        @else

          <div class="content">
                <div class="title m-b-md">
                    E3mel-Business-Evaluation-Task <br>
                    -Ahmed Hassan El Sayed-
                </div>

                <div class="links">
                    <a href="https://www.linkedin.com/in/ahmed-hassan239/">Linkedin</a>
                    <a href="https://wuzzuf.net/me/ahmedhassn">wuzzuf</a>
                    <a href="https://www.upwork.com/freelancers/~019429c30871abce6e">Upwork</a>
                    <a href="https://github.com/ahmedhassan239">GitHub</a>
                </div>
            </div>

        @endif
        

    </div>
</body>
</html>