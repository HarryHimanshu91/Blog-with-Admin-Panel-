@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View All Tags </h3>
              </div>
            
              <div class="col-md-12">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tagscategory">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tag Name </th>
                      <th>Tag Slug </th>
                      <th> Status </th>
                      <th></th>
                     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($tags)>0)
                    @php $i=1; @endphp
                    @foreach($tags as $key=>$tags)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $tags->name }}</td>
                      <td>{{ $tags->slug }}</td>
                      @php  $status  = ($tags->status==0) ? 'Active' : 'Inactive';  @endphp
                      @php  $class   = ($tags->status==0) ? 'btn btn-success btn-sm' : 'btn btn-danger btn-sm';  @endphp
                      <td> <button class="{{$class}}">{{ $status }}</button> </td>
                      
                      <td style="width: 50px;"> <a href="{{ route('tags.edit',$tags->id ) }}" class="colorstyles" title="Edit Tag"> 
             <i class="far fa-edit"></i> </a> 
             </td>

                <td style="width: 50px;">  
               
                 <form method="post" action="{{ route('tags.destroy',$tags->id ) }}" style="display:none;" id="delete-form-{{ $tags->id }}"> 
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                 
                 </form>

                     <a href="#" onclick="
                          if(confirm('Are you sure, You want to delete this?'))
                          { 
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $tags->id }}').submit();
                          }else
                          {
                            event.preventDefault();
                          }" class="coloreds" title="Delete Tag"><i class="fas fa-trash-alt"></i>  </a>

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