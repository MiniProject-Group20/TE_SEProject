<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/> <br/>

        <?php
            if (isset($_SESSION['add'])) //checking whether session is set is not
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method ="POST">
                <table class="tble-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter Your Name">
                        </td>
                    </tr>

                    <tr>
                        <td>UserName:</td>
                        <td>
                            <input type="text" name="username" placeholder="Your UserName">
                        </td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="password" placeholder="Your Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Process the value from form and save it to database

    //check whether the submit button is clicked or not
    if (isset($_POST['submit']))
    {
        //button clicked
        //echo "button clicked";
        //1 get the data from the form 
         $full_name=$_POST['full_name'];  //- this name should be similar to input type's name prop value that we have given
        $username=$_POST['username'];
        $password=md5($_POST['password']); //password encryption with MD5
        
    
        //2 to create sql query to save the data into database
        $sql = "INSERT INTO table_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'
        ";
    
       //3 executing query and data into db
        $res = mysqli_query($conn , $sql) or die(mysqli_error()) ;

        //4 check whether data is inserted or not and display appropriate msg
        if($res=TRUE){
            //data inserted
            //echo "data inserted";
            //create the session variable to display the msg
            $_SESSION['add'] ="Admin Added Successfully" ;
            //Redirect page to manage admin pg
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to insert data
            //echo "failed to insert data";
             //create the session variable to display the msg
             $_SESSION['add'] ="Failed To Add Admin" ;
             //Redirect page to add admin pg
             header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    ?>