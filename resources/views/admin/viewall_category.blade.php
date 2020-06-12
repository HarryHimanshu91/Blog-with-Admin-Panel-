@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View All  Category </h3>
              </div>
            
              <div class="col-md-12">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="categoryPage">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Category Name </th>
                      <th>Category Slug </th>
                      <th> Status </th>
                      <th> Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($categories)>0)
                    @php $i=1; @endphp
                    @foreach($categories as $key=>$category)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->slug }}</td>
                      @php  $status  = ($category->status==0) ? 'Active' : 'Inactive';  @endphp
                      @php  $class   = ($category->status==0) ? 'btn btn-success btn-sm' : 'btn btn-danger btn-sm';  @endphp
                   
                      <td> <button class="{{$class}}">{{ $status }}</button> </td>

<td style="width: 50px;"> <a href="{{ route('category.edit',$category->id ) }}" class="colorstyles" title="Edit Category"> 
<i class="far fa-edit"></i> </a>  &nbsp;   &nbsp;   &nbsp; 
<!-- </td> -->

<!-- <td style="width: 50px;">  -->

  <form method="post" action="{{ route('category.destroy',$category->id ) }}" style="display:none;" id="delete-form-{{ $category->id }}"> 
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
  
  </form>

      <a href="#" onclick="
           if(confirm('Are you sure, You want to delete this?'))
           { 
             event.preventDefault();
             document.getElementById('delete-form-{{ $category->id }}').submit();
           }else
           {
             event.preventDefault();
           }" class="coloreds" title="Delete Category"><i class="fas fa-trash-alt"></i>  </a>

    </td>


                     
                    </tr>
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