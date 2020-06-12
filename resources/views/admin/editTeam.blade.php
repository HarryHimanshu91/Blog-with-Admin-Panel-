@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit Team Member </h3>
              </div>
              <!-- /.card-header -->
              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('team.update', $teams->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                 {{ method_field('PUT') }}

                <div class="card-body">
                   <div class="form-group">
                      <label for="category">Team Name </label>
                      <input type="text" class="form-control" id="team_name" name="team_name" value="{{ $teams->team_name }}">
                   </div>

                  <div class="form-group">
                    <label for="category"> Designation  </label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{ $teams->designation }}">
                  </div>

                  <div class="form-group">
                    <label for="category"> Team Member Image </label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img class="imgteams" src="/uploads/ourTeams/{{ $teams->image }}">
                    <input type="hidden" name="hidden_image" value="{{ $teams->image }}" />
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