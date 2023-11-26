<?php
	require("../controllers/functions.php");
	session_start();

	$connection = mysqli_connect("localhost:3308", "root", "");
	$db = mysqli_select_db($connection, "lms_db");

	$name = "";
	$email = "";
	$mobile = "";
	$query = "SELECT * FROM librarian WHERE email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Customers</title>
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
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">
			
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item">
		        <a class="nav-link" href="librarian_dashboard.php">Dashboard</a>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Books </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_book.php">Add New Book</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_book.php">Manage Books</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Customers </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_customer.php">Add New Customers</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_customer.php">Manage Customers</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Employee</a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_employee.php">Add New Employee</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_employee.php">Manage Employee</a>
	        	</div>
		      </li>
	          <li class="nav-item">
		        <a class="nav-link" href="issue_book.php">Issue Book</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<center><h4>Manage Customers</h4><br></center>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Birthdate</th>
						<th>Registration Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php
					$query = "SELECT * FROM customers";
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						?>
						<tr>
							<td><?php echo $row['first_name']; ?></td>
							<td><?php echo $row['last_name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['phone_number']; ?></td>
							<td><?php echo $row['birthdate']; ?></td>
							<td><?php echo $row['registration_date']; ?></td>
							<td>
								<button class="btn"><a href="../models/customer.php?cid=<?php echo $row['customer_id']; ?>">View</a></button>
								<button class="btn"><a href="edit_customer.php?cid=<?php echo $row['customer_id']; ?>">Edit</a></button>
								<button class="btn"><a href="../controllers/delete_customer.php?cid=<?php echo $row['customer_id']; ?>">Delete</a></button>
							</td>
						</tr>
						<?php
					}
				?>
			</table>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>
</html>
