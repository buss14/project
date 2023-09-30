<?php
    
	$q_id = $_POST["q_id"];
	
	//echo "$q_id";
	
	date_default_timezone_set('Asia/Bangkok');
	//print_r($_POST);
    //if(isset($_POST["submit"])){
	if(isset($_POST["submit_btn"])){
		
        
		
		//
		//echo "submit";
		
		$mysqli = new mysqli("localhost","root","","phisit_db");

		if ($mysqli -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}

		//$sql = "SELECT * FROM employee ORDER BY employee_id ";
		//$txttopic = $_POST["txttopic"];
		$txtdetail01 = $_POST["txtdetail01"];
		$txtpostby = $_POST["txtpostby"];
		$txtyoutube_url = $_POST["txtyoutube_url"];
		
		//echo $txttopic;
		echo $txtdetail01;
		echo $txtpostby;
		$postdate = "";
		//exit; 
		
		$sql = "SELECT * FROM wb_answer where q_id='$q_id' ORDER BY q_id,a_id desc limit 0, 1";
		$result = $mysqli -> query($sql);
		//$q_id = 0;
		$a_id = 0;
		while ($row = $result -> fetch_array()) {
			//$q_id = (int) $row["q_id"];
			$a_id = (int) $row["a_id"];
			//echo $q_id;
		}
		
		//$q_id = $q_id + 1;
		$a_id = $a_id + 1;
		
		//exit;
		
		if(isset($_FILES['uploadpic'])){
			$name_file =  $_FILES['uploadpic']['name'];
			$tmp_name =  $_FILES['uploadpic']['tmp_name'];
			$locate_img ="pic/";
			//move_uploaded_file($tmp_name,$locate_img.$name_file);
			
			$fileName = $name_file;
			$ext = pathinfo($fileName, PATHINFO_EXTENSION);
			
			move_uploaded_file($tmp_name,$locate_img.$q_id. "_" . $a_id . "." . $ext);
			
			//$image_pic_path = $locate_img.$name_file;
			
			if($name_file == ""){
				$file_name = "";
			}else{
				$file_name=$q_id. "_" . $a_id . "." . $ext;
			}
			
			
			
			//echo "<img src=\"$image_pic_path\">";
			
			//echo "upload เรียบร้อย";
		}		
		
		$postdate = date("Y-m-d H:i:s");
		
		$sql = "insert into wb_answer (a_id, q_id ,detail01,file_name,youtube_url,postby,postdate) values ($a_id, $q_id, '$txtdetail01','$file_name','$txtyoutube_url', '$txtpostby', '$postdate')";
		if ($result = $mysqli -> query($sql)) {
			echo "<br>insert complete<br>";
			echo "<a href=\"show_webboard.php?q_id=$q_id\">แสดงรายการที่บันทึก</a>";
			exit;
		}else{
			echo "error insert " . $mysqli -> error;
			exit;
		}

		//if ($result = $mysqli -> query($sql)) {
		//  echo "<table border='1'>";
		//  while ($row = $result -> fetch_array()) {	  
		//	echo "<tr>";
		//	echo "<td>" . $row["employee_id"] . "</td>";
		//	echo "<td>" . $row["first_name"] . "</td>";
		//	echo "<td>" . $row["last_name"] . "</td>";
		//	echo "</tr>";
		//  }
		//  echo "</table>";
		//  $result -> free_result();
		//}

		$mysqli -> close();
		
		
		
		exit;
	}else{
		echo "no submit";
		exit;
	}
?>