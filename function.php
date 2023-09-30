<?php
   
   define('DB_SERVER' , 'localhost');
   define('DB_USER' , 'root');
   define('DB_PASS' , '');
   define('DB_NAME' , 'mimi_db');


    class DB_con {
        function __construct(){
            $conn = mysqli_connect(DB_SERVER, DB_USER ,DB_PASS ,DB_NAME);
            $this->dbcon = $conn;

            if(mysqli_connect_errno()){
                echo "Failed to MYSQL: " . mysqli_connect_error();

            }else{
               // echo "No";
            }
        }
        
        public function usernameavailable($username){
                $checkuser = mysqli_query($this->dbcon,"SELECT username FROM user WHERE username =
                '$username' ");
                return $checkuser;
        }



        public function registration($fullname,$username,$useremail,$password){
              $reg = mysqli_query($this->dbcon,"INSERT INTO user (fullname,username,useremail,password) 
              VALUES('$fullname','$username','$useremail','$password')");
              return $reg;
        }

        public function signin($username,$password){
            $signinquery = mysqli_query($this->dbcon,"SELECT id , fullname FROM user WHERE username = '$username' AND password = '$password' ");
            return $signinquery;

        }
    }

?>