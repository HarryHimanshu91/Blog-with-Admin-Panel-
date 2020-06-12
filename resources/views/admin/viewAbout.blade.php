@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View About Details </h3>
              </div>
            
              <div class="col-md-12">
              
            <div class="card">
            @include('admin.messages')

                <div class="row" style="margin-top: 10px; margin-right: 10px;"> 
                    <div class="col-md-12">  
                            <div class="text-right">  
                                <a href="{{ route('about.create') }}" class="btn btn-info" style="color:#fff;"> Add About Content </a>
                            </div>
                    </div>

                </div>
  

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="aboutPage">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th> About Title </th>
                      <th>About Description </th>
                      <th>About Icons </th>
                      <th> Status </th>
                      <th style="text-align:center;" >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($about)>0)
                    @php $i=1; @endphp
                    @foreach($about as $key=>$about)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $about->title }}</td>
                      <td>{{ $about->description }}</td>
                      <!-- <td>{{ $about->icons }} </td> -->
                      @if($about['icons']=='Briefcase')
                      <td> <i class="fa fa-briefcase iconssbv" aria-hidden="true"></i> </td>
                      @elseif($about['icons']=='Desktop') 
                      <td> <i class="fa fa-desktop iconssbv" aria-hidden="true"></i> </td>
                      @elseif($about['icons']=='Beaker')
                      <td> <i class="fa fa-flask iconssbv" aria-hidden="true"></i> </td>
                      @elseif($about['icons']=='Coffee')
                      <td>  <i class="fa fa-coffee iconssbv" aria-hidden="true"></i> </td>
                      @endif
                    
                     

                      <td style="width: 50px;"> <a href="{{ route('about.edit', $about->id )}}"
                       class="colorstyles" title="Edit About"> <i class="far fa-edit"></i> </a> </td>

                       <td style="width: 50px;"> 

<form method="post" action="{{ route('about.destroy',$about->id ) }}" style="display:none;" id="delete-form-{{ $about->id }}"> 
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
</form>

    <a href="#" onclick="
         if(confirm('Are you sure, You want to delete this?'))
         { 
           event.preventDefault();
           document.getElementById('delete-form-{{ $about->id }}').submit();
         }else
         {
           event.preventDefault();
         }" class="coloreds" title="Delete"><i class="fas fa-trash-alt"></i>  </a>

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