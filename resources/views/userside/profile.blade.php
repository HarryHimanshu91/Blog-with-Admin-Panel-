@extends('layouts/app')
@section("title","Profile Page")
@section('content')

<section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            @if(session()->has("message"))
                <div class="alert alert-success">
                    <p>{{ session('message') }}</p>
                </div>
            @endif

            @if( count($errors) > 0 )
                <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                  @endforeach
                </ul>
                </div>
            @endif

              <h4>User Profile</h4>
          </div>
         
          <div class="span4">
            <div class="pricing-box-alt special">
             <div class= "userinfoimage">

                <center><img src="@if(Auth::user()->avatar)/uploads/UserProfile/{{ Auth::user()->avatar }} @else /uploads/dummyuser.png @endif"></center>
                
              </div>

              <div class="pricing-heading">
                <h3>{{ Auth::user()->name }} <strong></strong></h3>
              </div>
              <div class="pricing-terms">
                <h6>{{ Auth::user()->email }} </h6>
               
              </div>
            
              <div class="pricing-action">
                <a href="{{ route('profile.edit', Auth::user()->id ) }}" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Edit Profile </a>
                <!-- <a href="{{ route('logout' ) }}" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Logout </a> -->
               
                <a class="btn btn-medium btn-theme" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"> Logout </a>
               
                                <form  method="POST" action="{{ route('logout') }}" id="logout-form" style="display:none;">
                                    {{ csrf_field() }}
                                   
                                </form>

              </div>
            </div>
          </div>
         
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