<?php
	session_start();
	if (file_exists('data_connection.php')) {
            header('Location: dz12.php');
	} else {
            header('Location: install.php');
	}