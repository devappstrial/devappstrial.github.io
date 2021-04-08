<?php 
    include('config.php');
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
    }
    if(isset($_POST['username']))
    {
        $uname=$_POST['username'];
        $password=$_POST['psw'];
        //$pass=md5($password);
        $sql="select * from users where Username='$uname' AND Password='$password'";
        $result=mysqli_query($conn, $sql);
        $chk=mysqli_num_rows($result);
        if($chk==1)
        {
            //echo "Login Success";
            //header("Location:'https://localhost/miniproject/login.html");
           // echo "<script>window.location.href='welcome.php';</script>";
           $_SESSION["loggedin"] = true;
           $_SESSION["username"] = $uname;                            
           header("location: welcome.php");
        }
        
        else
        {
            echo " Username or password is incorrect!!!";
        }
    }
?>