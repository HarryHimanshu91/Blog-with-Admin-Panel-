@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit Post </h3>
              </div>
              <!-- /.card-header -->

                 @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('post.update', $post->id ) }}" >
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row" style="padding: 15px;">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category">Post Title </label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                  </div>
                  <div class="form-group">
                    <label for="category">Post Sub Title </label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $post->subtitle }}" placeholder="Enter Post Sub Title">
                  </div>
                  <div class="form-group">
                    <label for="category">Post Slug </label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}" placeholder="Enter Post Slug">
                  </div>

                  <div class="form-group">
                    <label for="category">Post Description </label>
                    <textarea id="editor1" class="form-control" name="body">{{ $post->body }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="category">Post Image </label>
                    <input type="file" class="form-control" id="image" name="image">
                  </div>
                 

                </div>
                <!-- /.card-body -->
                <div class="col-md-6"> 
                <div class="form-group">
                  <label>Select Category</label>
                  <select class="select2 select2-hidden-accessible" name="categories[]" multiple="" data-placeholder="Select Category" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                   @foreach($categories as $categories)
                    <option value="{{ $categories->id }}"
                      
                    @foreach($post->categories as $postCategories)
                          @if( $postCategories->id == $categories->id )
                            selected                         
                          @endif
                      @endforeach

                    > {{ $categories->name }} </option>
                   @endforeach
                  </select>
                 
                </div>

                <div class="form-group">
                  <label>Select Tags</label>
                  <select class="select2 select2-hidden-accessible" name="tags[]" multiple="" data-placeholder="Select Tags" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                  @foreach($tags as $tags)
                    <option value="{{ $tags->id }}"
                     
                      @foreach($post->tags as $postTags)
                          @if( $postTags->id == $tags->id )
                            selected                         
                          @endif
                      @endforeach
                    
                    
                    > {{ $tags->name }} </option>
                   @endforeach
                  </select>
                 
                </div>

                
                </div>
            </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </div>
  </div>      
        
</div> 
      <!-- /.container-fluid -->
@endsection