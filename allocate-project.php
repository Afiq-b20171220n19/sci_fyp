<!-- EXTRA RECORD SAVED IN DATABASE WITH BLANK ENGAGEMENT POINT -->
	<!-- FIX LATER -->

<!-- MCODE AND MNAME ONLY SAVES THE LAST RECORD -->
	<!-- FIX LATER BUT WILL BE NEEDED FOR VALIDATION -->

<!DOCTYPE html>
<html>
	<?php 
		include "../sci/includes/header.php";
		include "../sci/includes/coordinator-navbar.php";
    	include "db_connect.php";
//	?>
//	<?php
//		$get = "SELECT module_code, module_name FROM module;";
	//	$got = mysqli_query($conn, $get);
	//	
	//	while($read = mysqli_fetch_array($got)) { 
   //     	$mcode = $read['module_code'];
   ////     	$mname = $read['module_name'];
////		}
////	?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/css/bootstrap-slider.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/bootstrap-slider.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
	<title></title>
</head>
<body>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="container">
				    <h1>Add & Allocate Project</h1>
				  	<hr>
					<div class="row">
				      <div class="col-md-9 personal-info">
				        <h3> </h3>
				        <form class="form-horizontal" role="form" method="post">
				    
				        <div class="form-group">
				            <label class="col-lg-3 control-label">Student Roll Number:</label>
				            <div class="col-lg-8">
				            <?php
										$query = "SELECT student_id, student_name, student_rollnumber FROM student_db";
										$result = mysqli_query($conn, $query);
								   ?>
									<select class="form-group form-control" data-show-subtext="true" data-live-search="true" id="sturollno" name="sturollno" style="margin-left: -1px;" required>
										<option selected="selected" disabled>-- SELECT --</option>
										<?php 
											while ($row = mysqli_fetch_array($result))
											{
											    echo "<option value='$row[0]'>$row[1] $row[2]</option>";
											}
										?>        
									</select>
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-lg-3 control-label">Student Name:</label>
				            <div class="col-lg-8">
				            <?php
										$query = "SELECT student_id, student_name FROM student_db";
										$result = mysqli_query($conn, $query);
								   ?>
									<select class="form-group form-control" data-show-subtext="true" data-live-search="true" id="stuname" name="stuname" style="margin-left: -1px;" required>
										<option selected="selected" disabled>-- SELECT --</option>
										<?php 
											while ($row = mysqli_fetch_array($result))
											{
											    echo "<option value='$row[0]'>$row[1] $row[2]</option>";
											}
										?>        
									</select>
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-lg-3 control-label">Programme Area:</label>
				            <div class="col-lg-8">
				             <?php
										$query = "SELECT student_id, student_rollnumber, student_name, programme_area FROM student_db";
										$result = mysqli_query($conn, $query);
								   ?>
									<select class="form-group form-control" data-show-subtext="true" data-live-search="true" id="area" name="area" style="margin-left: -1px;" required>
										<option selected="selected" disabled>-- SELECT --</option>
										<?php 
											while ($row = mysqli_fetch_array($result))
											{
											    echo "<option value='$row[0]'>$row[2] $row[1] $row[3]</option>";
											}
										?>        
									</select>
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-lg-3 control-label">Intake:</label>
				            <div class="col-lg-8">
				             <?php
										$query = "SELECT student_id, student_name, intake FROM student_db";
										$result = mysqli_query($conn, $query);
								   ?>
									<select class="form-group form-control" data-show-subtext="true" data-live-search="true" id="yr" name="yr" style="margin-left: -1px;" required>
										<option selected="selected" disabled>-- SELECT --</option>
										<?php 
											while ($row = mysqli_fetch_array($result))
											{
											    echo "<option value='$row[0]'>$row[1] $row[2]</option>";
											}
										?>        
									</select>
				            </div>
				          </div>
				         <div class="form-group">
				            <label class="col-lg-3 control-label">Project Title:</label> 
				            <div class="col-lg-8">
							      <?php
										$query = "SELECT project_id, project_title FROM projects_db";
										$result = mysqli_query($conn, $query);
								   ?>
									<select class="form-group form-control" data-show-subtext="true" data-live-search="true" id="prot" name="prot" style="margin-left: -1px;" required>
										<option selected="selected" disabled>-- SELECT --</option>
										<?php 
											while ($row = mysqli_fetch_array($result))
											{
											    echo "<option value='$row[0]'>$row[1] $row[2]</option>";
											}
										?>        
									</select>
				          	</div>
				          </div>
				          
          				  <div class="form-group">
				            <label class="col-lg-3 control-label">First Supervisor:</label> 
				            <div class="col-lg-8">
							      <?php
										$query = "SELECT staff_id, name FROM user WHERE role = 'coordinator' OR role = 'supervisor' ORDER BY name DESC";
										$result = mysqli_query($conn, $query);
								   ?>
									<select class="form-group form-control" data-show-subtext="true" data-live-search="true" id="first" name="first" style="margin-left: -1px;" required>
										<option selected="selected" disabled>-- SELECT --</option>
										<?php 
											while ($row = mysqli_fetch_array($result))
											{
											    echo "<option value='$row[0]'>$row[1] $row[2]</option>";
											}
										?>        
									</select>
				          	</div>
				          </div>
				          <div class="form-group">
				            <label class="col-lg-3 control-label">Second Supervisor:</label> 
				            <div class="col-lg-8">
							      <?php
										$query = "SELECT staff_id, name FROM user WHERE role = 'coordinator' OR role = 'supervisor' ORDER BY name DESC";
										$result = mysqli_query($conn, $query);
								   ?>
									<select class="form-group form-control" data-show-subtext="true" data-live-search="true" id="second" name="second" style="margin-left: -1px;" required>
										<option selected="selected" disabled>-- SELECT --</option>
										<?php 
											while ($row = mysqli_fetch_array($result))
											{
											    echo "<option value='$row[0]'>$row[1] $row[2]</option>";
											}
										?>        
									</select>
				          	</div>
				          </div>
                		 
						        </div>
				          	</div>
				          </div>		          
				          <div class="form-group">
				            <label class="col-md-3 control-label"></label>
				            <div class="col-md-8">
				              <input type="submit" name="submit" class="btn btn-primary" value="Add Project">
				              <span></span>
				              <input type="reset" class="btn btn-default" value="Cancel" onclick="goBack()">
				            </div>
				          </div>
				        </form>
				      </div>
				  </div>
				</div>
				<hr>
			</div>
		</div>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script>
		function goBack() {
			window.location.href = 'coordinatorPage.php';
		}

	</script>
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
	.table-sortable tbody tr {
    	cursor: move;
	}
</style>

<script type="text/javascript">
	$(function(){
	   $('button#showit').on('click',function(){  
	      $('#myform').show();
	      $('#showit').hide();
	      $('#hideit').show();
	   });
	   $('button#hideit').on('click',function(){  
	      $('#myform').hide();
	      $('#showit').show();
	      $('#hideit').hide();
	   });
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
 
      $(".add-more").click(function(){ 
          var html = $(".copy-fields").html();
          $(".after-add-more").after(html);
      });

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
 
    });
</script>

<script type="text/javascript">
	$(function() {
	    $('#alertUser').hide(); 
	    $('#code').change(function() {
	    	var amcode = <?php echo json_encode($mcode); ?>;
	    	 if($('#code').val() == amcode) {
		        $('#alertUser').show(); 
		    } else {
		        $('#alertUser').hide(); 
		    } 
	    });
	});
</script>

<script type="text/javascript">
	$(function() {
	    $('#alertUser').hide(); 
	    $('#name').change(function() {
	    	var amname = <?php echo json_encode($mname); ?>;
			if($('#name').val() == amname) {
		        $('#warnUser').show(); 
		    } else {
		        $('#warnUser').hide(); 
		    } 
	    });
	});	
</script>

<script type="text/javascript">
	function YNconfirm() { 
	 if (window.confirm('Project Allocated!'))
	 {
	   window.location.href = 'coordinatorPage.php';
	 }
	}
</script>

<?php 
	if(isset($_POST['submit'])) {
		$lid = mysqli_insert_id($conn);
		
		$sturoll = mysqli_real_escape_string($conn, $_REQUEST['sturollno']);
		$stu = mysqli_real_escape_string($conn, $_REQUEST['stuname']);
		
		$pro = mysqli_real_escape_string($conn, $_REQUEST['prot']);
		$mfirst = mysqli_real_escape_string($conn, $_REQUEST['first']);
	
		$msecond = mysqli_real_escape_string($conn, $_REQUEST['second']);
		
		$year = mysqli_real_escape_string($conn, $_REQUEST['yr']);
		$programme = mysqli_real_escape_string($conn, $_REQUEST['area']);
		
				$query = "INSERT INTO allocation_project (allocation_id, project_id, student_roll_number,  student_id, first_supervisor_id, second_supervisor_id) VALUES ('". $lid ."', '". $pro ."', '" . $sturoll . "', '". $stu ."', '". $mfirst ."', '". $msecond ."')";

				$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

			
		mysqli_close($conn);
		echo '<script type="text/javascript">','YNconfirm();','</script>';
	}
?>