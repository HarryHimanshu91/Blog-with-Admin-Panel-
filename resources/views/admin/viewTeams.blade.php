@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View Team Details </h3>
              </div>
            
              <div class="col-md-12">
              
            <div class="card">
            @include('admin.messages')

                <div class="row" style="margin-top: 10px; margin-right: 10px;"> 
                    <div class="col-md-12">  
                            <div class="text-right">  
                                <a href="{{ route('team.create') }}" class="btn btn-info" style="color:#fff;"> Add Team </a>
                            </div>
                    </div>

                </div>
  

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="teamPages">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">S.No</th>
                      <th> Name </th>
                      <th> Description </th>
                      <th> Image  </th>
                      <th></th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                   @foreach($teams as $team)
                     <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $team->team_name }}</td> 
                        <td> {{ $team->designation  }}</td> 
                        <td> <img class="imgteams" src="/uploads/ourTeams/{{ $team->image }}"></td> 

<td style="width: 50px;"> <a href="{{ route('team.edit', $team->id )}}" class="colorstyles" title="Edit Team"> <i class="far fa-edit"></i> </a> </td>

<td style="width: 50px;"> 

<form method="post" action="{{ route('team.destroy',$team->id ) }}" style="display:none;" id="delete-form-{{ $team->id }}"> 
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

</form>

    <a href="#" title="Delete Team" onclick="
         if(confirm('Are you sure, You want to delete this?'))
         { 
           event.preventDefault();
           document.getElementById('delete-form-{{ $team->id }}').submit();
         }else
         {
           event.preventDefault();
         }" class="coloreds"><i class="fas fa-trash-alt"></i>  </a>

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