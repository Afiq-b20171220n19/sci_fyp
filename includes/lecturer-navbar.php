<!-- FIX LOGOUT - SESSION DOESNT STOP RUNNING -->

<?php session_start(); ?>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="../sci/utb.png" alt="UTB" name="UTB" style="width: 90px; height: 74px; margin-top: -10px; float: right; margin-right: -1240px;">
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
            // Define each name associated with an URL
          if(isset($_SESSION['id'])) {
          echo '<li><a href="#">hi, '. $_SESSION["id"] . '</a></li>';
          
        } else {
            echo '<li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        }
            $urls = array(
                'Home' => '../sci/supervisorPage.php', 
                'Logout' => '../sci/index.php',
            );

            foreach ($urls as $name => $url) {
                echo '<li> <a href="'.$url.'">'.$name.'</a></li>';
            }
        ?>
</ul>

<ul class="nav navbar-nav navbar-right">
    
        <?php
        
        ?>
    </div>
  </div>
</nav>

<style type="text/css">
    .navbar-inverse .navbar-nav>li>a {
        color: #614561;
        border: none!important;
        font-size: 12px;
        text-transform: uppercase;
        color: #ececec;
        font-family: "Raleway","Helvetica Neue","Helvetica","Roboto","Arial",sans-serif;
        font-feature-settings: "lnum";
        font-variant-numeric: lining-nums;
        background-color: #614561;
        border-color: #614561;

    
  }

    div {
        display: block;

    }

   .navbar.navbar-inverse {
    background-color: #503750;
   height: 75px;
    border-color: #503750;
}
    .container-fluid {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        margin-top: 10px;
    }

    #container1 {
      margin-top: -65px;
      margin-bottom: 50px;
      margin-left: 255px
    }

    .nav ul {
        list-style: none;
        background-color: black;
        text-align: center;
        padding: 0;
        margin: auto;
        z-index: 1000;
        align-items: center;
    }

    ul, menu, dir {
        display: block;
        list-style-type: disc;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 40px;
    }

    .nav ul {
      list-style: none;
      background-color: #99CCCC;
      text-align: center;
      padding: 0;
      margin: auto;
      z-index: 1000;
    
      }

    .nav li {
      font-family: 'Gabriola', sans-serif;
      font-size: 1.2em;
      line-height: 40px;
      text-align: left;
      background-color: #523e52;
      }

    .nav a {
      text-decoration: none;
      color: #FFFFFF;
      display: block;
      padding-left: 15px;
      border-bottom: 1px solid #888;
      transition: .3s background-color;


      }

    .nav a:hover {
      background-color: #007;
    }

    .nav a:active {
      background-color: #aaa;
      color: #444;
      cursor: default;
    }    
</style>