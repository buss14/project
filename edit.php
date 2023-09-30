<form action="edit.t.php" method="post" enctype="multipart/form-data">
<?php
     
     $q_id = $_GET["q_id"];
     $topic = "" ;
     $postby= "" ;
     $postdata= "" ;
?>
<?php
$mysqli = new mysqli("localhost","root","","mimi_db");

if( $mysqli -> connect_errno){
    echo "Faild to connect to MySQL:" .$mysqli -> connect_error;
    exit();
   
}

$sql = "SELECT * FROM webboard WHERE q_id='$q_id' ORDER BY q_id";

if($result = $mysqli->query($sql)) {
    while ($row = $result-> fetch_array()) {
        $topic= $row["topic"];
        $detail01= $row["detail01"];
        $postby= $row["postby"];
        $postdata= $row["postdata"];
        $file_name=$row["file_name"];
    }
    $result -> free_result();

}

?>
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

     <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="bg-white p-5 rounded-5 shadow">
         <div class ="text-center"><i class="fa-solid fa-hippo fa-3x"></i></div> 
        <h1 class="text-center fs-2 fw-bold">แก้ไขกระทู้</h1>
       <form action="posttopic.php" method="post" enctype="multipart/form-data"  >
        <input type="hidden" name="q_id" value="<?php echo $q_id; ?>">
        <table>
            <tr>
                <td> หัวข้อ</td>
                <td><input type=text name="texttopic" require  value="<?php echo "$topic";?>"></td>
            </tr>
            <tr>
                <td>รายละเอียด</td>
                <td><textarea name="txtdetail01" rows = "10" cols="50" value="<?php echo "$detail01";?>" ><?php echo $detail01 ; ?></textarea></td>
            </tr>
            <tr>
                <td>อัพโหลดรูปภาพ</td>
                <td><input type=file name="uploadpic"  accept="image/*" value="<?php echo "$file_name";?>"></td> 
            </tr>
            <tr>
                <td>โพสโดย</td>
                <td><input type=text name="txtpostby" value="<?php echo "$postby";?>"></td>
            </tr>
           
            <tr>
                
                <td></td>
                <br>
                <td> <button type="submit" name="submit_btn" class="btn btn-success">Updete</button></td>
            </tr>



        </table>

       </form>
</body>
</html>





</form>
