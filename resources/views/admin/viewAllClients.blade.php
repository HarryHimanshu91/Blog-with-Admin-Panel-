@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View All Clients </h3>
              </div>
              @include('admin.messages')
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
             
              <div class="row"> 
                 <div class="col-md-12">  
                    <div class="text-right">  
                        <a href="{{ route('clients.create') }}" class="btn btn-info" style="color:#fff;"> Add Clients </a>
                    </div>
                  </div>

              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-bordered" id="clientPage">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">S.No</th>
                      <th style="width: 35%;">Clients Image </th>
                      <th></th>
                      <th>Action</th>
                     
                     
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                    @foreach( $clients  as $client)
                        <tr>
                            <td> {{ $i++ }} </td>
                            <td> <img src="/uploads/Clients/{{ $client->image }}" style="width:30%"></td>

    <td style="width: 50px;"> <a href="{{ route('clients.edit', $client->id ) }}" class="colorstyles" title="Edit Clients"> <i class="far fa-edit"></i> </a> </td>
    <td style="width: 50px;"> 

    <form method="post" action="{{ route('clients.destroy',$client->id ) }}" style="display:none;" id="delete-form-{{ $client->id }}"> 
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                 
    </form>

    <a href="#" onclick="
                          if(confirm('Are you sure, You want to delete this?'))
                          { 
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $client->id }}').submit();
                          }else
                          {
                            event.preventDefault();
                          }" class="coloreds" title="Delete Clients"><i class="fas fa-trash-alt"></i>  </a>

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