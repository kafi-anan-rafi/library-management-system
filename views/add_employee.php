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
    <title>Add New Employee</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  	<script type="text/javascript" src="../assets/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
  	<script type="text/javascript">
  		function alertMsg(){
  			alert(Book added successfully...);
  			window.location.href = "admin_dashboard.php";
  		}
  	</script>
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
<center><h4>Add a new Employee</h4><br></center>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="" method="post">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hire_date">Hire Date:</label>
                <input type="date" name="hire_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" name="job_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" name="salary" class="form-control">
            </div>
            <div class="form-group">
                <label for="manager_id">Manager ID:</label>
                <input type="text" name="manager_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="department_id">Department ID:</label>
                <input type="text" name="department_id" class="form-control">
            </div>
            <button type="submit" name="add_employee" class="btn btn-primary">Add Employee</button>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
</body>
</html>

<?php
    if(isset($_POST['add_employee']))
    {
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

        $query = "INSERT INTO employees (first_name, last_name, email, phone_number, hire_date, job_title, salary, manager_id, department_id)
                  VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$hire_date', '$job_title', '$salary', '$manager_id', '$department_id')";
        
        $query_run = mysqli_query($connection, $query);
        #header("location:manage_employee.php");
    }
?>
