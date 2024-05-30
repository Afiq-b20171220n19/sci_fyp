<?php

  if(!isset($_SESSION)) {
    session_start();
  }
include"student-login-connect.php"; 
include "db_connect.php";  
?>
 
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>

</head>
<body>
<div class="login">
<h2 align="center">SCI FYP Management & Assessment System</h2>
<h3 align="center">Student login</h3>
<form action="" method="post" style="text-align:center;">
<input type="text" placeholder="Username" id="email" name="email"><br/><br/>
<input type="password" placeholder="Password" id="password" name="password"><br/><br/>
<input type="submit" value="Login" name="submit">

<a class="underlineHover" href="index.php">staff login</a>
<!-- Error Message -->
<span><?php echo $error; ?></span>
</body>
</html>
<style>
.login{
width:360px;
margin:50px auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border: 2px solid #96859a;
padding:10px 40px 25px;
margin-top:70px; 
}
input[type=text], input[type=password]{
width:99%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
input[type=submit] {
    width: 100%;
    background-color: #8f8fbb;
    color: #fff;
    border: 2px solid #7d82a9;
    padding: 7px;
    font-size: 20px;
    cursor: pointer;
    border-radius: 5px;
    margin-bottom: 15px;
}

html {
    color: purple;
    background-color: lavender;
}
</style>
