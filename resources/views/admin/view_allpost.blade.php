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
            
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Posts </h3>
                @include('admin.messages')
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-bordered" id="posttable">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">S.No</th>
                      <th>Post Title </th>
                      <th>Post SubTitle </th>
                      <th>Post Slug </th>
                      <th>Post Body </th>
                      <th> Status </th>
                      <th> </th> <th> </th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($post)>0)
                    @php $i=1; @endphp
                    @foreach($post as $key=>$post)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->subtitle }}</td>
                      <td>{{ $post->slug }}</td>
                      <td>{{ substr($post->body ,0,150 ) }}</td>
                      @php  $status  = ($post->status==1) ? 'Active' : 'Inactive';  @endphp
                      @php  $class   = ($post->status==1) ? 'btn btn-success btn-sm' : 'btn btn-danger btn-sm';  @endphp
                      <td> <button class="{{$class}}">{{ $status }}</button> </td>

             <td style="width: 50px;"> <a href="{{ route('post.edit',$post->id ) }}" class="colorstyles" title="Edit Category"> 
             <i class="far fa-edit"></i> </a> </td>

               <td style="width: 50px;"> 
               
                 <form method="post" action="{{ route('post.destroy',$post->id ) }}" style="display:none;" id="delete-form-{{ $post->id }}"> 
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                 
                 </form>

                     <a href="#" onclick="
                          if(confirm('Are you sure, You want to delete this?'))
                          { 
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $post->id }}').submit();
                          }else
                          {
                            event.preventDefault();
                          }" class="coloreds" title="Delete Category"><i class="fas fa-trash-alt"></i>  </a>

                   </td>
            
       <td style="width: 50px;">
       @if($post->status ==0)
       <a data-toggle="modal" data-target="#myModal_{{ $post->id }}" class="colorstyles" title="Activate Post"> 
         <i  style="color:green;" class="fas fa-power-off"></i> 
        </a>
        @else
        <a data-toggle="modal" data-target="#myModal_{{ $post->id }}" class="colorstyles" title="Deactive Post"> 
         <i  style="color:red;" class="fas fa-power-off"></i> 
        </a>
       @endif
        
        </td>
                   
                   <!-------------------modal starts here--------------->
                   <div id="myModal_{{ $post->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-body">
                                @if($post->status==0)
                                  <h5> Are You Sure? You want to Activate this post ? <br> Click 
                                  <a style="color: green;font-weight: bold;" href="{{ route('activatePost', ['id' =>$post->id ] ) }}"> Yes </a> to Continue  </h5> 
                                @else
                                  <h5> Are You Sure? You want to Deactivate this post ? <br> Click 
                                  <a style="color: red;font-weight: bold;" href="{{ route('post.show', $post->id ) }}"> Yes </a> to Continue  </h5> 
                                @endif
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>
                   <!-----------------Modal ends here------------------>
                    </tr>
                    @endforeach
                  @endif
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