<?php
	session_start();
	if (isset($_SESSION['dbinstall'])) {
		header('Location: dz9.php');
	} else {
		header('Location: install.php');
	}