@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View All Posts </h3>
              </div>
              @include('admin.messages')
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <div class="row"> 
              
                  <div class="col-md-12">  
                    <div class="text-right"> 
                         <a href="{{ route('slider.create') }}" class="btn btn-info" style="color:#fff;"> Add Slider </a>
                    </div>
                </div>

              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-bordered" id="sliderPage">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">S.No</th>
                      <th> Title </th>
                      <th> Description  </th>
                      <th> Image </th>
                      <th> </th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   <tbody>
                   @php $i=1; @endphp
                    @foreach( $sliders  as $slider)
                        <tr>
                            <td> {{ $i++ }} </td>
                            <td> {{ $slider->title }}</td>
                            <td> {{ $slider->description }}</td>
                            <td> <img src="/uploads/Banners/{{ $slider->image }}" style="width:20%"></td>
                            <td style="width: 50px;"> <a href="{{ route('slider.edit' , $slider->id ) }}"
                       class="colorstyles" title="Edit Slider"> <i class="far fa-edit"></i> </a> </td>

                       <td style="width: 50px;"> 

<form method="post" action="{{ route('slider.destroy',$slider->id ) }}" style="display:none;" id="delete-form-{{ $slider->id }}"> 
{{ csrf_field() }}
{{ method_field('DELETE') }}
</form>

    <a href="#"  onclick="
         if(confirm('Are you sure, You want to delete this?'))
         { 
           event.preventDefault();
           document.getElementById('delete-form-{{ $slider->id }}').submit();
         }else
         {
           event.preventDefault();
         }" class="coloreds" title="Delete Slider"><i class="fas fa-trash-alt"></i>  </a>

  </td>
                           
                        </tr>
                   @endforeach
                   </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
         

           
          </div>
             
            </div>
           
    </div>
  </div>      
        
</div> 



      <!-- /.container-fluid -->
@endsection