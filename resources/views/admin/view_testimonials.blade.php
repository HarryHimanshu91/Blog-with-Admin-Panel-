@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View All Testimonials </h3>
              </div>
            
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
             
              <div class="row"> 
                 <div class="col-md-12">  
                    <div class="text-right">  
                        <a href="{{ route('addTestimonial') }}" class="btn btn-info" style="color:#fff;"> Add Testimonials </a>
                    </div>
                  </div>

              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-bordered" id="testimonialPage">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">S.No</th>
                      <th style="width: 35%;">Testimonials Body </th>
                      <th>Author Name </th>
                      <th>Author Meta </th>
                      <th>Author Image </th>
                      <th></th>
                      <th>Action</th>
                      <!-- <th colspan="3" style="text-align:center;" >Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($Testimonial)>0)
                    @php $i=1; @endphp
                    @foreach($Testimonial as $key=>$Testimonial)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $Testimonial->description }}</td>
                      <td>{{ $Testimonial->author_name }}</td>
                      <td>{{ $Testimonial->author_meta }}</td>
                      <td> <img src="/uploads/{{ $Testimonial->author_image }}" style="width:20%;"></td>
                      <td style="width: 50px;"> <a href="{{ route('editTestimonial',[ 'id' => $Testimonial->id ]  )}}"
                       class="colorstyles" title="Edit Testimonial"> <i class="far fa-edit"></i> </a> </td>

                       <td style="width: 50px;"> 

<form method="post" action="{{ route('deleteTestimonial',$Testimonial->id ) }}" style="display:none;" id="delete-form-{{ $Testimonial->id }}"> 
  {{ csrf_field() }}
  
</form>

    <a href="#" title="Delete Testimonial" onclick="
         if(confirm('Are you sure, You want to delete this?'))
         { 
           event.preventDefault();
           document.getElementById('delete-form-{{ $Testimonial->id }}').submit();
         }else
         {
           event.preventDefault();
         }" class="coloreds" title="Delete Category"><i class="fas fa-trash-alt"></i>  </a>

  </td>
          


                  @endforeach
                  @endif
                   
                    
 
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