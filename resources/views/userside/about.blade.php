@extends('layouts.app')
@section("title","About Page")
@section('content')
<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>About us</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Pages</a><i class="icon-angle-right"></i></li>
              <li class="active">About us</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
       
        <!-- divider -->
        <div class="row">
          <div class="span12">
           <div class="row">
           @foreach($about as $about)
              <div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                   
                   
                   @if($about['icons']=='Briefcase')
                     <i class="icon-briefcase icon-circled icon-64 active"></i>
                   @elseif($about['icons']=='Desktop')
                     <i class="icon-desktop icon-circled icon-64 active"></i>
                   @elseif($about['icons']=='Beaker')
                   <i class="icon-beaker icon-circled icon-64 active"></i>
                   @elseif($about['icons']=='Coffee')
                     <i class="icon-coffee icon-circled icon-64 active"></i>
                  @endif

                
                  </div>
                  <div class="text">
                    <h6> {{ $about->title }}</h6>
                   
                    <p>
                    {{ $about->description }}
                    </p>
                    <a href="#">Learn more</a>
                  </div>
                </div>
              </div>
              @endforeach
           </div>
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
        <div class="row">
          <div class="span12">
            <h4> Our Teams </h4>
          </div>
          
         @foreach($teams as $team)
          <div class="span3">
              <img src="/uploads/ourTeams/{{ $team->image }}" alt="" class="img-polaroid" />
              <div class="roles">
              <p class="lead">
                <strong> {{ $team->team_name }}</strong>
              </p>
              <p>
              {{ $team->designation  }}
              </p>
            </div>

          </div>
        @endforeach
         

        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
       
      </div>
    </section>

@endsection