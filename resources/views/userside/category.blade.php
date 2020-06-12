@extends('layouts/app')
@section("title","Blogs Page")
@section('content')

<section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            @foreach($data->posts as $val)
             <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#"> {{ $val['title'] }}</a></h3>
                    </div>
                  
                  </div>
                  <p>
                  {!! htmlspecialchars_decode($val['body']) !!}
                  </p>
                
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#">  {{ $val['created_at'] }} </a></li>
                      <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                      <li>
                      <li><i class="icon-tasks"></i> 
                         @foreach($val['tags'] as $tag)
                              {{ $tag['name'] }}
                         @endforeach
                      </li>

                      <li><i class="icon-tasks"></i> 
                         @foreach($val['categories'] as $category)
                         <a href="{{ route('postcategory', $category['id'] ) }} ">{{ $category['name'] }}</a>
                         @endforeach
                      </li>
                    </ul>
                    <a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
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
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                 @foreach($categories as $category)
                   <li><i class="icon-angle-right"></i>
                     <a href="{{ route('postcategory', ['id'=> $category->id ]) }} ">{{ $category->name }}</a>
                   </li>
                 @endforeach
                 
                  
                </ul>
              </div>
             
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                
                  @foreach($tags as $tag)
                   <li><i class="icon-angle-right"></i><a href="#">{{ $tag->name }}</a> </li>
                  @endforeach
                </ul>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>

@endsection