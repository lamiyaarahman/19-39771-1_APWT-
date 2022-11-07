<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <form action="{{url('/login')}}" method="post">
        @csrf
    <div class="container">
      <h2 align="center"> Login</h2>
    

    <div class="form-group">
      <label for="">Email</label>
      <input type="email" name="email" id="" class="form-control" value="{{old('email')}}"/>
      <span class="text-danger">
        @error('email')
        {{$message}}
        @enderror
      </span>
     
    </div>

    <div class="form-group">
      <label for="">Password</label>
      <input type="password" name="password" id="" class="form-control" />
      <span class="text-danger">
        @error('password')
        {{$message}}
        @enderror
      </span>
     
    </div>




   

   <button class= "btn btn-primary">
        Submit
    </button>
</div>
</form>
  </body>
</html>

