<?php include('partials/menu.php');?>

        <!--main content section starts-->
        <div class="main-content">
            <div class="wrapper">
               <h1>Manage Admin</h1>
                    <br/> <br/>
               <!--buttons to add admin-->
               <a class="btn-primary" href="add-admin.php">Add Admin</a>
           
               <br/> <br/> 
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //displaying session msg
                        unset($_SESSION['add']); //removing session msg
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }
                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
                   

                ?>
                <br> <br> <br>

               <table class="tble-full">
                    
                    <tr>
                        <th>S.NO</th>
                        <th>Full Name </th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    //query to display all admins from backend to 
                        $sql = "SELECT * FROM table_admin ";
                    // execute the query 
                    $res = mysqli_query($conn , $sql) ;

                    //check whether the query is executed or not
                    if($res==TRUE)
                    {
                            //count rows to check whether we hv data in db or not
                            $count = mysqli_num_rows($res) ; //fuction to get all the rows in db

                            $sn = 1; //create variable and assign the value 

                            //check the no of rows
                            if($count > 0)
                            {
                                //we have data in database
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    //using while loop to get all data fom db
                                    // while loop will run as long as we hv data in db

                                    //get indivisual data
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];

                                    //display values in table
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++ ;?> </td>
                                        <td> <?php echo $full_name; ?> </td>
                                        <td>  <?php echo $username; ?> </td>
                                        <!--2 buttons creating a tags -->
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary"> Change Password</a>
                                           <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Admin</a>
                                           <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    
                                    </tr>



                                    <?php
                                }
                            }
                            else
                            {
                                ////we do not have data in database
                            }
                    }

                    ?>
  
                </table>
           
              
            </div>
        </div>
        <!--main content section ends-->

<?php include('partials/footer.php');?>