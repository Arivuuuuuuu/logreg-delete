

<?php
session_start();
$conn=mysqli_connect("localhost","root","","checking");

$username=$_POST["username"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$mail=$_POST["mail"];
$number=$_POST["number"];

//echo $username;

$duplicate = mysqli_query($conn,"SELECT * FROM checking_db WHERE username ='".$username."' OR mail='".$mail."'");
//echo $duplicate;
if(mysqli_num_rows($duplicate)>0){
    echo
    
    "<script> alert('username or mail has already taken');</script>";
}
else{
    //echo "IN";
    if($password == $cpassword){
       // $query="INSERT INTO final_db VALUES ('','$username','$password','$cpassword','$mail','$number')";
        //$query="INSERT INTO final_db(`username`,`password`,`cpassword,mail,number) VALUES ('value1','value2','value3','value4','value5')";
        $query="INSERT INTO checking_db ( `username`, `password`, `cpassword`, `mail`, `number`) VALUES ('".$username."','".$password."','".$cpassword."','".$mail."','".$number."')";
        //$sql = "INSERT INTO your_table_name (column1, column2, column3) 
    //VALUES ('value1', 'value2', 'value3')";
    echo $query;
        mysqli_query($conn,$query);
        echo
        "<script> alert('registration successful');</script>";

    }
    else{
        echo
        "<script> alert('password does not match');</script>";

    }
}

?>