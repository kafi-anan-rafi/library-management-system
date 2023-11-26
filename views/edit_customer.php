<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost:3308", "root", "");
	$db = mysqli_select_db($connection, "lms_db");
	$customer_id = "";
	$first_name = "";
	$last_name = "";
	$email = "";
	$phone_number = "";
	$birthdate = "";
	$registration_date = "";

	$query = "SELECT * FROM customers WHERE customer_id = $_GET[cid]";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$customer_id = $row['customer_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
		$phone_number = $row['phone_number'];
		$birthdate = $row['birthdate'];
		$registration_date = $row['registration_date'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Customer</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  	<script type="text/javascript" src="../assets/js/juqery_latest.js"></script>
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
	        		<a class="dropdown-item" href="">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="#">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<center><h4>Edit Customer</h4><br></center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="customer_id">Customer ID:</label>
					<input type="text" name="customer_id" value="<?php echo $customer_id; ?>" class="form-control" disabled required>
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
					<label for="birthdate">Birthdate:</label>
					<input type="date" name="birthdate" value="<?php echo $birthdate; ?>" class="form-control">
				</div>
				<button type="submit" name="update" class="btn btn-primary">Update Customer</button>
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
		$birthdate = $_POST['birthdate'];

		$query = "UPDATE customers SET first_name = '$first_name', last_name = '$last_name', email = '$email', 
				  phone_number = '$phone_number', birthdate = '$birthdate' WHERE customer_id = $_GET[cid]";

		$query_run = mysqli_query($connection, $query);
		header("location:manage_customer.php");
	}
?>
