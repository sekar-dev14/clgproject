<?php

function getStorename($id)
{
$getsname=mysql_query("SELECT * FROM `stores` WHERE id='$id'");
$fetchsname=mysql_fetch_array($getsname);
return $fetchsname['store_name'];	
	
}

function getCountry($id)
{
$getcountry=mysql_query("SELECT * FROM `country` WHERE id='$id'");
$fetchcountry=mysql_fetch_array($getcountry);
return $fetchcountry['country'];	
	
}


function getCategory($id)
{

$getcategory=mysql_query("SELECT * FROM `store_categories` WHERE id='$id'");
$fetchcategory=mysql_fetch_array($getcategory);
return $fetchcategory['store_category'];	
	
}


function getsubCategory($id)
{

$getscategory=mysql_query("SELECT * FROM `store_subcat` WHERE id='$id'");
$fetchscategory=mysql_fetch_array($getscategory);
return $fetchscategory['subcat'];	
	
}


function getpostCategory($id)
{

$getpostcategory=mysql_query("SELECT * FROM `post_categories` WHERE id='$id'");
$fetchpostcategory=mysql_fetch_array($getpostcategory);
return $fetchpostcategory['post_category'];	
	
}

function get_registerstudent()
{
$sql = "select count(id) from college_studentslist ;";
$ex  = mysql_query($sql);
$rs  = mysql_fetch_array($ex);
return $rs[0];
}
?>
<!DOCTYPE html>

<html>



<head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Campus Track</title>



    <!-- Core CSS - Include with every page -->

    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">



    <!-- Page-Level Plugin CSS - Dashboard -->

    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">



    <!-- SB Admin CSS - Include with every page -->

    <link href="css/sb-admin.css" rel="stylesheet">

    

      <!-- Page-Level Plugin CSS - Tables -->

    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">





  <script src="js/jquery-1.10.2.js"></script>

    <script src="js/bootstrap.min.js"></script>
	
	<style>
		.announcement-bottom .col-xs-8 {
			color: blue !important
		}
	</style>

</head>



<body>



    <div id="wrapper">



   <nav class="navbar navbar-defaulttop navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brandtop" href="index.php?module=Home&view=Dashboard">Campus Track</a>

            </div>

            <!-- /.navbar-header -->



            <ul class="nav navbar-top-links navbar-right">

               <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="index.php?module=User&view=UpdateProfile"><i class="fa fa-user fa-fw"></i> User Profile</a>

                        </li>

                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>

                        </li>

                        <li class="divider"></li>

                        <li><a href="index.php?module=User&view=process"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                        </li>

                    </ul>

                    <!-- /.dropdown-user -->

                </li>

                <!-- /.dropdown -->

            </ul>

            <!-- /.navbar-top-links -->



        </nav>

        <!-- /.navbar-static-top -->
