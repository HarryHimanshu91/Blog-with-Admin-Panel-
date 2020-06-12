@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit Slider </h3>
              </div>
              <!-- /.card-header -->
              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('slider.update',$slider->id ) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="category"> Title  </label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $slider->title }}" >
                  </div>

                  <div class="form-group">
                    <label for="category"> Description </label>
                    <textarea class="form-control" id="description" name="description"> {{ $slider->description }} </textarea>
                  </div>
                
                  <div class="form-group">
                    <label for="category"> Banner Image </label>
                   <input type="file" name="image" class="form-control">
                   <img src="/uploads/Banners/{{ $slider->image }}" style="width:20%;">
                  </div>
                 

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </div>
  </div>      
        
</div> 
      <!-- /.container-fluid -->
@endsection