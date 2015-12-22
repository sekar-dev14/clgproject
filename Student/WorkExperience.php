<?php

	$sql = "select fieldname , labelname , uitype , optionvalue from module_fields where tablename = 'student_workexperience' order by sequence;";
	$ex  = mysql_query($sql);
	while($rs  = mysql_fetch_assoc($ex)){	
	$FieldList[] = $rs;	
	$Tablefield[] = $rs['fieldname'];	
	}
	if($_REQUEST['recordId'] !='')
		$condition = " and id = '".addslashes($_REQUEST['recordId'])."'";
	
	if(!isset($_REQUEST['addNew'])){
	$sql = "select * , id as 'recordId' from student_workexperience where uid = '".$session->userid."' $condition  ;";
	$ex  = mysql_query($sql);
	while($rs = mysql_fetch_assoc($ex)){
	$recordSet[] = $rs;
	}
	foreach($recordSet[0] as $columnname => $val)
		$f[$columnname] = $val;	
	}
	@extract($f);
?>
	<style>
		.hide_it{
			display:none;
		}
	</style>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">WORK EXPERIENCE</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
	<div style="float:right;margin:5px;">
		<a href ="<?php echo SITE_URL."/index.php?module=Student&view=WorkExperience&addNew=NewRecord"; ?>" class="btn btn-primary">Add New</a>&nbsp;&nbsp;&nbsp;
	
	</div>
	<?php 
		if(isset($_REQUEST['addNew']) || count($f) == 0 || $_REQUEST['recordId'] !='' || $fresher == 1 )
		{
	?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           		WORK EXPERIENCE 
                        </div>
                        <div class="panel-body">
                            <div class="row ">
                                <form action="index.php" method="post" id="form_submition" enctype="multipart/form-data" >
				<div class="col-lg-12">
					<div class="col-lg-6">      
					    <span style="display:inline">
						Fresher
					    </span>
					    <span style="display:inline">&nbsp;&nbsp;
						<input type="checkbox" name="fresher" value="1"  <?php if($fresher == 1) echo "checked" ; ?> class="" style="display:inline" />
					    </span>
					</div>
					<div style="clear:both"></div>
				<hr />
				</div>
                                <div class="col-lg-12">
				<!-- FORM START --->
					<div class = "experience_tab <?php if($fresher == 1) echo "hide_it" ?> " >
					<input type="hidden" name="module" value="Student" />
					<input type="hidden" name="action"   value="SaveWorkExperience" />
					<input type="hidden" name="recordId" value="<?php echo $recordId ?>" />

						<?php include("Libaries/include/Load_Fields.php"); ?>

					</div>	
					<div style="text-align:center;margin:5px;clear:both">
						<br><br>	
                                        <button type="submit" class="btn btn-primary" name = "education_info" value='basic_info'>Next</button>
					</div>
				<!-- FORM ENDED HERE -->
                                </div>
                              </form>
                              
                            </div>
			</div>
				<hr>
                            <!-- /.row (nested) -->
		<?php
			}
			
			if(count($f) > 0 )
			{
				$recordSet = '';
				$sql = "select * , id as 'recordId' from student_workexperience where uid = '".$session->userid."' and fresher = 0 ;";
				$ex  = mysql_query($sql);
				while($rs = mysql_fetch_assoc($ex)){
					$recordSet[] = $rs;
				}

		?>
                            <div class="row experience_tab <?php if($fresher == 1) echo "hide_it" ?>">
                                <div class="col-lg-12">
				<!-- FORM START --->
					<?php
				foreach($recordSet as $content){
					@extract($content);
					echo "<div class='row'>";
					$columncount = 1;	
					foreach($FieldList as $columnname => $FIELD){
						if($FIELD['fieldname'] == 'uid')continue;
						@extract($FIELD);
						if($columncount%2 == 1){
						?> 
						<div class="form-group">
						<?php
						}
						?>
							<div class="col-lg-6">	
							 	<label style="font-weight:normal"><?php echo $labelname; ?> : </label> 
							 	<label > <?php echo ucwords($$fieldname); ?></label>
							</div>

							<?php
						if($columncount%2 == 1){
						?>
						</div>
						
						<?php 
						}
						$columncount++ ;	
					}
						?>
							<div style="float:right;marign:10px 15px 10px 10px;">
								<form method="POST" action="index.php">	
									<input type="hidden" name="module" value="Student" />
									<input type="hidden" name="action"   value="SaveWorkExperience" />
									<input type="hidden" name="recordId" value="<?php echo $recordId ?>" />						
								<button class="btn btn-primary" type="submit" name="delete_education_info" value=delete">Delete</button> .
								</form>
							</div>
							<div style="float:right;marign:10px 15px 10px 10px;">
								<a href="<?php echo SITE_URL."/index.php?module=Student&view=WorkExperience&recordId=$recordId"?>" class="btn btn-primary">Edit</a> .
							</div>
						<?php
						echo "</div> <hr>";
					}
					?>
				<!-- FORM ENDED HERE -->
                                </div>
                      	<?php

				}

			?>        
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
	<script >
		$("[name = 'fresher']").change(function(){
			$(".experience_tab").each(function(i,v){
				$(this).removeClass('hide_it');
			});		
			if($(this).is(":checked")){
				$(".experience_tab").hide();
			}else
				$(".experience_tab").show();
		});
	</script>
