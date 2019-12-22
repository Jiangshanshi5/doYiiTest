<?php
	session_start();
	unset($_SESSION['xxname']);
	header("Location:../login.php");