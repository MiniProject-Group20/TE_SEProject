<?php include('../config/constants.php')?>


<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>

            <br> <br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
                



            ?>
            <br> <br>

            <!--login form starts here -->
            <form action="" method="POST" class="text-center">
                username: <br>
                <input type="text" name="username" placeholder="Enter UserName"> <br> <br>

                password: <br>
                <input type="password" name="password" placeholder="Enter Password"> <br> <br>

                <input type="submit" name="submit" value="login" class="btn-primary">
            <br> <br>
            </form>
             <!--login form ends here -->

            <p class="text-center">Created by <a href="#">Simran Huddedar</a></p>
        </div>
    </body>
</html>

<?php
    //check whether submit btn clicked or not
    if (isset($_POST['submit']))
    {
        //process for login
        //1 get data from login form
         $username = $_POST['username'];
         $password = md5($_POST['password']);

         //2 to create sql query to check whether user with  username n pass exists or not
         $sql="SELECT * FROM table_admin WHERE username='$username' AND password='$password'";

         //3 execute the query
         $res = mysqli_query($conn , $sql);

         //4 counts the rows to check whether user exists or not
         $count = mysqli_num_rows($res);

         if($count==1)
         {
            //user available and login sucess
            $_SESSION['login'] = "<div class='success'> Login Succcessful </div>";
            $_SESSION['user'] = $username;
            //redirect to homepg dashboard
            header('location:'.SITEURL.'admin/');
         }
         else
         {
             //user not available
             $_SESSION['login'] = "<div class='error text-center'> Username or Password did not match </div>";
             //redirect to homepg dashboard
             header('location:'.SITEURL.'admin/login.php');
         }
    }


?>