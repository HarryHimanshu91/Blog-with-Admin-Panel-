@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit About Page Content </h3>
              </div>
              <!-- /.card-header -->

              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('about.update', $about->id ) }}">
               {{ csrf_field() }}
               {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Title </label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $about->title }}">
                  </div>
                  <div class="form-group">
                    <label for="category"> Description  </label>
                   <textarea id="description" name="description"  class="form-control" rows="5"> {{ $about->description }} </textarea>
                  </div>
                 
                  <div class="form-group">
                    <label for="icons"> Select Icons  </label>
                       <select class="form-control" name="icons">
                       <option value=""> Select Icons </option>
                           <option value="Briefcase" {{ $about->icons == 'Briefcase'  ? 'selected' : ''}} > Briefcase Icon </option>
                          <option value="Desktop" {{ $about->icons == 'Desktop'  ? 'selected' : ''}} > Desktop Icon </option>
                          <option value="Beaker" {{ $about->icons == 'Beaker'  ? 'selected' : ''}} >Beaker Icon </option>
                          <option value="Coffee" {{ $about->icons == 'Coffee'  ? 'selected' : ''}} > Coffee Icon </option>
                      </select>
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