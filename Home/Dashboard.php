<?php
	if($session->userlevel == 6){
		include(__SITE_PATH.'/Home/CollegeDashboard.php');
	}else if($session->userlevel == 5){
		include(__SITE_PATH.'/Home/StudentDashboard.php');

	}

?>
