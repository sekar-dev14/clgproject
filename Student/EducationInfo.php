<?php

	$sql = "select fieldname , labelname , uitype , optionvalue from module_fields where tablename = 'student_educationinfo' order by sequence;";
	$ex  = mysql_query($sql);
	while($rs  = mysql_fetch_assoc($ex)){	
	$FieldList[] = $rs;	
	$Tablefield[] = $rs['fieldname'];	
	}
	if($_REQUEST['recordId'] !='')
		$condition = " and id = '".addslashes($_REQUEST['recordId'])."'";
	
	if(!isset($_REQUEST['addNew'])){
	$sql = "select * , id as 'recordId' from student_educationinfo where uid = '".$session->userid."' $condition  ;";
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
		.attachment{
			visibility:hidden;
			display:none;
		}
		.attachement_preview{
			width:100%;
			height:auto;
			position:relative;
		}
	</style>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">EDUCATION INFO</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
	<div style="float:right;margin:5px;">
		<a href ="<?php echo SITE_URL."/index.php?module=Student&view=EducationInfo&addNew=NewRecord"; ?>" class="btn btn-primary">Add New</a>&nbsp;&nbsp;&nbsp;
	 	<a href="<?php echo SITE_URL."/index.php?module=Student&view=WorkExperience" ?>" class="btn btn-primary" >Next</a>
	
	
	</div>
	<?php 
		if(isset($_REQUEST['addNew']) || count($f) == 0 || $_REQUEST['recordId'] !='' )
		{
	?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           	EDUCATION INFO 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
				<!-- FORM START --->
                                    <form action="index.php" id="form_submition"  method="post" enctype="multipart/form-data" >
					<input type="hidden" name="module" value="Student" />
					<input type="hidden" name="action"   value="SaveEducationInfo" />
					<input type="hidden" name="recordId" value="<?php echo $recordId ?>" />
				
						<?php include("Libaries/include/Load_Fields.php"); ?>
	
					<input type="file" id="education_certificate" name="attachment.education_certificate" class="attachment" >
					<div class="col-lg-12">
							<div class="col-lg-3">
						            <div class="panel panel-info show_browsefile" data-type="education_certificate">
						              <div class="panel-heading">
						                <div class="row">
						                  <div class="col-xs-6">
						                    <i class="fa  fa-camera  fa-5x"></i>
								    
						                  </div>
						                  <div class="col-xs-6 text-right">
						                    <p class="announcement-text">Upload Certificate</p>
						                  </div>
						                </div>
						              </div>
							    </div>
							 </div>
					</div>	
					<div style="text-align:center;margin:5px;clear:both">
						<br><br>	
                                        <button type="submit" class="btn btn-primary" name = "education_info" value='basic_info'>Next</button>
					</div>
				<!-- FORM ENDED HERE -->
                                    </form>
                                </div>
                              
                            </div>
			</div>
				<hr>
                            <!-- /.row (nested) -->
		<?php
			}
			
			if(count($f) > 0 )
			{
				$recordSet = '';
				$sql = "select * , id as 'recordId' from student_educationinfo where uid = '".$session->userid."' ;";
				$ex  = mysql_query($sql);
				while($rs = mysql_fetch_assoc($ex)){
					$recordSet[] = $rs;
				}

		?>
                            <div class="row">
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
								<a href="<?php echo SITE_URL."/index.php?module=Student&view=EducationInfo&recordId=$recordId"?>" class="btn btn-primary">Edit</a> .
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

	<script type="text/javascript">
	function readURL(input,targ) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				var html = "<img class='attachement_preview' src='"+e.target.result+"' >"			
				$("[data-type='"+targ+"']").html(html);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(".show_browsefile").click(function(){
		var t = $(this).attr('data-type');
		$("#"+t).trigger('click');
	})

	$(".attachment").change(function(){
			readURL(this,$(this).attr('id'));
			});

	</script>
