<?php
	date_default_timezone_set('Asia/Bangkok');

	if(isset($_POST["submit_btn"])){
	
		
		$mysqli = new mysqli("localhost","root","","mimi_db");

		if ($mysqli -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}

	
		$texttopic=$_POST["texttopic"];
        $txtdetail01=$_POST["txtdetail01"];
        $txtpostby=$_POST["txtpostby"];
		
		echo $texttopic;
		echo $txtdetail01;
		echo $txtpostby;
		$postdata = "";
		
		
		$sql = "SELECT * FROM webboard ORDER BY q_id desc limit 0, 1";
		$result = $mysqli -> query($sql);
		$q_id = 0;
		while ($row = $result -> fetch_array()) {
			$q_id = (int) $row["q_id"];
			
		}
		
		$q_id = $q_id + 1;
		
        if(isset($_FILES['uploadpic'])){
			$name_file =  $_FILES['uploadpic']['name'];
			$tmp_name =  $_FILES['uploadpic']['tmp_name'];
			$locate_img ="pic/";

			
			$fileName = $name_file;
			$ext = pathinfo($fileName, PATHINFO_EXTENSION);
			
			move_uploaded_file($tmp_name,$locate_img.$q_id. "." . $ext);
			

			
			$file_name=$q_id. "." . $ext;
			

		}		
		
		$postdata = date("d/m/Y:H:i:s");
		
		$sql = "insert into webboard (q_id  ,topic,detail01,file_name,postby,	postdata) values ($q_id, '$texttopic', '$txtdetail01','$file_name', '$txtpostby', '$postdata')";
		if ($result = $mysqli -> query($sql)) {
			echo "<script>alert('insert complete!')</script>";
            echo "<script>window.location.href='webb.php'</script>";
			exit;
		}else{
			echo "error insert";
		}
	}
?>