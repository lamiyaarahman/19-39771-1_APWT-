@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD </h2>
            </div>
            <div class="pull-right">
               
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th width="280px">Action</th>
        </tr>
       
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{$user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>
                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
   
                    
    
                    <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    
                </form>
            </td>
        </tr>
      
    </table>
    @endsection
  
  