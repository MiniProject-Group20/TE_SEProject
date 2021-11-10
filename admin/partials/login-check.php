<?php
    //authorization access control
    //check whether user is logged in or not
    if (!isset($_SESSION['user']))  
    {
        //user is not logged in
        //redirect to login pg with msg
        $_SESSION['no-login-message']= "<div class='error text-center'>Please login to acess to Admin Panel </div>";
        //redirect
        header('location:'.SITEURL.'admin/login.php');
    }
    


?>