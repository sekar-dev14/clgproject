 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Basic Info</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           	UPDATE PROFILE 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">


				<?php
				/**
				 * User has submitted form without errors and user's
				 * account has been edited successfully.
				 */
				if(isset($_SESSION['useredit'])){
					unset($_SESSION['useredit']);

					echo "<h1>User Account Edit Success!</h1>";
					echo "<p><b>$session->username</b>, your account has been successfully updated. "
						."<a href=\"main.php\">Main</a>.</p>";
				}
else{
	?>

		<?php
		/**
		 * If user is not logged in, then do not display anything.
		 * If user is logged in, then display the form to edit
		 * account information, with the current email address
		 * already in the field.
		 */
		if($session->logged_in){
			?>

				<h1>User Account Edit : <?php echo $session->username; ?></h1>
				<?php
				if($form->num_errors > 0){
					echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
				}
			?>
				<form action="index.php" method="POST">
				<input type="hidden" name="module" value="User" />
				<input type="hidden" name="view"   value="process" />
				<div class="form-group">	
					<label>Current Password:</label>
					<input type="password" name="curpass" maxlength="30" class="form-control password" value="<?php echo $form->value("curpass"); ?>">	
					<?php echo $form->error("curpass"); ?>
				</div>
				<div class="form-group">
					<label>New Password:</label>
					<input type="password" name="newpass" maxlength="30" class="form-control password" value="<?php echo $form->value("newpass"); ?>">
					<?php echo $form->error("newpass"); ?>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="text" name="email" maxlength="50" class="form-control email" value="<?php
					if($form->value("email") == ""){
						echo $session->userinfo['email'];
					}else{
						echo $form->value("email");
					}
			?>">
				
				<?php echo $form->error("email"); ?>
				</div>
				<div class="form-group">
					<label>fname:</label>
					<input type="text" name="fname" maxlength="30" class="form-control string" value="<?php echo $form->value("fname"); ?>">
					<?php echo $form->error("fname"); ?>
				</div>
				<div class="form-group">
					<label>lname:</label>
					<input type="text" name="lname" maxlength="30" class="form-control string" value="<?php echo $form->value("lname"); ?>">
					<?php echo $form->error("lname"); ?>
				</div>
				<input type="hidden" name="subedit" value="1">

                                        <div style="text-align:center;margin:5px">
                                        <button type="submit" class="btn btn-primary" name = "subedit" value='basic_info'>Update</button>
                                        </div>
                                <!-- FORM ENDED HERE -->
                                    </form>

				<?php
		}
}

?>

                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
                                                                          

