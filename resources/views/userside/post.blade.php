@extends('layouts/app')
@section("title",$posts->title )
@section('content')
<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2> {{ $posts->title }} </h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">{{ $posts->title }}</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#"> </a></h3>
                    </div>
                   
                  </div>
                  <p>
                   {!! htmlspecialchars_decode($posts->body) !!}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <!-- <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li> -->
                      <li> <i class="icon-calendar"></i><a href="#">  {{ $posts->created_at->diffForHumans() }}</a></li>
                      <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                      <li><i class="icon-folder-open"></i><a href="#"> 
                       @foreach($posts->categories as $category)
                           <span class="categories"> {{ $category->name }} </span>
                       @endforeach
                      </a></li>

                      <li><i class="icon-tags"></i><a href="#">
                      @foreach($posts->tags as $tag)
                           <span class="categories"> {{ $tag->name }} </span>
                       @endforeach
                      </a></li>

                    </ul>
                  
                  </div>
                </div>
              </div>
            </article>
           
           
           
           
          </div>
          <div class="span4">
             @include('userside.sidebar')
          </div>
        </div>
      </div>
    </section>
@endsection