<?php
	session_start();
	if (file_exists('data_connection.php')) {
            header('Location: dz10.php');
	} else {
            header('Location: install.php');
	}