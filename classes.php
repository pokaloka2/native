<?php

 abstract class user{
        public $id;
        public $name;
        public $email;
        public $phone;
        protected $password;
        public $created_at;
        public $updated_at;
        public function static login($email,$password){
            $qry="SELECT * FROM USERS WHERE email='$email' AND password='$password'";
            require_once('config.php')
            $cn=mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
            $rslt= mysqli_query($cn,$qry);
            if ($arr = mysqli_fetch_assoc($rslt)) {
                var_dump($arr);
            }else {
                each "no user";
            }

        }
}

class Subscriber extends user{

public $role="subscriber";
public static function register($name,$email,$password,$phone){
    $qry="INSERT INTO  USERS (name,email,password,phone)
     VALUES('$name','$email','$password','$phone')";
     require_once('config.php');
     $cn=mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
     $rslt=mysqli_query($cn,$qry);
     mysqli_close($cn);
     return $rslt;
    
}
}

class Admin extends user{

public $role = "admin";

}