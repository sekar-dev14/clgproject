<?php
include('admin-header.php');
include('admin-menu.php');




?>

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Manage Mail List</h1>
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
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">            
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Manage Country
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>Name</th>
<th>Email Id</th>
<th>College Name</th>
<th>Mail Acknowlegement</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$getimage=mysql_query("SELECT name , emailid , case welcomemail_acknowledgement
							when 0 then 'NOT SENT'
							when 1 then 'ACTIVATION LINK SENT'
							when 2 then 'LOGIN CREDITIONAL SENT'
							when 3 then 'STUDENT LOGIN SUCCESSFULLY'
						END 'status'
			  FROM `college_studentslist` ORDER BY name ");
while($fetchimage=mysql_fetch_array($getimage))
{

	?>  

		<tr  <?php if($i%2==0){?> class="odd gradeX" <?php } else { ?>class="even gradeC" <?php } ?> >
		<td><?php echo $fetchimage['name']?></td>
		<td><?php echo $fetchimage['emailid']?></td>
		<td>XXX XXX XXXX</td>
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

<?php
include('admin-managefooter.php');
?>  
