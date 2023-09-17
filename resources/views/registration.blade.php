<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <style>
        .error{
            color: red;
        }
     </style>
     <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>Registration Form</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('user-registration')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" name="name" value="{{old('name')}}"  id="name">
                    @if($errors->has('name'))
                    <div class="error">{{$errors->first('name')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="userName">Username</label>
                    <input class="form-control" id="username" type="text" name="userName" value="{{old('userName')}}">
                    @if($errors->has('username'))
                    <div class="error">{{$errors->first('userName')}}</div>
                    @endif 
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" type="text" name="email" value="{{old('email')}}"> 
                    @if($errors->has('email'))
                    <div class="error">{{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password" value="{{old('password')}}"> 
                    @if($errors->has('password'))
                    <div class="error">{{$errors->first('password')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" id="submit">Register</button>
                    <a href="{{url('login')}}" class="btn btn-danger">Back</a>
                </div>
            </form>
            
        </div>
    </div>
</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>   
 <script>

    $("#submit").click(function(){

        var data = {
           'name':$("#name").val(),
           'user_name':$("#username").val(),
           'email':$("#email").val(),
           'password':$("#password").val(),

        };
        

        $.ajax({
            url:'user-registration',
            method:'POST',
            data:data,
            success:function(result){
              alert("success");
            }

        });
    });
 </script>


</body>
</html>