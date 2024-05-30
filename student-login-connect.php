<?php
  if(!isset($_SESSION)) {
    session_start();
  }
   include "db_connect.php";  
?>
<?php

$error=''; //Variable to Store error message;

if(isset($_POST['submit'])){
 if(empty($_POST['email']) || empty($_POST['password'])){
 $error = "Username or Password is Invalid";
 }
 else
 {
 //Define $user and $pass
 $user=$_REQUEST['email'];
 $pass=$_REQUEST['password'];
 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
 $conn = mysqli_connect("localhost", "", "");
 //Selecting Database
 $db = mysqli_select_db($conn, "dbsci_fyp");
 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM student_db WHERE password='$pass' AND email='$user'");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){
 header("Location: studentPage.php"); // Redirecting to other page
 }
 else
 {
 $error = "Username of Password is Invalid";
 }
 }
}
 
?>