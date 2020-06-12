@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> About Page Content </h3>
              </div>
              <!-- /.card-header -->

              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('about.store') }}">
               {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Title </label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title Name">
                  </div>
                  <div class="form-group">
                    <label for="category"> Description  </label>
                   <textarea id="description" name="description"  class="form-control" rows="5"></textarea>
                  </div>
                 
                  <div class="form-group">
                    <label for="icons"> Select Icons  </label>
                       <select class="form-control" name="icons">
                       <option value=""> Select Icons </option>
                          <option value="Briefcase"> Briefcase Icon </option>
                          <option value="Desktop"> Desktop Icon </option>
                          <option value="Beaker">Beaker Icon </option>
                          <option value="Coffee"> Coffee Icon </option>
                      </select>
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