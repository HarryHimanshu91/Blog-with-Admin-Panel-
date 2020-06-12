@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit New Portfolio </h3>
              </div>
              <!-- /.card-header -->
              @include('admin.messages')
              <!-- form start -->
              <form role="form" method="post" action="{{ route('updatePortfolio', $portfolio->id ) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="category">Portfolio Title </label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Portfolio Title" value="{{ $portfolio->title}}">
                  </div>

                  <div class="form-group">
                      <label for="category">Portfolio Image </label>
                      <input type="file" name="image" class="form-control">
                      <img style="width:10%" src="/uploads/portfolio/{{ $portfolio->image  }} ">
                  </div>

                  <div class="form-group">
                    <label for="category"> Select Category </label>
                    <select name="category"  id="category" class="form-control">
                     <option value=""> Select Category </option>
                     @foreach($PortfolioCategory as $category)
                       <option value="{{ $category->id  }}" {{ $category->id == $portfolio->category  ? 'selected' : ''}} >{{ $category->name  }} </option>
                     @endforeach
                     
                    </select>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </div>
  </div>      
        
</div> 
      <!-- /.container-fluid -->
@endsection