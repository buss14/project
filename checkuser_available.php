<?php
session_start();

include_once('function.php');

$usernamecheck = new DB_con();

$username = $_POST['username'];

$sql = $usernamecheck->usernameavailable($username);

$num = mysqli_num_rows($sql);
if($num>0){
    echo "<span style='color: red;>Username already associated with another accunt.</span>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
}else{
    echo "<span style='color: green;>Username available fro registration.</span>";
    echo "<script>$('#submit').prop('disabled', false);</script>";

}
?>