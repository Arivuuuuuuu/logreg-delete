


<?php

//require 'connect.php';

session_start();
$conn=mysqli_connect("localhost","root","","checking");

if(isset($_GET['id'])){
    $id =$_GET['id'];
    //$cpassword = mysqli_real_escape_string($conn, $_GET['cpassword']); // Sanitize input -- SQL ijection vulnerabilities
    $delete=mysqli_query($conn,"DELETE FROM `checking_db` WHERE `id`='$id'");
}

$select="SELECT * FROM checking_db";
$query=mysqli_query($conn,$select);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="./welcome.css">
</head>
<body>
    <div class="card">
        <?php
         if ($_SESSION["id"]) {
            $id = $_SESSION["id"];
            $userDataQuery = mysqli_query($conn, "SELECT * FROM checking_db WHERE id = $id");
            $row = mysqli_fetch_assoc($userDataQuery);
        }
           
        
        
        if (isset($row["username"])) {
            echo "<h1>Welcome " . $row["username"] . "</h1>";
        } else {
            echo "<h1>Welcome User</h1>"; 
        }
        
        
        
        ?>
        <a href="logout.php">LOGOUT</a>
    </div>
    <br/>
    <br/>
    <div class="align">
        <table border="1" cellpadding="1">
            <tr>
                <th>id</th>
                <th>username</th>
                <th>password</th>
                <th>cpassword</th>
                <th>mail</th>
                <th>number</th>
                <th>operation</th>
            </tr>
            <?php

            $num=mysqli_num_rows($query);
            if($num>0){
                while($result=mysqli_fetch_assoc($query)){
                    echo "
                    <tr>
                       <td>".$result['id']."</td>
                       <td>".$result['username']."</td>
                       <td>".$result['password']."</td>
                       <td>".$result['cpassword']."</td>
                       <td>".$result['mail']."</td>
                       <td>".$result['number']."</td>
                       <td>
                        <a href='welcome.php?id=".$result['id']."' class='btn' >Delete</a>
                       </td>
                       
                    </tr>
                    ";
                }
            }
            
            
            ?>
            
        </table>
    </div>
</body>
</html>














