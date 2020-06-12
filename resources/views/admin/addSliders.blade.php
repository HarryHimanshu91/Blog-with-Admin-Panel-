@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Add New Slider </h3>
              </div>
              <!-- /.card-header -->
              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="category"> Title  </label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title Name">
                  </div>

                  <div class="form-group">
                    <label for="category"> Description </label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                
                  <div class="form-group">
                    <label for="category"> Banner Image </label>
                   <input type="file" name="image" class="form-control">
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