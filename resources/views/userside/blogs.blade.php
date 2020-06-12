@extends('layouts/app')
@section("title","Blogs Page")
@section('content')

<section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            
            @foreach($post as $post)
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="{{ route('singleBlog',['id'=> $post->id ]) }}"> {{ $post->title }}</a></h3>
                    </div>
                  
                  </div>
                  <p>
                  {!! htmlspecialchars_decode(Str::words($post->body ,70 )) !!}
                  </p>
                
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#">  {{ $post->created_at->diffForHumans() }} </a></li>
                      <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                      @foreach($post->categories as $val)
                      <li><i class="icon-tasks"></i><a href="{{ route('postcategory', ['id'=> $val->id ]) }} "> {{ $val->name }} </a> </li>
                      @endforeach
                       

                   <li> <i class="icon-tag" aria-hidden="true"></i>
                    @foreach($post->tags as $val)
                    <a href="{{ route('postTag', ['id'=> $val->id ]) }}"> <span class="tagscss"> {{ $val->name }} </span>  </a> 
                    @endforeach
                  </li>
 

                    </ul>
                    <a href="{{ route('singleBlog',['id'=> $post->id ]) }}" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                  </div>
                </div>
              </div>
            </article>
            @endforeach()
          
           
           
            
          
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>


          <div class="span4">
             {{-- Right Sidebar --}}
             @include('userside.right-sidebar')
          </div>
        </div>
      </div>
    </section>

@endsection