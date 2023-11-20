<?php

		$db_host = "142.93.63.226";
		$db_user = "root";
		$db_pass = "123456";
		$db_name = "miartesano";
		
		$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		
		if (mysqli_connect_error()){
			echo 'error';
		}
			else{
				echo '';
				}

?>
