<?php
	$connection = mysqli_connect("localhost:3308", "root", "");
	$db = mysqli_select_db($connection, "lms_db");

	if(isset($_GET['cid'])) {
		$customer_id = $_GET['cid'];
		$query = "DELETE FROM customers WHERE customer_id = $customer_id";
		$query_run = mysqli_query($connection, $query);

		if($query_run) {
			echo '<script type="text/javascript">';
			echo 'alert("Customer deleted successfully...");';
			echo 'window.location.href = "../views/manage_customer.php";';
			echo '</script>';
		} else {
			echo '<script type="text/javascript">';
			echo 'alert("Error: Unable to delete customer.");';
			echo 'window.location.href = "../views/manage_customer.php";';
			echo '</script>';
		}
	}
?>
