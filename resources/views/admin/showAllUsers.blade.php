@extends('layouts.master_layout')
@section('title','Admin Dashboard')




@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View Users Details </h3>
              </div>
            
              <div class="col-md-12">
              
            <div class="card">
            @include('admin.messages')

              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th> User Name </th>
                      <th> User Email </th>
                      <th> User Image </th>
                     
                    
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($users)>0)
                    @php $i=1; @endphp
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                       @if($user->avatar)
                           <td><img class="uIMagess" src="/uploads/UserProfile/{{ $user->avatar }}"> </td>
                        @else
                           <td><img class="uIMagess" src="/uploads/dummyuser.png"> </td>
                        @endif
                       

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