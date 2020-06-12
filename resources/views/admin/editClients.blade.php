@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit Client </h3>
              </div>
              <!-- /.card-header -->
              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('clients.update', $clients->id ) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="category">Client Image </label>
                    <input type="file" name="image" id="image"class="form-control">
                    <img src="/uploads/Clients/{{ $clients->image }}">
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