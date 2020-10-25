@extends('backend.layouts.master')
@section('header')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content_title')
All Therapists   

@endsection
@section('breadcrumb')
<li class="active">All Therapists</li>
@endsection
@section('content')
<div class="wrap-content container" id="container">
    
    <!-- start: DYNAMIC TABLE -->
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                
                <h5 class="over-title margin-bottom-15">
                <a href="/sitebackend/therapist/create" style="background-color: #3498DB;padding: 10px;border-radius: 8px;color: #fff;font-weight: 700;">Add Therapist</a>
                </h5>
 
                
                <br>
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
                        <ul>
                        </ul>
                    </div>
                    @endif
                    <div class="box box-primary">
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Title</th>
                                        <th>Created at</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($therapists as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->price }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->created_at }}</td>
                                      
                                        <td><a href="/sitebackend/therapist/{{ $row->id }}/edit" class="btn btn-success" data-toggle="modal" data-target="#{{ $row->id }}">Edit</a></td>
                                        <td><a href="/sitebackend/therapist/{{ $row->id }}/delete" class="btn btn-danger">Delete</a></td>
                                     
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>Name</th>
                                    <th>Price</th>
                                    <th>Title</th>
                                    <th>Created at</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE -->
    </div>
   @include('backend.edit.therapist')

@endsection

@section('script')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(function () {
    $('#example1').DataTable()
   
  })
</script>
@endsection

