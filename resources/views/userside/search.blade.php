@extends('layouts/app')
@section("title","Blogs Page")
@section('content')

<section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            
            @if(count($post) > 0 )
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
                            @foreach($post->categories as $val)
                            <li><i class="icon-angle-right"></i><a href="{{ route('postcategory', ['id'=> $val->id ]) }} "> {{ $val->name }} </a> </li>
                            @endforeach
                           
                            @foreach($post->tags as $val)
                            <li><i class="icon-angle-right"></i> <a href="{{ route('postTag', ['id'=> $val->id ]) }}">{{ $val->name }} </a> </li>
                            @endforeach
                            

                            </ul>
                        
                        </div>
                        </div>
                    </div>
                </article>
                @endforeach()
            @else
                <div class="alert alert-error">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>Opppps!</strong> No Record Found
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