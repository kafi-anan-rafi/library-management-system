<?php
	function get_author_count(){
		$connection = mysqli_connect("localhost:3308","root","");
		$db = mysqli_select_db($connection,"lms_db");
		$author_count = 0;
		$query = "select count(*) as author_count from authors";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$author_count = $row['author_count'];
		}
		return($author_count);
	}

	function get_customer_count(){
		$connection = mysqli_connect("localhost:3308","root","");
		$db = mysqli_select_db($connection,"lms_db");
		$customer_count = 0;
		$query = "select count(*) as customer_count from customers";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$customer_count = $row['customer_count'];
		}
		return($customer_count);
	}

	function get_book_count(){
		$connection = mysqli_connect("localhost:3308","root","");
		$db = mysqli_select_db($connection,"lms_db");
		$book_count = 0;
		$query = "select count(*) as book_count from books";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$book_count = $row['book_count'];
		}
		return($book_count);
	}

	function get_employee_count(){
		$connection = mysqli_connect("localhost:3308","root","");
		$db = mysqli_select_db($connection,"lms_db");
		$employee_count = 0;
		$query = "select count(*) as employee_count from employees";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$employee_count = $row['employee_count'];
		}
		return($employee_count);
	}

	function get_category_count(){
		$connection = mysqli_connect("localhost:3308","root","");
		$db = mysqli_select_db($connection,"lms_db");
		$cat_count = 0;
		$query = "select count(*) as cat_count from category";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$cat_count = $row['cat_count'];
		}
		return($cat_count);
	}
?>