@extends("layouts.app")
@section("title","Home Page")
@section("content")



<section id="featured">
     <div class="bxslider-wrap">
         <ul class="bxslider">
           @foreach($slider as $slide) 
             <li><img src="{{ asset('uploads/Banners/'.$slide->image) }}" 
              title="<h2 class='bxslidesss'> {{$slide->title }} </h2> <p class='descrt'>{{$slide->description }} </p>" /></li> 
           @endforeach
          </ul>
    </div>
      
    
    </section>

    
    
    <section id="content">
      <div class="container">
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
          </div>
        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->


        <!-- Portfolio Projects -->
        <div class="row">
            <h4 class="heading">Some of recent <strong>works</strong></h4>
              <div class="span12">
                <ul class="portfolio-categ filter">
                    @foreach($category as $category)
                      <li><a href="{{ route('find', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                  </ul>
              </div>
            <div class="clearfix"></div>

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
        <!-- End Portfolio Projects -->



        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
        <div class="row">
          <div class="span12">
            <h4>Very satisfied <strong>clients</strong></h4>
            <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
             
             @foreach($clients as $client)
              <li><a href="#"><img src="/uploads/Clients/{{ $client->image }}" class="client-logo" alt="" />	</a> </li>
             @endforeach
              

            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="bottom">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="aligncenter">
              <div id="twitter-wrapper">
                <div id="twitter">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



  @endsection
  

