<?php
session_start();
$connection = mysqli_connect("localhost:3308", "root", "");
$db = mysqli_select_db($connection, "lms_db");

// Retrieve the customer ID from the URL parameter
$customer_id = $_GET['cid'];

// Query to fetch customer details based on the customer ID
$query = "SELECT * FROM customers WHERE customer_id = $customer_id";
$query_run = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($query_run);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <script type="text/javascript" src="../assets/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="../views/librarian_dashboard.php">Library Management System (LMS)</a>
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

<span><marquee>This is library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>
<!-- Display customer details -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Customer Details</h1>
                    <p class="card-text"><strong>Customer ID:</strong> <?php echo $row['customer_id']; ?></p>
                    <p class="card-text"><strong>First Name:</strong> <?php echo $row['first_name']; ?></p>
                    <p class="card-text"><strong>Last Name:</strong> <?php echo $row['last_name']; ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p class="card-text"><strong>Phone Number:</strong> <?php echo $row['phone_number']; ?></p>
                    <p class="card-text"><strong>Birthdate:</strong> <?php echo $row['birthdate']; ?></p>
                    <p class="card-text"><strong>Registration Date:</strong> <?php echo $row['registration_date']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
