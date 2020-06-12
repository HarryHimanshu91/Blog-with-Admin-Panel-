@extends('layouts/app')
@section("title","Edit Profile")
@section('content')

<section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <h4>Update Your <strong> Profile </strong></h4>
          </div>
        
            @if( count($errors) > 0 )
                <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                  @endforeach
                </ul>
                </div>
            @endif
       
            <form method="POST" action="{{ route('profile.update', $user->id ) }}"   enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                        <label for="email"> Name </label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                        <label for="email"> Upload Image</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                        <input type="hidden" name="hidden_image" value="{{ $user->avatar }}">
                </div>

                <!-- <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                </div> -->
              
                 <button type="submit" class="btn btn-default">Update</button>

            </form>
         
        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
       
      </div>
    </section>


@endsection