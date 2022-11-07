@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>DashBoard</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
<body>
    <h2>Welcome to  User Dashboard</h2>
  
 
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
           
        </tr>

        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td><a class="btn btn-success" href="{{ route('user.edit',$user->id) }}">Edit</a></td>
</tr>

            
</table>
</body>
</html>
@endsection

