<?php
    include('config.php');
    if(isset($_POST['newuser']))
    {
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $dob=mysqli_real_escape_string($conn,$_POST['dob']);
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['psw']);
        $cpassword=mysqli_real_escape_string($conn,$_POST['psw-repeat']);

        if(empty($username) || empty($dob) || empty($username) || empty($email) || empty($password) || empty($cpassword))
        {
            echo 'Please fill in the blanks';
        }

        if($password!=$cpassword)
        {
            echo 'Passwords does not matches!!!';
        }

        else
        {
            $uschk = "Select * from users where Username='$username'"; 
            $usres = mysqli_query($conn, $uschk); 
            $usnum = mysqli_num_rows($usres);  
            $emchk = "Select * from users where Email='$email'"; 
            $emres = mysqli_query($conn, $emchk); 
            $emnum = mysqli_num_rows($emres);  
            if($usnum!=0)
            {
                echo "Username already exists!!!";
            }
            else if($emnum!=0)
            {
                echo "Email Already exists!!!";
            }
            else{
                $sql="insert into users (Name,Dob,Username,Email,Password) values('$name', '$dob', '$username', '$email', '$password')";
                $result= mysqli_query($conn, $sql);

                if($result!=true)
                {
                    echo 'Check Query';
                    
                    //header("Location:'C:/Users/SHOWKATH/Desktop/Mini%20Project/login.html'");
                    //echo "<script>window.location.href='C:/Users/SHOWKATH/Desktop/Mini Project/login.html';</script>";
                }

                else
                {
                    echo "Signup Success";
                }
            }    
        }
    }

?>

<html>
    <body>
        <a href="C:/Users/SHOWKATH/Desktop/Mini Project/login.html">Login</a>
    </body>
</html>
