<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost:3308", "root", "");
	$db = mysqli_select_db($connection, "lms_db");
	$employee_id = "";
	$first_name = "";
	$last_name = "";
	$email = "";
	$phone_number = "";
	$hire_date = "";
	$job_title = "";
	$salary = "";
	$manager_id = "";
	$department_id = "";

	$query = "SELECT * FROM employees WHERE employee_id = $_GET[eid]";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$employee_id = $row['employee_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
		$phone_number = $row['phone_number'];
		$hire_date = $row['hire_date'];
		$job_title = $row['job_title'];
		$salary = $row['salary'];
		$manager_id = $row['manager_id'];
		$department_id = $row['department_id'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  	<script type="text/javascript" src="../assets/js/jquery_latest.js"></script>
  	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="librarian_dashboard.php">Library Management System (LMS)</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="view_profile.php">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../controllers/logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<center><h4>Edit Employee</h4><br></center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="employee_id">Employee ID:</label>
					<input type="text" name="employee_id" value="<?php echo $employee_id; ?>" class="form-control" disabled required>
				</div>
				<div class="form-group">
					<label for="first_name">First Name:</label>
					<input type="text" name="first_name" value="<?php echo $first_name; ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="last_name">Last Name:</label>
					<input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="phone_number">Phone Number:</label>
					<input type="text" name="phone_number" value="<?php echo $phone_number; ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="hire_date">Hire Date:</label>
					<input type="date" name="hire_date" value="<?php echo $hire_date; ?>" class="form-control">
				</div>
				<div class="form-group">
					<label for="job_title">Job Title:</label>
					<input type="text" name="job_title" value="<?php echo $job_title; ?>" class="form-control">
				</div>
				<div class="form-group">
					<label for="salary">Salary:</label>
					<input type="text" name="salary" value="<?php echo $salary; ?>" class="form-control">
				</div>
				<div class="form-group">
					<label for="manager_id">Manager ID:</label>
					<input type="text" name="manager_id" value="<?php echo $manager_id; ?>" class="form-control">
				</div>
				<div class="form-group">
					<label for="department_id">Department ID:</label>
					<input type="text" name="department_id" value="<?php echo $department_id; ?>" class="form-control">
				</div>
				<button type="submit" name="update" class="btn btn-primary">Update Employee</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['update'])) {
		$connection = mysqli_connect("localhost:3308", "root", "");
		$db = mysqli_select_db($connection, "lms_db");

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$hire_date = $_POST['hire_date'];
		$job_title = $_POST['job_title'];
		$salary = $_POST['salary'];
		$manager_id = $_POST['manager_id'];
		$department_id = $_POST['department_id'];

		$query = "UPDATE employees SET first_name = '$first_name', last_name = '$last_name', email = '$email', 
				  phone_number = '$phone_number', hire_date = '$hire_date', job_title = '$job_title', 
				  salary = '$salary', manager_id = '$manager_id', department_id = '$department_id' WHERE employee_id = $_GET[eid]";

		$query_run = mysqli_query($connection, $query);
		header("location:manage_employee.php");
	}
?>
