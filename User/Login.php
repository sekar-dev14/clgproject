<?php
if($session->logged_in)
{
	header('Location:index.php');   
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Track</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
<div class="container-fluid" id="loginheader">
Campus Track
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">CampusTrack Admin</h3>
                    </div>
                    <div class="panel-body">
                    
                        <form role="form" method="post" action="index.php">
				<input type="hidden" name = "module" value = "User" />
				<input type="hidden" name = "view"   value = "process" />	
                            <fieldset>
                                <div class="form-group">
               <input type="text" class="form-control" placeholder="Username" name="user" maxlength="30" value="<?php echo $form->value("user"); ?>" autofocus><br><?php echo $form->error("user"); ?>
                                </div>
                                <div class="form-group">
               <input class="form-control" placeholder="Password" type="password" name="pass" maxlength="30" value="<?php echo $form->value("pass"); ?>"><br><?php echo $form->error("pass"); ?>
                                </div>
                               <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="hidden" name="sublogin" value="1">
<input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid" id="loginfooter">
Campus Track @ All Rights Reserved 2015
</div>
    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>

