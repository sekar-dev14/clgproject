<?php
	$site_path = realpath(dirname(__FILE__));
	define ('__SITE_PATH', $site_path);
	include("Libaries/include/session.php");
	/* check if user is login or not means redirect to Login Page */
	foreach($_REQUEST as $key => $val)
		$_REQUEST[$key] = addslashes($val);

	$module		= $_REQUEST['module'];
	$view		= $_REQUEST['view'];
	$action		= $_REQUEST['action'];
	if(!$session->logged_in && !isset($_POST['sublogin']))
	{
		$module = "User";
		$view   = "Login";
	}

	if((($module == '' || $view == '') || ($session->logged_in && ($module == '' || $view == ''))) && $action == '' )
	{
		$module	= "Home";	
		$view   = "Dashboard";
	}
	if($module !='' && $view !='')
	{
		if($view != 'process' && $view != 'Login')
		{
		include("Menu/admin-header.php");
		include('Menu/admin-menu.php');
		}
		$file = __SITE_PATH."/".$module."/".$view.".php";
		if(file_exists($file) == false)
		{
			//condition unauthorised access 
			exit ;
		}else
		{
			include($file);
		}
		if($view != 'process' && $view != 'Login'){
		include("Menu/admin-footer.php");
		}
	}else if($module != '' && $action != ''){
		$file = __SITE_PATH."/".$module."/".$action.".php";
                if(file_exists($file) == false)
                {
                        //condition unauthorised access 
                        exit ;
                }else
                {
                        include($file);
                }

	}

?>	

		
