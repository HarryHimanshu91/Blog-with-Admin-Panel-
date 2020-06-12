@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Add New Testimonial </h3>
              </div>
              <!-- /.card-header -->
              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('saveTestimonial') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="category"> Description </label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="category">Author Name </label>
                    <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Author Name">
                  </div>

                  <div class="form-group">
                    <label for="category">Author Meta </label>
                    <textarea class="form-control" id="author_meta" name="author_meta"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="category">Author Image </label>
                   <input type="file" name="author_image" class="form-control">
                  </div>
                 

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </div>
  </div>      
        
</div> 
      <!-- /.container-fluid -->
@endsection