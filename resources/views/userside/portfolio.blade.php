@extends('layouts/app')
@section("title","Portfolio Page")
@section('content')
<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Portfolio <strong>4 cols</strong></h2>
            </div>
          </div> 
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Portfolio</a><i class="icon-angle-right"></i></li>
              <li class="active">Portfolio 4 columns</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul class="portfolio-categ filter">
             
             @foreach($category as $category)
               <li><a href="{{ route('find', $category->id) }}">{{ $category->name }}</a></li>
             @endforeach
             
            
            </ul>
            <div class="clearfix">
            </div>
            <div class="row">
           
            <div id="thumbs" class="span12">         
              @foreach( $portfolio as $portfolio )
              <div class="span4 thumbsimsges"> 
              <a href="#" class="hvr-grow" >
                   <img src="/uploads/portfolio/{{ $portfolio['image']  }} " data-toggle="modal" data-target="#myModal_{{ $portfolio->id }}"> 
              </a>
            </div>
                   

                 
                    <div id="myModal_{{ $portfolio->id }}" class="modal fade" role="dialog" style="display:none;">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                   
                                    <h4 class="modal-title">
                                    </h4>
                                </div>
                                <div class="modal-body">
                                  <img src="/uploads/portfolio/{{ $portfolio['image']  }} ">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                   
              @endforeach

              
            </div>
           
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection