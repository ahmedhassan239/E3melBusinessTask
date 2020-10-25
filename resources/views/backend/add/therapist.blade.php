@extends('backend.layouts.master')
@section('content_title')

<h1 style="font-family: 'Source Sans Pro',sans-serif;margin-left: 4%;">Add New Therapist</h1>
@endsection
@section('breadcrumb') 
<li>Therapists</li>
<li class="active">Add New Therapist</li>
@endsection
@section('content')
	<br><br>
<div class="container-fluid container-fullw" style="width: 95%;">
	<div class="row">
		
		<div class="col-md-12">
			<form role="form" method="post" action="/sitebackend/therapist" enctype="multipart/form-data">
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
							<h3 class="box-title">Add New Therapist</h3>
							<div class="box-tools pull-right">
							    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<div class="row">
									<div class="col-md-1 control-label">
										<label>Name:</label>
									</div>
									<div class="col-md-6 ">
										<div class="input-group date">
										  <div class="input-group-addon">
										    <i class="	fa fa-pencil-square-o"></i>
										  </div>
										  <input type="text" class="form-control pull-right input-lg"  name="name"  placeholder="Name" required>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-1 control-label">
										<label>Title:</label>
									</div>
									<div class="col-md-6 ">
										<div class="input-group date">
										  <div class="input-group-addon">
										    <i class="	fa fa-pencil-square-o"></i>
										  </div>
										  <input type="text" class="form-control pull-right input-lg"  name="title"  placeholder="Title" required>
										</div>
									</div>
								</div>
							</div>

						

							<div class="form-group">
								<div class="row">
									<div class="col-md-1 control-label">
										<label>Description</label>
									</div>
									<div class="col-md-6">
										<div class="input-group date">
										  <div class="input-group-addon">
										    <i class="	fa fa-pencil-square-o"></i>
										  </div>
										  <textarea class=" form-control" cols="3" rows="3" placeholder="Description" name="description" required="required"></textarea>
										</div>
									</div>
								</div>
							</div>
							 
							<div class="form-group">
								<div class="row">
									<div class="col-md-1 control-label">
										<label>Price:</label>
									</div>
									<div class="col-md-6 ">
										<div class="input-group date">
										  <div class="input-group-addon">
										    <i class="	fa fa-pencil-square-o"></i>
										  </div>
										  <input type="number" class="form-control pull-right input-lg"  name="price"  placeholder="Price" required>
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

							
							
								<input type="submit" name="Save" class="btn btn-primary btn-lg pull-right " style="margin-right: 30px; margin-top: 5px;">
						</div>
					</div>
			</form>
		</div>
	
	</div>
</div>
<!-- Input addon -->

          <!-- /.box -->


       

@endsection