<?php
  if(!isset($_SESSION)) {
    session_start();
  }
  include "db_connect.php";  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../sci/css/style.css?<?php echo time(); ?> /">
    <link rel="stylesheet" href="../sci/css/style-mickey.css?<?php echo time(); ?> /">
  </head>
  <body>

  <?php
    if(isset($_POST['submit'])) {

    $username = $_POST['userid'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email = '$username' OR name = '$username' AND password = '$pass'";
    $result = mysqli_query($conn, $sql)  or die("Could not connect database " .mysqli_error($conn));

    if (!$row = $result->fetch_assoc()) {
      echo "<div>

          <h2>Incorrect Credentials Entered</h2>
          Username or Password is incorrect.<br><br>
          </div>";
    }
  }
  ?>
<div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                          <br>
                              <span><strong>SCI FYP Management & Assessment System</strong></span>
                            </h2>

                        </div>


                       
          
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            
          </div>
  <div class="wrapper">
    <section>

      <div class="login-page">
        <div class="form">
          <form method="POST" class="register-form">
            <input type="text" name="email" placeholder="email address"/>
            <button type="submit">Submit</button>
            
          </form>
          <form class="login-form" method="POST">
            <input type="text" name="userid" placeholder="username"/>
            <input type="password" name="password" placeholder="password"/>
             <div id="formFooter">
           

            <button type="submit" name="submit">Login</button>
              <br>
              <br>
      <a class="underlineHover" href="student-login-page.php">student login</a>
    </div>
          </form>
        </div>
      </div>
    </section>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="../js/index.js"></script>
    </div>
    
     
  </body>
</html>

<?php
  if(isset($_POST['submit'])) {

    $username = $_POST['userid'];
    $pass = $_POST['password'];

   $sql = "SELECT * FROM user WHERE email = '$username' OR name = '$username' AND password = '$pass'";
    $result = mysqli_query($conn, $sql)  or die("Could not connect database " .mysqli_error($conn));

    if (!$row = $result->fetch_assoc()) {
      // ERROR MESSAGE SHOWS AT THE TOP OF THE PAGE
    } else {
      $_SESSION['id'] = $row['username'];

      if($row['role'] == 'coordinator' || $row['role'] == 'coordinator' || $row['role'] == 'supervisor' || $row['rank'] == 'supervisor' || $row['role'] == 'Student' || $row['role'] == 'student') {

        $_SESSION['role'] = $row['role'];

        if(isset($_SESSION['role'])) {
          if($_SESSION['role'] == 'coordinator' || $row['role'] == 'coordinator') {
            header("Location: coordinatorPage.php");
          }
          else if($_SESSION['role'] == 'supervisor' || $row['role'] == 'supervisor') {
            header("Location: supervisorPage.php");
          }
          else if($_SESSION['role'] == 'Student' || $row['role'] == 'student') {
            header("Location: home/studentHome.php");
          }
        }
      }
      else {
        echo "Role not found.";
      }
    }
  }
?>
<style>
.form button {
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #690d79ab;

    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
}
.form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgb(0 0 0 / 20%), 0 5px 5px 0 rgb(0 0 0 / 24%);
    border-style: solid;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-color: #885c9e;
}
.h2, span, strong, b {
    font-weight: 700;
    color: lavenderblush;
}
    

body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      background: #a086b7  !important
       
    }
   
 

    .form_container {
      margin-top: 100px;
      .form {
    position: absolute;
    z-index: 7;
    background: #FFFFFF;
    max-width: 429px;
    margin: -106px auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgb(0 0 0 / 20%), 0 5px 5px 0 rgb(0 0 0 / 24%);
    border-style: solid;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-color: #885c9e;
}
.h2, h2 {
    font-size: 39px;
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 2.1;
    color: inherit;
}

</style>