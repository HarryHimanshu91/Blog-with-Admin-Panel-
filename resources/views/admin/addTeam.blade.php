@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Add New Team Member </h3>
              </div>
              <!-- /.card-header -->
              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('team.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="card-body">
                   <div class="form-group">
                      <label for="category">Team Name </label>
                      <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Team Name">
                   </div>

                  <div class="form-group">
                    <label for="category"> Designation  </label>
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation Name">
                  </div>

                  <div class="form-group">
                    <label for="category"> Team Member Image </label>
                   <input type="file" name="image" id="image" class="form-control">
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