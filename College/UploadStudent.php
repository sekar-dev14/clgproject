<?php
include('Bulk_Upload_Save.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
        <h1 class="page-header">Email Bulk Upload</h1>
        <?php
        if($flag)
        { 
        ?>                      
        <div class="alert alert-<?php echo $class; ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $msg;?>
        </div>
        <?php
        }
        ?>
        </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            
<div class="row cusmbottom">
    <div class="col-md-12">
        <a href="index.php?module=College&view=StudentList">
           <button type="button" class="btn btn-success cusright"><i class="glyphicon glyphicon-th"></i> Manage Student List</button>
          </a>
                  
    </div>
</div>
            
<form role="form" method="post" action="index.php" enctype="multipart/form-data">
<input type="hidden" name="module" value="College" />
<input type="hidden" name="view" value="UploadStudent" />
<div class="row">
	<div class="col-lg-6">
	<div class="panel panel-default">
        <div class="panel-heading">
        Email Bulk Upload
        </div>
 <div class="panel-body">
	<div class="row">
	    <div class="col-lg-12">
		<div class="form-group">
		<label>Upload Excel</label><br>
		<span class="example">
		XLS Template &nbsp;<a href="College/studentlist.xls" style="color:blue">xls</a>&nbsp;
		<input class="form-control" type="file" name="bulk_student_list">
		</div>
	    <input type="submit" name="bulkupload_student" class="btn btn-primary" value="Upload Bulk Email">
		</div> <!-- lg 12 -->
	</div> <!-- Row -->
 </div> <!-- panel Body -->
</div> <!-- Row -->
</div> <!-- lg-6 -->
               
                
                
<div class="col-lg-6">
<div class="panel panel-default">
    <div class="panel-heading">
    Add Email (Comma Separation)
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
            <label>Email</label>
            <textarea class="form-control" rows="5" name="instant_approved" ></textarea>
            </div>
            <input type="button" id="validate_email"  class="btn btn-primary" value="Add Email">
            <input type="submit" id="uploademail" name="bulkupload_student" class="btn btn-primary hide" value="Add Email">
        </div>
    </div>
    <!-- /.row (nested) -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-6 -->


</div>
<!-- /.row -->
</form>
</div>
<script>
$("#validate_email").click(function(){
	var mail = ($("[name = 'instant_approved']").val()).split(',');
	var m = new Array();
	var i = 0;
	var flg = 1;
	$.each(mail,function(i,v){
		var f = validateEmail(v);
		if(f){
			m[i] = v;
			i++;
		}else
		{
			alert("INVALID EMAIL FORMATE "+v);
			flg = 0;
			return false;
		}
	});
	
	if(flg){
		$("#uploademail").trigger('click');
	}

});
function validateEmail(email) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return re.test(email);
}
</script>
<!-- /#page-wrapper -->
