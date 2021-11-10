<?php

    //include constants.php
    include('../config/constants.php');
    // 1 destroy the session
    session_destroy(); //unsets $session
    


    //2 redirect to login page
    header('location:'.SITEURL.'admin/login.php');

?>