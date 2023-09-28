

<?php
session_start();
$conn=mysqli_connect("localhost","root","","checking");


if(!empty($_SESSION["id"])){
    header("location:welcome.php");
}

if(isset($_POST["submit"])){
  $mail=$_POST["mail"];
  $password=$_POST["password"];
  $result=mysqli_query($conn,"SELECT * FROM checking_db WHERE mail='".$mail."' AND password ='".$password."'");
  
  $row=mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)!=0){
    if($password == $row["password"]){
      $_SESSION["login"]=true;
      $_SESSION["id"]=$row["id"];
      echo
      "<script> alert('logged in');</script>";
      header("location:welcome.php");
    }
    else{
      echo
      "<script> alert('wrong password');</script>";
    }
  }
  else{
    echo
    "<script> alert('user not registered');</script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>login</title>
        <link rel="stylesheet" href="login.css">
        
    </head>
    <body>  
        <div class="container">
            <h1 class="heading">Login-form</h1>
            <form name=""  id="test" method ="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >  
                <div class="input-control">
                    <label for="mail"><e-mail>E-mail</label>
                    <input type="text" id="mail" name="mail" placeholder="Enter your e-mail">
                    <div class="error"></div>
                    
                </div>
                <br/>
                <br/>
                
                <div class="input-control">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="enter your password">
                    <div class="error"></div>
                </div>
                
                <br/>  
                <br/>
                <input class="click" name="submit" type="submit" value="login">
               
                
                
                <br/>
                <p>Don't have an account? <a href="register.php">Register Now</a></p>
                
                
                </form>  
        </div>
        
    <script src="script.js"></script>
    </body>
</html>