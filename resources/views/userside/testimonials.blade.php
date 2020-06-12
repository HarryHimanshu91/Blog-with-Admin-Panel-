@extends('layouts/app')
@section("title","Testimonials Page")
@section('content')

<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Testimonials</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Pages</a><i class="icon-angle-right"></i></li>
              <li class="active">Testimonials</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row marginbot30">
          <div class="span12">
            <h4 class="heading"><strong>Client</strong> testimonials<span></span></h4>
            <div class="row">

             @if(count($Testimonial) > 0 )
                 @foreach($Testimonial as $Testimonial)
                 <div class="span6">
                <div class="wrapper">
                  <div class="testimonial">
                    <p class="text">
                      <i class="icon-quote-left icon-48"></i> {{ $Testimonial->description }}
                    </p>
                    <div class="author">
                      <img src="uploads/{{ $Testimonial->author_image}}" class="img-circle bordered" style="width: 10%;" alt="" />
                      <p class="name">
                      {{ $Testimonial->author_name }}
                      </p>
                      <span class="info">   {{ $Testimonial->author_meta }} </span>
                    </div>
                  </div>
                </div>
              </div>
                 @endforeach
             @endif
             
            
            </div>
           
          

          </div>
        </div>
      </div>
    </section>


@endsection