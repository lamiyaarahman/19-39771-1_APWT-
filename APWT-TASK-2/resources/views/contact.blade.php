<!doctype html>
<html lang="en">
  <head>
    <title>Contact Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <form action="{{url('/contact')}}" method="post">
        @csrf
    <div class="container">
      <h2 align="center">Contact Form </h2>
  

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
      <label for="">Phone</label>
      <input type="text" name="phone" id="" class="form-control" />
      <span class="text-danger">
        @error('phone')
        {{$message}}
        @enderror
      </span>
     
    </div>

    <div class="form-group">
      <label for="">Date Of Birth</label>
      <input type="text" name="dob" id="" class="form-control" />
      <span class="text-danger">
        @error('dob')
        {{$message}}
        @enderror
      </span>
      
    </div>

    <div class="form-group">
      <label for="">Department</label><br>
      
      <select name="department">
              <option>Choose Your Department</option>
							<option>Faculty of Science and Technology</option>
							<option>Faculty of Engineering</option>
							<option>Faculty of Business Administration</option>
              <option>Faculty of Arts and Social Sciences</option>
						</select>
      
    </div>


    <div class="form-group">
      <label for="">Gender</label><br>
      <input type="radio" value="M" name="gender" id="" >Male <br>
      <input type="radio" value="F" name="gender" id=""  >Female<br>
      <input type="radio" value="O" name="gender" id=""  >Other<br>
      <span class="text-danger">
        @error('gender')
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

