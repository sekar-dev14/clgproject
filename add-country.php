<?php
include('admin-header.php');
include('admin-menu.php');

/*Add Store Details */
if(isset($_POST['add']))
{
@extract($_POST);


$query=mysql_query("INSERT INTO `country`(country)values('$name')");

if($query)
{
$msg="Country Added Successfully";	
	
}
}

/*Update Store Details */
if(isset($_POST['update']))
{
@extract($_POST);

	
$updatestore=mysql_query("UPDATE `country` SET country='$name' WHERE id='$uid'");		

	
if($updatestore)
{
$msg="Country Updated Successfully.";	
}
	
}

?>

        

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Add Country</h1>
                    
<?php
if($query || $updatestore)
{ 
?>                      
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?=$msg?>
</div>
<?
}
?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
             <div class="row cusmbottom">
                <div class="col-md-12">
            
           <a href="manage-country.php">
       
        <button type="button" class="btn btn-success cusright"><i class="glyphicon glyphicon-th"></i> Manage Country</button></a>
              
            </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Country

                       </div>
                       

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                
                   <?php
				   if(!isset($_GET['eid']))
				   {
				   
				   ?>             
                           
                <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                
                <div class="form-group">
                <label>Country</label>
                <input class="form-control" placeholder="Country" name="name" required="required">
                </div>
                
               
                <input type="submit" name="add" class="btn btn-primary" value="Add Country">
                </form>
                <?
				   }
				   else
				   {
					   $eid=$_GET['eid'];
					   $getimage=mysql_query("SELECT * FROM `country` WHERE id='$eid'");
					   $fetchrow=mysql_fetch_array($getimage);
				   ?>
                
                
                
                 <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                
                <div class="form-group">
                <label>Country</label>
         <input class="form-control" placeholder="Country" name="name" value="<?=$fetchrow['country']?>" required="required">
                </div>
                
                
                   
                
               
                <input type="hidden" name="uid" value="<?=$eid?>" />
                <input type="submit" name="update" class="btn btn-primary" value="Update">
                </form>
                <?
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
        <!-- /#page-wrapper -->
        



<?php
include('admin-footer.php');

?>   