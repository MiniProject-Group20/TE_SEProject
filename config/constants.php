<?php
    //start session
    session_start();


    //create constants for non repeating values
    define('SITEURL','http://localhost/food-order/');
    define('LOCALHOST','localhost') ;
    define('DB_USERNAME' , 'root');
    define('DB_PASSWORD' , '');
    define('DB_NAME' , 'food-order') ;

     // 3 to execute query and save data in db
     $conn = mysqli_connect(LOCALHOST , DB_USERNAME , DB_PASSWORD) or die(mysqli_error()) ; // database connection
     $db_select = mysqli_select_db($conn , DB_NAME)  or die(mysqli_error()) ; //selecting DB

   
?>