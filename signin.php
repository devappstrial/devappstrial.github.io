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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <style>
        body{
    margin: 0px;
    padding: 0px;
    background-size: cover;
}

.signup-form{
    width: 300px;
      padding: 20px;
      background: rgba(101, 102, 114, 0.7);
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      overflow: hidden;
      border-radius: 0.5px;
  }

.signup-form img{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    height: 50%;
  }

.signup-form input{
    border: none;
    outline: none;
    background: none;
    color: white;
    font-size: 18px;
    width: 80%;
    float: left;
    margin: 0 10px;
  }

.signup-form input[date]
{
  float: left;
  height: 52px;
  width: 52px;
  background: url(date.png) no-repeat;
  margin-right: 10px;
  padding-top: 0px;
  line-height: normal;
}

.signup-form h1{
    float: left;
    font-size: 40px;
    border-bottom: 6px solid #4caf50;
    margin-bottom: 50px;
    padding: 13px 0;
  }

.signup-form input{
    margin: 20px;
  border-radius: 0.5px;
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
}

.signup-form a{
    text-decoration: none;
    color:#000;
    font-family: 'Public Sans', sans-serif;
    padding: 10px;
    transition: 0.8px;
    text-align: center;
    display: block;
  }

  .signup-form a:hover{
    background: rgba(0, 0, 0, 0.3);
    color: #fff;
  }

.txt{
    margin: 20px;
    border-radius: 0.5px;
}

.btn{
    margin-top: 60px;
    margin-bottom: 20px;
    background: #487eb0;
    color: #fff;
    border-radius: 40px;
    cursor: pointer;
    transition: 0.8px;
}

.btn:hover{
    transform: scale(0.96);
}

.signup-form a{
    text-decoration: none;
    color:#000;
    font-family: 'Public Sans', sans-serif;
    padding: 10px;
    transition: 0.8px;
    text-align: center;
    display: block;
}

.signup-form a:hover{
    background: rgba(0, 0, 0, 0.3);
    color: #fff;
}
</style>
  </head>
  <body background="img/bg-login.jpg">
    <form action="http://localhost/miniproject/login.php" method="POST">
      <div class="login-box">
        <h1>Login</h1>
        <img src="img/user.png">
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" name="psw" placeholder="Password" required>
        </div>
        <input type="submit" class="btn" value="Sign in">
        <a href="#">Forgot Password?</a>
        <a href="signup.html">Create a new account</a>
      </div>
    </form>
  </body>
</html>
