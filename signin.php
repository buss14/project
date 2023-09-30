<?php 
session_start();
include_once('function.php');

$userdata = new DB_con();
   if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = $userdata->signin($username,$password);
    $num = mysqli_fetch_array($result);

    if($num > 0){
      $_SESSION['id'] = $num['id'];
      $_SESSION['fullname'] = $num['fullname'];
      echo "<script>alert('Login Successfull!')</script>";
      echo "<script>window.location.href='webb.php'</script>";
    }else{
      echo "<script>alert('Something went wrong! Please try again.')</script>";
      echo "<script>window.location.href='signin.php'</script>";
      
    }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

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
        <h1 class="text-center fs-2 fw-bold">Login Page</h1>
        <div class="input-group mt-4">
          <div class ="input-group-text bg-onfo"><i class="fa-regular fa-user" style="color: #63789c;"></i></div>
          <input type="text" class="form-control" id="username" name="username" placeholder="username">
          <span id="usernameavailable"></span>
        </div>

        <div class="input-group mt-4">
          <div class ="input-group-text bg-onfo"><i class="fa-solid fa-unlock" style="color: #63789c;"></i></div>
          <input type="password" class="form-control" id="password" name="password" placeholder="password" >
        </div>
        <br>
        <button type="submit" name="login" class="btn btn-success">Login</button>
         <a href="index.php"  class="btn btn-primary">Register</a>
        </div>
        
        <hr>
        </form></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>




