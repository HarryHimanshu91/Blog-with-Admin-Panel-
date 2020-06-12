@extends('layouts/app')
@section("title",'ewqeqw' )
@section('content')

    <section id="content">
      <div class="container">
        <div class="row">

        @foreach($data as $value)
            @foreach($value->posts as $val)
            <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#"> {{ $val->title }}</a></h3>
                    </div>
                   
                  </div>
                  <p>
                   {!! htmlspecialchars_decode($val->body) !!}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li> <i class="icon-calendar"></i><a href="#">  {{ $val->created_at->diffForHumans() }}</a></li>
                      <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                      <li><i class="icon-folder-open"></i><a href="#"> 
                       <span class="categories"> {{ $val->title }} </span>
                     
                      </a></li>

                      <li><i class="icon-tags"></i><a href="#">
                    
                           <span class="categories"> {{ $val->title }} </span>
                      
                      </a></li>

                    </ul>
                  
                  </div>
                </div>
              </div>
            </article>
           
           
           
           
          </div>
            @endforeach
        @endforeach
         
          <div class="span4">
          
          </div>
        </div>
      </div>
    </section>
@endsection