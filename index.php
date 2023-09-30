<?php 

include_once('function.php');

$userdata = new DB_con();

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $useremail = $_POST['email'];
    $passeword = md5($_POST['password']);

    $sql = $userdata->registration($fullname,$username,$useremail,$passeword);

    if($sql){
        echo "<script>alert('Register Successfull!')</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }else{
        echo "<script>alert('Something went wrong! Please try again. Successfull!')</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisetr Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-image: radial-gradient(circle, #d6d4e8, #babcd5, #9ea4c1, #818eaf, #63789c);">
<form method = "post">
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="bg-white p-5 rounded-5 shadow">
         <div class ="text-center"><i class="fa-solid fa-circle-user fa-3x "></i></div>
        <h1 class="text-center fs-2 fw-bold">Regisetr Page</h1>
        <div class="input-group mt-4">
          <div class ="input-group-text bg-onfo"><i class="fa-regular fa-user" style="color: #63789c;"></i></div>
          <input type="text" class="form-control" id="username" name="fullname"placeholder="fullname"  >
          <span id="usernameavailable"></span>
        </div>

        <div class="input-group mt-4">
          <div class ="input-group-text bg-onfo"><i class="fa-solid fa-unlock" style="color: #63789c;"></i></div>
          <input type="text" class="form-control" id="username" name="username" placeholder="username" onblur="checkusername(this.value)"  >
          <span id="usernameavailable"></span>
        </div>

        <div class="input-group mt-4">
          <div class ="input-group-text bg-onfo"><i class="fa-solid fa-unlock" style="color: #63789c;"></i></div>
          <input type="email" class="form-control" id="email" name="email"placeholder="email" >
        </div>

        <div class="input-group mt-4">
          <div class ="input-group-text bg-onfo"><i class="fa-solid fa-unlock" style="color: #63789c;"></i></div>
          <input type="password" class="form-control" id="password" name="password" placeholder="password" >
        </div>
        <br>
        <button type="submit" name="submit" id="submit" class="btn btn-success">Register</button>
        </div>
    
</form></div>




<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
     function checkusername(val){
        $.ajax({
            type: 'POST',
            url:  'checkuser_available.php',
            data: 'username='+val,
            success: function(data){
            $('#usernameavailable').html(data);
            }
        })

     }



</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>




