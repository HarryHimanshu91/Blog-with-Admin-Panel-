@extends('layouts/app')
@section("title","Blogs Page")
@section('content')

<section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
         

          @if(count($singleCategory->posts) > 0 )
        
           @foreach($singleCategory->posts as $post)
           <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="{{ route('singleBlog',['id'=> $post['id'] ]) }}"> {{ $post['title'] }}</a></h3>
                    </div>
                  
                  </div>
                  <p>
                      {!! htmlspecialchars_decode(Str::words($post['body'] ,70 )) !!}   
                  </p>
                
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#">  </a></li>
                      <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                  
                      @foreach($post['categories'] as $cat)
                      <li><i class="icon-angle-right"></i><a href="{{  route('postcategory', ['id'=> $cat['id'] ]) }}"> {{ $cat['name'] }}  </a> </li>
                      @endforeach
                    
                      @foreach($post['tags'] as $tag)
                      <li><i class="icon-angle-right"></i><a href="{{ route('postTag', ['id'=> $tag['id'] ]) }}"> {{ $tag['name'] }} </a> </li>
                      @endforeach
                    
                    </ul>
                    <a href="{{ route('singleBlog',['id'=> $post['id'] ]) }}" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                  </div>
                </div>
              </div>
            
            </article>
            
           @endforeach

           @else
               <div class="alert alert-error">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>Opppps!</strong> Post not found for this related Category.!!
                </div>

          @endif
           

            
          @if(count($singleCategory->posts) > 0 )
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          @endif
          </div>


          <div class="span4">
             {{-- Right Sidebar --}}
             @include('userside.right-sidebar')
          </div>
        </div>
      </div>
    </section>

@endsection