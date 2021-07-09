<?php
	require_once 'conn.php';
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
 
			$conn->query("INSERT INTO `task` VALUES(null, '$task', '', 0)");
			echo 'Add!';
            header('location:index.php');
		}
	}
?>