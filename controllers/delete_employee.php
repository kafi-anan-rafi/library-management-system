<?php
	$connection = mysqli_connect("localhost:3308", "root", "");
	$db = mysqli_select_db($connection, "lms_db");

	if(isset($_GET['eid'])) {
		$employee_id = $_GET['eid'];
		$query = "DELETE FROM employees WHERE employee_id = $employee_id";
		$query_run = mysqli_query($connection, $query);

		if($query_run) {
			echo '<script type="text/javascript">';
			echo 'alert("Employee deleted successfully...");';
			echo 'window.location.href = "../views/manage_employee.php";';
			echo '</script>';
		} else {
			echo '<script type="text/javascript">';
			echo 'alert("Error: Unable to delete employee.");';
			echo 'window.location.href = "../views/manage_employee.php";';
			echo '</script>';
		}
	}
?>
