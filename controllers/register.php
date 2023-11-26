<?php
	$connection = mysqli_connect("localhost:3308","root","");
	$db = mysqli_select_db($connection,"lms_db");
	$query = "insert into librarian values('','$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile],'$_POST[address]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Registration successfull...You may Login now !!");
	window.location.href = "../views/login.php";
</script>