        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Student List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
             <?php
if($deletestore)
{ 
?>                      
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php echo $msg;?>
</div>
<?php
}
?>
            
            <div class="row cusmbottom">
                <div class="col-md-12">
            
           <a href="index.php?module=College&view=UploadStudent"><button type="button" class="btn btn-success cusright"><i class="glyphicon glyphicon-plus"></i> Add Student</button></a>
              
            </div>
            </div>
            <!-- /.row -->
<form method="post">           

		 
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Country
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
				<form method="post"  name="student_fillter" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name= "module" value ="College" />
					<input type="hidden" name= "view" value = "StudentList" />
				
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				  <tbody>
					<tr>
						<td>Degree</td>
						<td>
							<select name="degree" class="form-control picklist">
							<?php
								$sql = "select * from picklist_degree ;";
								$ex  = mysql_query($sql);
					extract($_REQUEST);
								while($rs = mysql_fetch_assoc($ex)){
									echo "<option value='".$rs['pid']."' ".($degree == $rs['pid'] ? 'selected' : '')." >".$rs['value']."</option>";
								}
							?>
							</select>
						</td>
						<td>Specialization</td>
						<td>
							<select name="specialization" class="form-control picklist">
							<?php
								$sql = "select * from picklist_specialization ;";
								$ex  = mysql_query($sql);
					extract($_REQUEST);
								while($rs = mysql_fetch_assoc($ex)){
									echo "<option value='".$rs['pid']."' ".($specialization == $rs['pid'] ? 'selected' : '').">".$rs['value']."</option>";
								}
							?>
							</select>
						</td>
						<td>
							<button type="submit" class="btn btn-primary" value="submit" name="fillter" >S</button>
						</td>
					</tr>
				  </tbody>
				</table>
				</form>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email Id</th>
                                            <th>Phone No</th>
                                            <th>Mail Acknowlegement</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php
					extract($_REQUEST);
					if($degree!='' && $specialization!=''){
					$where="and picklist_degree.pid='".$degree."' and picklist_specialization.pid='".$specialization."'";
					}
				  $i=1;
				  $getimage=mysql_query("select college_studentslist.name , college_studentslist.emailid , college_studentslist.phoneno , picklist_collegename.value 'College Name', picklist_degree.value 'Degree', picklist_specialization.value 'Specialization', case college_studentslist.welcomemail_acknowledgement when 0 then 'NOT SENT' when 1 then 'ACTIVATION LINK SENT' when 2 then 'LOGIN CREDITIONAL SENT' when 3 then 'STUDENT LOGIN SUCCESSFULLY' END 'status' from    college_studentslist left join users on users.username = college_studentslist.emailid left join student_educationinfo on student_educationinfo.uid = users.uid left join picklist_collegename on  picklist_collegename.pid = student_educationinfo.collegename left join picklist_degree on  picklist_degree.pid = student_educationinfo.degree left join picklist_specialization on picklist_specialization.pid = student_educationinfo.specialization where college_studentslist.college = 3 $where");

while($fetchimage=mysql_fetch_array($getimage))
{

								  ?>  
                                    
                            <tr  <?php if($i%2==0){?> class="odd gradeX" <?php } else { ?>class="even gradeC" <?php } ?> >
                              <td><?php echo $fetchimage['name']?></td>
                              <td><?php echo $fetchimage['emailid']?></td>
                              <td><?php echo $fetchimage['phoneno']?></td>
                              <td><?php echo $fetchimage['status']?></td>
                            </tr>
                                        
                                    <?php
									$i++;
								  }
								  ?>
                                        
                                    </tbody>
                                   
                                </table>
                                
                                
                                 
                            </div>
                            <!-- /.table-responsive -->
                            
                       <div class="row cusmbottom">
                <div class="col-md-12">
            
         
     <!-- 
<button type="submit" name="delete" class="btn btn-danger cusright">
  <i class="glyphicon glyphicon-trash"></i> Delete
</button> --!>              
            </div>
            </div>       
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
   </form>       
         
          
        </div>
        <!-- /#page-wrapper -->

