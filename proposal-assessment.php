<!-- SUB ASSESSMENTS SAVE TWICE DUE TO THE IF STATEMENT AND ALSO HAS 1 WITHOUT SUB ASSESSMENTS BEING SAVED -->
  <!-- LEAVE FOR NOW, TRY FIX LATER -->

<!-- IF POSSIBLE - FIX DATE ISSUE ON SUB ASSESSMENTS -->
  <!-- WHEN A NEW ROW IS ENTERED, CURRENT DATE IS NOT SET AS THE VALUE -->
  <!-- WHEN A NEW ROW IS ENTERED, PREVIOUS DATES CAN STILL BE CHOSEN -->
    <!-- LEAVE FOR NOW, TRY FIX LATER -->

<!DOCTYPE html>
<html>
<?php 
    include "../sci/includes/header.php";
    include  "../sci/includes/lecturer-navbar.php";
    include "../sci/db_connect.php";
  ?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/css/bootstrap-slider.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/bootstrap-slider.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <title></title>
</head>
<body onload="SetDate();">


 <?php 
  if (isset($_GET['id'])) {
    $search = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM allocation_project, projects_db, user, student_db WHERE allocation_id = '$search'"; 
    // $sql = "SELECT * FROM allocation_project WHERE allocation_id = '$proj'"; 

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  
        while($row = mysqli_fetch_array($result)) { 
          $ptitle = $row['project_title'];
          $ptitle = $row['project_title'];
          
           $fs = $row['name'];


           $lid = $row['student_id'];

           $query0 = "SELECT * FROM student_db WHERE student_id = '$lid'";

           $result0 = mysqli_query($conn, $query0);

           while ($row0 = mysqli_fetch_array($result0))

              $ss = $row0['student_name']; 
              $s = $row0['programme_area'];
              $sintk = $row0['Intake'];
          
                             $lid1 = $row['first_supervisor_id'];

                              $query1 = "SELECT name, username FROM user WHERE staff_id = '$lid1'";
                              
                              $result1 = mysqli_query($conn, $query1);
                              
                               while ($row4 = mysqli_fetch_array($result1)) 
                              
                           $sone = $row4['name'];
                            
                            
                             $lid2 = $row['second_supervisor_id'];

                              $query2 = "SELECT name, username FROM user WHERE staff_id = '$lid2'";
                              
                              $result2 = mysqli_query($conn, $query2);
                              
                               while ($row5 = mysqli_fetch_array($result2)) 
                              
           $scs = $row5['name'];
                        
    }}
  
  ?>
    <div id="wrapper">
    <div id="page-wrapper">
      <div class="container-fluid">
      
        <div class="container">
  <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
             <table id="news" class="table table-responsive">
    
        <tr>
          <th>Details</th>
        </tr>
    
    <tbody>
       
<?php
     
    if(isset($_GET['id'])) 
    
    ?>

        <tr>
            <td>
              <b>Student Name:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php { print $ss; }?>
            </td>
         </tr>
         <tr>   
            <td>
               <b>Programme Area:</b>&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<?php { print $s; }?>
            </td>
           </tr> 
           <tr>   
            <td>
               <b>Intake:</b>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php  { print $sintk; }?>
            </td>
           </tr> 
           <tr> 
            <td>
                <b>First Supervisor:</b>&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<?php { print $sone; }?>
            </td>
            </tr> 
            <tr> 
            <td>
                <b>Second Supervisor:</b>&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;<?php { print $scs; }?>
            </td>
          </tr> 
        </tr>

             
    </tbody>
</table>
      </div>
  </div>
</div>
       <?php
        
        ?>  
            <h1>Add Assessment for proposal</h1>
                     <body>
        
   

    <div class="main">
        <form action="" method="post">
            <fieldset>
           

           <!--      <?php
                  include "../sci/db_connect.php";

                    $select_class_query="SELECT name from staff_id";
                    $class_result=mysqli_query($conn,$select_class_query);
                    //select class
                    echo '<select name="name">';
                    echo '<option selected disabled>Select Class</option>';
                    
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?> -->
                <input type="text" name="projt" value="<?php print $ptitle; ?>" readonly>
                <input type="text" name="p1" id="" placeholder="Enter Marks for Problem Definition">
                <input type="text" name="p2" id="" placeholder="Enter Marks for Back Ground Study">
                <input type="text" name="p3" id="" placeholder="Enter Marks for proposed solution">
                <input type="text" name="p4" id="" placeholder="Enter Marks for Analysis">
                <input type="text" name="p5" id="" placeholder="Enter Marks for Projection">
                 <input type="text" name="p6" id="" placeholder="Enter Marks for Report">
                <input type="text" name="p7" id="" placeholder="Enter Marks for Poseter">
                <input type="submit" value="Submit">
            </fieldset>
   
    </div>

</body>  
</body>
</html>

<style type="text/css">
  .entry:not(:first-of-type)
  {
      margin-top: 10px;
  }
  .glyphicon
  {
      font-size: 12px;
  }
  #counter {
      padding: 2px;
      border: 1px solid #eee;
      font: 1em 'Trebuchet MS',verdana,sans-serif;
      color: black;
      border: none;
  }
  textarea {
      resize: none;
  }
  th, td {
    text-align: left;
    vertical-align: middle;
}
fieldset {
    font-size: 20px;
    border-radius: 10px;
    border-width: 5px;

    border-style: ridge;
    padding: 20px;
    margin: 0 15%;
}
input[type=text], input[type=password], select {
   /*// background-color: #926a92;
   // color: black;*/
   border: inset;
    background: padding-box;
    border: none;
    font-size: 100%;
    letter-spacing: 0.2em;
}
input, select, option {
    width: 100%;
    padding: 12px 20px;
    margin: 10px 0;
    box-sizing: border-box;
    display: block;
}
input[type=submit] {
    -webkit-appearance: media-slider;
    cursor: unset;
}
</style>


<?php 
  if(isset($_POST['projt'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['p6'],$_POST['p7']))
    {
        $projt=$_POST['projt'];
        if(!isset($_POST['name']))
            $sup_name=null;
        else
            $sup_name=$_POST['name'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];
        $p6=(int)$_POST['p6'];
        $p7=(int)$_POST['p7'];

        $marks=5/100*$p1*10+30/100*$p2*10+25/100*$p3*10+25/100*$p4*10+5/100*$p5*10;
        $percentage=$marks/5;
        $sql="INSERT INTO `assessment` (`assessment_id`, `project_name`, `proposal_marks`, `interim_marks`, `final_marks`, `overall_marks`) VALUES ('$display', '$prot', '$marks', '', '', '', '')";
        $sql=mysqli_query($conn,$sql);

        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }
    }
    
    mysqli_close($conn);
    echo '<script type="text/javascript">','YNconfirm();','</script>';
  
?>
 