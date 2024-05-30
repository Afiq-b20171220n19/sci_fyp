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
	// ?>
<!--  -->	<?php
		// $get = "SELECT module_code, module_name FROM module;";
		// $got = mysqli_query($conn, $get);
		// 
		// while($read = mysqli_fetch_array($got)) { 
        	// $mcode = $read['module_code'];
        	// $mname = $read['module_name'];
		// }
	// ?>
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
				    <h1>Add New Project</h1>
				  	<hr>
					<div class="row">
				      <div class="col-md-9 personal-info">
				        <h3> </h3>
				        <form class="form-horizontal" role="form" method="post">
				       
				   
				          <div class="form-group">
				            <label class="col-lg-3 control-label">Project Title:</label>
				            <div class="col-lg-8">
				              <input class="form-control" type="text" id="protitle" name="protitle" required>
				            </div>
				          </div>
			          
				          <div class="form-group">
				            <label class="col-lg-3 control-label">project short synopsis:</label>
				            <div class="col-lg-8">
				              <textarea class="form-control" onkeyup="textCounter(this,'counter',250);" type="text" id="text" name="description" rows="5" required></textarea>
				              <input disabled maxlength="3" size="3" value="44" id="counter">
					      		<small>Characters remaining.</small>
					      		<script>
									function textCounter(field,field2,maxlimit)
									{
									 	var countfield = document.getElementById(field2);
									 	if ( field.value.length > maxlimit ) {
									  		field.value = field.value.substring( 0, maxlimit );
									  		return false;
									 	} else {
									  		countfield.value = maxlimit - field.value.length;
									 	}
									}
						  		</script>
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
	function YNconfirm() { 
	 if (window.confirm('Project Added!'))
	 {
	   window.location.href = 'coordinatorPage.php';
	 }
	}
</script>

<?php 
	if(isset($_POST['submit'])) {
		$pid = mysqli_insert_id($conn);
		$ptitle = mysqli_real_escape_string($conn, $_REQUEST['protitle']);
		$pdesc = mysqli_real_escape_string($conn, $_REQUEST['description']);
		
	
		
				$query = "INSERT INTO projects_db (project_id, project_title, project_details) VALUES ('". $pid ."', '". $ptitle ."', '" . $pdesc . "')";

				$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		mysqli_close($conn);
		echo '<script type="text/javascript">','YNconfirm();','</script>';
	}
?>