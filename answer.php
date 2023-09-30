<?php
    
	$q_id = $_POST["q_id"];

	if(isset($_POST["submit_btn"])){

		$mysqli = new mysqli("localhost","root","","mimi_db");

		if ($mysqli -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}
		$txtdetail01 = $_POST["txtdetail01"];
		$txtpostby = $_POST["txtpostby"];
		
		echo $txtdetail01;
		echo $txtpostby;
		$postdate = "";
		
		
		$sql = "SELECT * FROM answer  ORDER BY q_id,a_id desc limit 0, 1";
		$result = $mysqli -> query($sql);
	
		$a_id = 0;
		while ($row = $result -> fetch_array()) {
			$a_id = (int) $row["a_id"];
	
		}
	
		$a_id = $a_id + 1;
		}		
		
		$postdate = date("Y-m-d H:i:s");

		$sql = "insert into answer (a_id, q_id ,detail,postby,postdate) values ($a_id, $q_id, '$txtdetail01','$txtpostby', '$postdate')";
		if ($result = $mysqli -> query($sql)) {
			echo "<script>alert('insert complete!')</script>";
			echo "<script>window.location.href='show_webboard.php?q_id=$q_id'</script>";
			exit;
		}else{
			echo "error insert";
		}
	

?>