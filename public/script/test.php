<?php 

function something(){
     define('SERVER', 'localhost'); // server
     define('USER', 'root'); // username 
     define('DATABASE', 'rg_work'); // db name
     define('PASSWORD', ''); // password

     session_start();
     $_SESSION['success'] = null;

     // connect to the database
     $GLOBALS['db'] = mysqli_connect(SERVER, USER, PASSWORD, DATABASE); 

     $query = "SELECT * FROM TYPES LIMIT 5";

     $data = mysqli_fetch_all(mysqli_query($GLOBALS['db'], $query), MYSQLI_ASSOC); 

     if($data){
          echo json_encode($data);
     }else{
          echo json_encode("File does not exist in database");
     } 

     // echo json_encode("Hello Kebede");
}

something();


?>