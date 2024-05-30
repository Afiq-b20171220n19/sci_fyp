<!DOCTYPE html>
<html>
  <?php 
    include "../sci/includes/header.php";
    include "../sci/includes/coordinator-navbar.php";
    include "../sci/db_connect.php";
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <title></title>
</head>
<body>

<div class="container">
    <div class="row">
        <form class="form-horizontal" style="float: right;" action="view-modules.php" method="post" name="export" enctype="multipart/form-data">
          
        </form> 
      <h1>List of My Projects</h1>
      <hr>
     
        <div class="panel panel-primary filterable" style="border-color: #876aa7;">
            <div class="panel-heading" style="background-color: #876aa7;">
                <h3 class="panel-title">List of my Projects</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter Search</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                         <th><input type="text" class="form-control" placeholder="Student Rollno" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Student Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Project Name" disabled></th>
                        
                        <th><input type="text" class="form-control" placeholder="1st Supervisor" disabled></th>
                        <th><input type="text" class="form-control" placeholder="2nd Supervisor" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Assess Student" disabled></th>
                    </tr>
                </thead>
                <tbody>
              
                    <?php
                        $output = '';
                        if(isset($_POST["query"]))
                        {
                         $search = mysqli_real_escape_string($conn, $_POST["query"]);
                          $query = "
                          SELECT * FROM allocation_project 
                          WHERE allocation_id LIKE '%".$search."%' 
                          OR project_id LIKE '%".$search."%'
                          OR first_supervisor_id LIKE '%".$search."%'
                          OR second_supervisor_id  LIKE '%".$search."%' 
                          OR student_name LIKE '%".$search."%' 
                         ";
                        }
                        else
                        {
                         $myid = $_SESSION['id'];

                         $select = "SELECT staff_id, name FROM user WHERE username = '$myid'";
                         $res = mysqli_query($conn, $select);

                         while($getting = mysqli_fetch_array($res))
                         {
                            $staffid = $getting['staff_id'];
                            $staffname = $getting['name'];
                         }

                          $query = "
                          SELECT DISTINCT allocation_id, project_id, student_roll_number, student_id, first_supervisor_id, second_supervisor_id FROM allocation_project WHERE first_supervisor_id = '$staffname' OR first_supervisor_id = '$staffid' OR second_supervisor_id = '$staffid'";

                       
                        }
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0) {

                         while($row = mysqli_fetch_array($result))
                         {


                           $proj = $row['allocation_id'];
                              echo '<body onLoad="informUser()">';
                            
                            $pst = $row['student_id'];

                              $q = "SELECT student_id, student_name, student_rollnumber FROM student_db WHERE student_id = '$pst' OR student_rollnumber = 'pst'";
                            $s = mysqli_query($conn, $q);
                            while ($rq = mysqli_fetch_array($s)){

                            $output .= '

                             <tr>
                             <td>'.$rq["student_rollnumber"].'</td>
                              <td>'.$rq["student_name"].'</td>';
}
                                
                            $pstu = $row['project_id'];
                           
                            $query7 = "SELECT project_title FROM projects_db WHERE project_id = '$pstu'";
                            $result7 = mysqli_query($conn, $query7);  
                            while ($row4 = mysqli_fetch_array($result7)){
 
                            $output .= '
                             
                              <td>'.$row4["project_title"].'</td> ';
                        }      
                              $lid = $row['first_supervisor_id'];
                              $lid2 = $row['second_supervisor_id'];
                              
                              $query1 = "SELECT name, username FROM user WHERE staff_id = '$lid'";
                              $result1 = mysqli_query($conn, $query1);
                              

                              while ($row4 = mysqli_fetch_array($result1)) {
                              $output .= '<td>'.$row4["name"]." ".$row4["username"].'</td>';
                             
                             
                              $query2 = "SELECT name, username FROM user WHERE staff_id = '$lid2'";
                              
                              $result2 = mysqli_query($conn, $query2);
                              
                               while ($row5 = mysqli_fetch_array($result2)) 
                              

                              $output .= '

                              
                            <td>'.$row5["name"]." ".$row5["username"].'</td>

                                <td class="text-center">
                                <div class="btn-group">
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Options <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        ';

                                       
                                          $output .= '
                                            <li>
                                              <a href="proposal-assessment.php?id=' . $proj . '">Assess Proposal</a>
                                              <a href="interim-assessment.php?id=' . $proj . '">Assess interim</a>
                                              <a href="final-assessment.php?id=' . $proj . '">Assess Final</a>
                                            </li>';
                                        }
                                        
                                        $output .='
                                      </ul>
                                    </div>
                                  </div>
                                 </td>
                                </tr>
                              </div>
                            ';
                         }
                                             }
                      echo $output;
                    ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

<style type="text/css">
    .filterable {
    margin-top: 15px;
    }
    .filterable .panel-heading .pull-right {
        margin-top: -20px;
    }
    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }
    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }
    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }
    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }
</style>


