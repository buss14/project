<?php 
session_start();

if($_SESSION['id'] == ""){
    header("location: signin.php");
}else{
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>topic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav  class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
        <a  href="web.php" class="navbar-brand">Welcome <br> <?php echo $_SESSION['fullname']; ?></a>
        <div id="navbar1" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">    
        <li class="nav-item">   
            <a href="webb.php"  class="nav-link">หน้าหลัก</a>
            </li>
            <li class="nav-item">   
            <a href="topic.php" class="nav-link">ตั้งกระทู้</a>
            </li>
            <li class="nav-item">   
            <a href="logout.php"  class="nav-link">ออกจากระบบ</a>
            </li>
            </ul>

        </div>

        </div>
    </nav>
    <?php
}

?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <style type="text/css">
		body{
			font-family: 'Itim', cursive;
		}
	</style>

     <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="bg-white p-5 rounded-5 shadow">
         <div class ="text-center"><i class="fa-solid fa-hippo fa-3x"></i></div> 
        <h1 class="text-center fs-2 fw-bold">ตั้งกระทู้</h1>
       <form action="posttopic.php" method="post" enctype="multipart/form-data"  >
        <table>
            <tr>
                <td> หัวข้อ</td>
                <td><input type=text name="texttopic" require ></td>
            </tr>
            <tr>
                <td>รายละเอียด</td>
                <td><textarea name="txtdetail01" rows = "10" cols="50" ></textarea></td>
            </tr>
            <tr>
                <td>อัพโหลดรูปภาพ</td>
                <td><input type=file name="uploadpic"  accept="image/*"></td>
            </tr>
            <tr>
                <td>โพสโดย</td>
                <td><input type=text name="txtpostby"></td>
            </tr>
           
            <tr>
                
                <td></td>
                <br>
                <td> <button type="submit" name="submit_btn" class="btn btn-success">บันทึก</button></td>
            </tr>



        </table>

       </form>
</body>
</html>


