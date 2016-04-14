<?php
	function pre($string) {
		echo '<pre>';
		print_r($string);
		echo '</pre>';
	}
        
        function showGet() {
            pre($_GET);
        }
        
        function showPost() {
            pre($_POST);
        }
        
        function showFile() {
            pre($_FILE);
        }
        
        function showServer() {
            pre($_SERVER);
        }