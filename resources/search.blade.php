<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

  
    <br>
    <div class="container">
      @if ($therapist->count() > 0)
        <div class="row">
          @foreach ($therapist as $row)
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

      <h1>No Result Found</h1>
      
      @endif
      

    </div>
</body>
</html>