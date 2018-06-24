<?php
include_once("config.php");

//selecting data associated with this particular id
$sql = "SELECT * FROM employee_types";
$query = $dbConn->prepare($sql);
$query->execute();
$options = '';
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$options .= '<option value="'.$row['id'].'">'.$row['display_name'].'</option>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADD Data</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">EMPLOYEE ADD/EDIT</h1><br><br>
			</div>
		</div>
 
		<div class="row">
			<div class="col-md-12">
				<form action="save.php" method="post" name="form1">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Name">
					</div>
					<div class="form-group">
					  <label for="email">Email</label>
					  <input type="email" name="email" class="form-control" id="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea name="address" class="form-control" id="address" placeholder="Address"></textarea>
					</div>
					<div class="form-group">
						<label for="sex">Sex</label>
						<select name="sex" class="form-control" id="sex" placeholder="Sex">
							<option value="M">Male</option>
							<option value="F">Female</option>
						</select>
					</div>
					<div class="form-group">
            <label for="employee_types_id">Employee Type</label>
            <select class="form-control" id="employee_types_id" name="employee_types_id" >
						  <?=$options;?>
					  </select>
					</div>
					<br><br><br>
					<button type="submit" class="btn btn-default text-center" name="Submit">Save</button>
					<br><br><br>
				  </form>
			</div>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

