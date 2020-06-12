@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit Tag </h3>
              </div>
              <!-- /.card-header -->

              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('tags.update', $tags->id ) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Tag Name </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $tags->name }}" placeholder="Enter Category Name">
                  </div>
                  <div class="form-group">
                    <label for="category">Tag Slug </label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $tags->slug }}" placeholder="Enter Category Slug">
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