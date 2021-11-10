<?php include('partials/menu.php');?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Change Password</h1>
            <br> <br>

            <?php
                if (isset($_GET['id']))
                {
                    $id=$_GET['id'];
                }

            ?>

            <form action="" method="POST">
                <table class="tble-30">
                    <tr>
                        <td>Current Password:</td>
                        <td>
                            <input type="password" name="current_password" placeholder="Current Password">
                        </td>
                    </tr>

                    <tr>
                        <td>New Password:</td>
                        <td>
                            <input type="password" name="new_password" placeholder="New Password">
                        </td>
                    </tr>

                    <tr>
                        <td>Confirm Password:</td>
                            <td>
                                <input type="password" name="confirm_password" placeholder="Confirm Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id ;?>">
                            <input type="submit" name="submit" value="Change Password" class="btn-secondary" >
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>

    <?php

                //check whether submit button is clicked on not
                if(isset($_POST['submit']))
               
                {
                    //echo "clicked" ;

                    //1 get data from form
                    $id=$_POST['id'];
                    $current_password =md5($_POST['current_password']);
                    $new_password =md5($_POST['new_password']);
                    $confirm_password =md5($_POST['confirm_password']);
                


                    //2 check whether user with current user id and current pass exists or not
                    $sql = "SELECT * FROM table_admin WHERE id=$id AND password='$current_password'";

                    //execute query
                    $res =mysqli_query($conn , $sql);

                    if($res ==true)
                    {
                        //check whether data is avail or not
                        $count =mysqli_num_rows($res);

                        if($count==1)
                        {
                            //user exists n pass can be changed
                            //echo "user found";

                            //check new pass and confirm pass matches or not
                            if ($new_password==$current_password)
                            {
                                //update pass
                              $sql2="UPDATE table_admin SET
                              password='$new_password'
                              WHERE id=$id
                              
                              ";
                              //execute query
                              $res2 = mysqli_query($conn ,$sql2);

                              //check whether query executed or not
                              if($res2 == true)
                              {
                                  //display success msg
                                    //redirect to manage admin pg with error msg
                                $_SESSION['change-pwd'] ="<div class='success'> Password changed successfully </div> ";
                                //redirect user
                                header('location:'.SITEURL.'admin/manage-admin.php');


                              }
                              else
                              {
                                  //display error msg
                                  $_SESSION['change-pwd'] ="<div class='error'> Failed to change password </div> ";
                                  //redirect user
                                  header('location:'.SITEURL.'admin/manage-admin.php');
                              }
                            }
                            else
                            {
                                //redirect to manage admin pg with error msg
                                $_SESSION['pwd-not-match'] ="<div class='error'> Password did not match </div> ";
                                //redirect user
                                header('location:'.SITEURL.'admin/manage-admin.php');

                            }
                        }
                        else
                        {
                            //user doesnt exist n redirect
                            $_SESSION['user-not-found'] ="<div class='error'> User not found </div> ";
                            //redirect user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }

                    }
                 

                    //3 check whether new pass n current pass matches or not 

                    //change passsword is all above is true 
                    
                }

    ?>



<?php include('partials/footer.php');?>