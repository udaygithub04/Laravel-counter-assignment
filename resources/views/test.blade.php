<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>

    <input type="number" name="count" value="0" id="count"><br>
    <button id="plus">+</button><button id="sub">-</button>
    
</body>
<script>
    $(document).ready(function(){

        var count = $("#count").val();

        $("#plus").click(function(){
          
          $("#count").val(++count);

          $.ajax({
              url:'count/'+count,
              method:'GET',

              success:function(res){
                 console.log("success");
              }
          });

        });

         $("#sub").click(function(){
          
          var data = $("#count").val(--count);

          $.ajax({
              url:'count/'+count,
              method:'GET',
              data:data,
              success:function(res){
                  console.log("success");
              }
          });
        });

      

    });
</script>
</html>