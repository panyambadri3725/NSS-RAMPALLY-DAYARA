<?php      

    session_start();
    include('config.php');  
    $username = $_POST['user'];  
    $password = $_POST['password'];  
    $role = $_POST['role'];
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from login where Username = '$username' and Password = '$password' and UserType='$role'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        

        if($count == 1){  
            $_SESSION["name"] = $username;
            $_SESSION["UserType"]= $role;
            if($_SESSION["UserType"]=='admin'){
                header("Location: home.php"); /* Redirect browser */
                exit();
            }
            if($_SESSION["UserType"]=='guest'){
                header("Location: guest/home.php"); /* Redirect browser */
                exit();
            }
            
        }  
        else{  

            header("Location: signin.php"); 
            echo "<script>alert('Invalid Username or Password')</script>";
        }     
?>  