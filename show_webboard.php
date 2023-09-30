<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
<link rel="stylesheet" href="stylee.css">
<style type="text/css">
		body{
			font-family: 'Itim', cursive;
            

		}
	</style>
</head>
<body>
<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
      <div class="container">
        <h>
        <br>
        <?php
        
        $q_id = $_GET["q_id"];
        $mysqli = new mysqli("localhost","root","","mimi_db");

        if ($mysqli -> connect_errno){
        echo "Failed to MYSQL: " . $mysqli -> connect_error;
        exit();
        }
        $sql = "SELECT * FROM webboard WHERE q_id='$q_id' ORDER BY q_id ";
        if($result = $mysqli -> query($sql)){

    while ($row = $result -> fetch_array()){
        $q_id = $row["q_id"];
        $topic = $row["topic"];
        $detail01 = $row["detail01"];
        $file_name =$row["file_name"];
        $postby = $row["postby"];
        $postdata = $row["postdata"];

        $detail01 = nl2br($detail01);
       
        echo "id: $q_id";
        echo "<br>topic: $topic";
        echo "<br>detail: $detail01";
        
        if($file_name != ""){
            $file_name_path = "pic\\" . $file_name;
            echo "<br><img src=\"$file_name_path\">";
        }
        echo "<br>post by: $postby";
        echo "<br>post data: $postdata";
    }
}
?>
      </div>
    </div>
    </body>
</html>
      

    <br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleee.css">
    
</head>
<body >
<style>
        p{
            text-align: end;
        }
    </style>

<div class="h-100 p-5 bg-light border rounded-3">
          
        <div class="containerr">
            <h>
            <?php
        $sql = "SELECT * FROM answer WHERE q_id='$q_id' ORDER BY q_id,a_id ";
        if($result = $mysqli -> query($sql)){

    while ($row = $result -> fetch_array()){
        $q_id_2 = $row["q_id"];
        $detail01_2 = $row["detail"];
        $postby_2 = $row["postby"];
        $postdata_2 = $row["postdate"];

        $detail01_2 = nl2br($detail01_2);
        echo "<br><br>แสดงความคิดเห็น";
        echo "<br>detail: $detail01_2";
        echo "<br>post by: $postby_2";
        echo "<br>post data: $postdata_2";

    }
}
?>
        <div class="d.flex justify-content-center align-items-center ">
        <h1>แสดงความคิดเห็น</h1>
        <form action="answer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="q_id" value="<?php echo $q_id; ?>">
        <table>
        <tr>
            <td>รายละเอียด</td>
            <td> <textarea name="txtdetail01" rows="3" cols="30"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" name="txtpostby"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="submit_btn" value="บันทึก"></td>
        </tr>


        </table>


        </form>
        <a href="webb.php"><h3>รายการเว็บบอร์ด</h3></a>

        </div>
        </h>
    </div>


            </h>
        </div>

        

        </div>
    </body>
    </html>



