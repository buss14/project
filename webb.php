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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .center{
            display:flex;
            align-item:center;
            justify-content:center;
            height: 50px ;

        }
    </style>
</head>
<body>

    <nav  class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
        <a  href="web.php" class="navbar-brand">Welcome <br> <?php echo $_SESSION['fullname']; ?></a>
        <div id="navbar1" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">    
        <li class="nav-item">   
            <a href="web.php"  class="nav-link">หน้าหลัก</a>
            </li>
            <li class="nav-item">   
            <a href="webb.php" class="nav-link">หน้าของฉัน</a>
            </li>
            <li class="nav-item">   
            <a href="logout.php"  class="nav-link">ออกจากระบบ</a>
            </li>
            </ul>

        </div>

        </div>
    </nav>
    <section id="img">
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item carousel-image active">
                    <div class="contaioner">
                    <div class="carousel-caption">
                        <h1 class="display">ประเพณีวัฒนธรรมภาคอีสาน</h1>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </section>
    <?php
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <style type="text/css">
		body{
			font-family: 'Itim', cursive;
		}
	</style>
</head>
<body>
<br>



<div class="bg-light border rounded-1">
<br><br>
  <div class="center">
  <br>
  <table border='1' width='50%' center='100%'>
   
   <tr>
   <br>
   <th><h6 class="border-bottom pb-2 mb-0">ลำดับ</h6></th>
   <th><h6 class="border-bottom pb-2 mb-0">หัวข้อ</h6></th>
   <th><h6 class="border-bottom pb-2 mb-0">โพสโดย</h6></th>
   <th><h6 class="border-bottom pb-2 mb-0">โพสวันที่</h6></th>
   <th><h6 class="border-bottom pb-2 mb-0"><a href="topic.php">เพิ่มข้อมูล</a></h6></th>
   <br>
   </tr>

   
   


<?php

$mysqli = new mysqli("localhost","root","","mimi_db");


if ($mysqli -> connect_errno){
echo "Failed to MYSQL: " . $mysqli -> connect_error;
exit();
}
$sql = "SELECT * FROM webboard ORDER BY q_id ";


if($result = $mysqli -> query($sql)){
while ($row = $result -> fetch_array()){
  echo "<tr>"; 

  $q_id = $row["q_id"];

  echo"<td>" .$row["q_id"]."</td>";
  echo "<td><a href=\"show_webboard.php?q_id=$q_id\">" . $row["topic"] . "</a></td>";
  echo"<td>" .$row["postby"]."</td>";
  echo"<td>" .$row["postdata"]."</td>";
  echo "<td><a href=\"edit.php?q_id=$q_id\">Edit</a></td>";
  echo "<td><font color=red><a href=\"delete.php?q_id=$q_id\"
  onclick=\"return confirm('Are you sure?')\" style=\"color: red;\">Delete</a></font></td>";
  

echo "</tr>";
  
}


$result -> free_result();


}


$mysqli -> close();


?>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</table>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
  
</body>
</html>


    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>


