<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $comfirmpassword = $_POST["comfirmpassword"];
    $duplicate = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$username' OR email = '$email' ");
    if(mysqli_num_rows($duplicate)>0){
    echo
    "<script> alert ('Username or Email Has Already Taken');</script>";
    }
    else{
        if($password == $comfirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert ('Registration Successful');</script>";
        }
        else{
            echo
            "<script> alert ('Password Does Not Match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
<form action="" method="post" autocomplete="off" >
    <label for="name">Name:</label>
    <input type="text" name="name" required id="name" value="" ><br>
    <label for="username">Username:</label>
    <input type="text" name="username" required id="username" value="" ><br>
    <label for="email">Email:</label>
    <input type="text" name="email" required id="email" value="" ><br>
    <label for="password">Password:</label>
    <input type="text" name="password" required id="password" value="" >
    <br>
    <label for="comfirmpassword">Comfirm Password:</label>
    <input type="text" name="comfirmpassword" required id="comfirmpassword" value="" ><br>
    <button type="submit" name="submit" id="submit" >Register</button>
</form>
<br>
<a href="login.php">Login</a>
</body>
</html>