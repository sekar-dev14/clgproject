<?php
	/*== RETRIVE FIELD LABEL NAME FROM MODULE FIELD TABLE ==*/
	$sql = "select fieldname , labelname , uitype , optionvalue from module_fields where tablename = 'student_basicinfo' order by sequence;";
	$ex  = mysql_query($sql);
	while($rs  = mysql_fetch_assoc($ex)){	
	$FieldList[] = $rs;	
	$Tablefield[] = $rs['fieldname'];	
	}

	$sql = "select * from student_basicinfo where uid = '".$session->userid."' ;";
	$ex  = mysql_query($sql);
	$rs  = mysql_fetch_assoc($ex);
	foreach($rs as $columnname => $val)
		$f[$columnname] = $val;	
	@extract($f);
	$email   = $session->useremailid;
	$phoneno = $session->phoneno;
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
                    <h1 class="page-header">Basic Info</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Information 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
				<!-- FORM START --->
                                    <form action="index.php" id="form_submition" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="module" value="Student" />
					<input type="hidden" name="action"   value="SaveBasicInfo" />
						<?php include("Libaries/include/Load_Fields.php"); ?>

					<input type="file" id="photo" name="attachment.photo" class="attachment" >
					<input type="file" id="id_proof" name="attachment.id_proof" class="attachment" >
					<input type="file" id="address_proof" name="attachment.address_proof" class="attachment" >
					<input type="file" id="work_proof" name="attachment.work_proof" class="attachment" >
					<div class="col-lg-12">
							<div class="col-lg-3">
						            <div class="panel panel-info show_browsefile" data-type="photo">
						              <div class="panel-heading">
						                <div class="row">
						                  <div class="col-xs-6">
						                    <i class="fa  fa-camera  fa-5x"></i>
								    
						                  </div>
						                  <div class="col-xs-6 text-right">
						                    <p class="announcement-text">Photo</p>
						                  </div>
						                </div>
						              </div>
							    </div>
							 </div>
							 <div class="col-lg-3">
						            <div class="panel panel-info show_browsefile" data-type="id_proof" >
						              <div class="panel-heading">
						                <div class="row">
						                  <div class="col-xs-6">
						                    <i class="fa  fa-camera  fa-5x"></i>
						                  </div>
						                  <div class="col-xs-6 text-right">
						                    <p class="announcement-text">ID Proof</p>
						                  </div>
						                </div>
						              </div>
							    </div>
							 </div>
							 <div class="col-lg-3">
						            <div class="panel panel-info show_browsefile"  data-type="address_proof" >
						              <div class="panel-heading">
						                <div class="row">
						                  <div class="col-xs-6">
						                    <i class="fa fa-book fa-5x"></i>
						                  </div>
						                  <div class="col-xs-6 text-right">
						                    <p class="announcement-text">Address Proof</p>
						                  </div>
						                </div>
						              </div>
							    </div>
							 </div>
							 <div class="col-lg-3">
						            <div class="panel panel-info show_browsefile"  data-type="work_proof">
						              <div class="panel-heading">
						                <div class="row">
						                  <div class="col-xs-6">
						                    <i class="fa fa-book fa-5x"></i>
						                  </div>
						                  <div class="col-xs-6 text-right">
						                    <p class="announcement-text">Work Proof</p>
						                  </div>
						                </div>
						              </div>
							    </div>
							 </div>
					
					</div>						
				
					<div style="text-align:center;margin:5px">
                                        <button type="submit" class="btn btn-primary" name = "basic_info" value='basic_info'>Next</button>
					</div>
				<!-- FORM ENDED HERE -->
                                    </form>
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
