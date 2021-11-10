<?php 

    //include constants.php file 
    include('../config/constants.php');
    //1 get the id of admin to be deleted
    $id= $_GET['id'];


    // 2 create sql query to delete admin
    $sql="DELETE FROM table_admin WHERE id=$id";

    // execute the query
    $res=mysqli_query($conn ,$sql);

    //check whether query is successfully execeuted or not 
    if($res==true)
    {
        //query executed successfully adn admin deleted
       // echo "admin Deleted";
       //create session variable to display the msg
       $_SESSION['delete'] = "<div class='success'> Admin Deleted Successfully. </div>";
       //redirect to manage admin pg
       header('location:' .SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete
        //echo "failed to delete admin";
        $_SESSION['delete'] = "<div class='error'> Failed to delete Admin.Try again later . </div> ";
       //redirect to manage admin pg
       header('location:' .SITEURL.'admin/manage-admin.php');

    }

    //3 redirectto manage admin pg


?>