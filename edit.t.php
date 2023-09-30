<?php
    if(isset($_POST["submit_btn"])) {
        $mysqli = new mysqli("localhost","root","","mimi_db");
        if($mysqli->connect_errno){
            echo "Failed to connect to MYsql:" . $mysqli->connect_error;
            exit();
        }
        
        $q_id =$_POST["q_id"];
		$texttopic=$_POST["texttopic"];
        $txtdetail01=$_POST["txtdetail01"];
        $txtpostby=$_POST["txtpostby"];

        echo $texttopic;
		echo $txtdetail01;
		echo $txtpostby;
		$postdata = date("d/m/Y:H:i:s");

        if(isset($_FILES['uploadpic'])){
			$name_file =  $_FILES['uploadpic']['name'];
			$tmp_name =  $_FILES['uploadpic']['tmp_name'];
			$locate_img ="pic/";
            $fileName = $name_file;
			$ext = pathinfo($fileName, PATHINFO_EXTENSION);
			
			move_uploaded_file($tmp_name,$locate_img.$q_id. "." . $ext);
			$file_name=$q_id. "." . $ext;
    }

    $sql = "update webboard set  topic='$texttopic', detail01='$txtdetail01', file_name = '$file_name',
                                 postby='$txtpostby',postdata='$postdata' where q_id = '$q_id' ";

    if($result = $mysqli->query($sql)) {
        echo "<script>alert('insert complete!')</script>";
            echo "<script>window.location.href='webb.php'</script>";
			exit;
		}else{
			echo "error insert";
		}
    }
        



   


?>