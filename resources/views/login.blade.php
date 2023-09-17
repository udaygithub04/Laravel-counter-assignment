<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .error{
            color: red;
        }
     </style>
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('user-login')}}" method="POST">
                @csrf

                
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" value="{{old('email')}}"> 
                    @if($errors->has('email'))
                    <div class="error">{{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" value="{{old('password')}}"> 
                    @if($errors->has('password'))
                    <div class="error">{{$errors->first('password')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">login</button>
                    <a href="{{url('user-registration')}}" class="btn btn-danger">register</a>
                </div>
                <p>{{$id}}</p>
            </form>
            @if(session('message'))
            <div class="text-danger text-center">{{session('message')}}</div>
            @endif
        </div>
    </div>
</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>   
</body>
</html>