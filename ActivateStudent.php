<?php
	include('Libaries/include/session.php');
	$activation_code =$_GET['activation_code'];

	if($activation_code !=''){
		include('College/SendUandPwtouser.php');
		process($activation_code);
	}

?>
