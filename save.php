<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $sex = $_POST['sex'];
  $employee_types_id = $_POST['employee_types_id'];
		
	// checking empty fields
	if(empty($name) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
    //insert data to database
    //$result = $dbConn->query("SELECT e.id, e.name, e.email, e.phone, e.address, e.sex, e.employee_types_id, et.display_name FROM employees e LEFT JOIN employee_types et ON  e.employee_types_id = et.id ORDER BY e.id DESC");
		$sql = "INSERT INTO employees(name, email, phone, address, sex, employee_types_id) VALUES(:name, :email,  :phone, :address, :sex, :employee_types_id)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':name', $name);
    $query->bindparam(':email', $email);
    $query->bindparam(':phone', $phone);
    $query->bindparam(':address', $address);
    $query->bindparam(':sex', $sex);
    $query->bindparam(':employee_types_id', $employee_types_id);
    $query->execute();
    header("Location: index.php");
    die();
	}
}
?>