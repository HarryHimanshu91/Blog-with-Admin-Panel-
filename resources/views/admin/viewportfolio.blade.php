@extends('layouts.master_layout')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> View All Portfolio </h3>
              </div>
            
              <div class="col-md-12">
            <div class="card-header">
                <div class="row" style="margin-top:15px;"> 
                
                  <div class="col-md-12">  
                     <div class="text-right"> 
                          <a href="{{ route('addPortfolio') }}" class="btn btn-info" style="color:#fff;"> Add Portfolio </a> 
                     </div>
                  </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="PortfolioPage">
                  <thead>      
                      <tr>
                            <th style="width: 10px">S.no</th>
                            <th style="width: 250px">Portfolio Name </th>
                            <th style="width: 250px">Portfolio Image </th>
                            <th style="width: 250px">Portfolio Category </th>
                            <th></th>
                           
                            <th>Action</th>
                         </tr>
                  
                  </thead>
                  <tbody>  
                  @php  $i=1; @endphp
                  @foreach($portfolio as $portfolio)
                 
                        <tr>
                            <td> {{ $i++ }}</td>
                            <td> {{ $portfolio->title  }}</td>
                            <td> <img style="width:10%" src="/uploads/portfolio/{{ $portfolio->image  }} "></td>
                            <td> {{ $portfolio->categoryname['name'] }}</td>
                             <td style="width: 50px;"> <a href="{{ route('editPortfolio',[ 'id' => $portfolio->id ]  )}}" 
                             class="colorstyles" title="Edit Portfolio"> <i class="far fa-edit"></i> </a> </td>

                             <td style="width: 50px;"> 

<form method="post" action="{{ route('deletePortfolio',$portfolio->id ) }}" style="display:none;" id="delete-form-{{ $portfolio->id }}"> 
  {{ csrf_field() }}
  

</form>

    <a href="#" title="Delete Portfolio" onclick="
         if(confirm('Are you sure, You want to delete this?'))
         { 
           event.preventDefault();
           document.getElementById('delete-form-{{ $portfolio->id }}').submit();
         }else
         {
           event.preventDefault();
         }" class="coloreds" title="Delete Category"><i class="fas fa-trash-alt"></i>  </a>

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