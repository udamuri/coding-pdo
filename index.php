<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//id`, `name`, `email`, `phone`, `address`, `sex`, `employee_types_id`
$result = $dbConn->query("SELECT e.id, e.name, e.email, e.phone, e.address, e.sex, e.employee_types_id, et.display_name FROM employees e LEFT JOIN employee_types et ON  e.employee_types_id = et.id ORDER BY e.id DESC");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

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
				<h1 class="text-center">EMPLOYEE LIST</h1><br><br>
			</div>

			<div class="col-md-12">
				<a class="btn btn-primary pull-right" href="add.php">Add</a><br><br>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">

					<tr bgcolor='#CCCCCC'>
						<td>Name</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Sex</td>
						<td>Employee Type</td>
						<td>Update</td>
					</tr>
					<?php 	
					while($row = $result->fetch(PDO::FETCH_ASSOC)) { 	
						$sex = 	$row['sex'] == 'M' ? 'Male' : 'Female';
						echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['email']."</td>";
						echo "<td>".$row['phone']."</td>";
						echo "<td>".$sex."</td>";
						echo "<td>".$row['display_name']."</td>";	
						echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
					}
					?>
				</table>
			</div>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
