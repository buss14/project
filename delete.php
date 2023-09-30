<?php
    $q_id = $_GET["q_id"];
    if(isset($_GET["q_id"])) {
        $mysqli = new mysqli("localhost","root","","mimi_db");

        if( $mysqli -> connect_errno){
            echo "Faild to connect to MySQL:" .$mysqli -> connect_error;
            exit();
           
        }
        $q_id = $_GET["q_id"];
        $sql = "delete from webboard where q_id='$q_id' ";
        if($result = $mysqli->query($sql)) {
            echo "<br>delete complete<br>";
            echo "<script>window.location.href='webb.php'</script>";
			exit;
		}else{
			echo "error insert";
		}

    }
?>