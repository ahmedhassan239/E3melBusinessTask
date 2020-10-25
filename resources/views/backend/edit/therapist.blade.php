 <!-- Modal -->
     @foreach($therapists as $row)
        <div class="modal fade" id="{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Therapist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="/sitebackend/therapist/{{ $row->id }}" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('msg'))
                        <?php
                        $msg = array();
                        $msg = session()->pull('msg');
                        echo'
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            ' . $msg[1] . '!
                        </div>
                        ';
                        ?>
                        @endif
                        @if(count($errors) >0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit Therapist</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 control-label">
                                            <label>Name:</label>
                                        </div>
                                        <div class="col-md-10 ">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="  fa fa-pencil-square-o"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right input-lg"  value="{{ $row->name }}" name="name"  placeholder="Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 control-label">
                                            <label>Title:</label>
                                        </div>
                                        <div class="col-md-10 ">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="  fa fa-pencil-square-o"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right input-lg"  value="{{ $row->title }}" name="title"  placeholder="Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 control-label">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="  fa fa-pencil-square-o"></i>
                                              </div>
                                              <textarea class=" form-control" cols="3" rows="3" placeholder="Description" name="description" required="required">{{$row->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 control-label">
                                            <label>Price</label>
                                        </div>
                                       <div class="col-md-10 ">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="  fa fa-pencil-square-o"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right input-lg"  value="{{ $row->price }}" name="price"  placeholder="Price" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              <div class="form-group">
                                <img id="blah" src="#" alt="" style="width: 100%;"/>
                            </div>
                            <div class="form-group">
                                <span class="btn btn-success fileinput-button"> 
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                        <span>Upload an image...</span>
                                        <input type="file" name="image_url" accept="image/*" onchange="readURL(this);" required="required">
                                </span>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Update <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        </div>
      @endforeach