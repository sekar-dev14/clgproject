<?php
include('admin-header.php');
include('admin-menu.php');


if(isset($_POST['delete']))
{
$did=$_POST['all'];

foreach($did as $sid)
{
$deletestore=mysql_query("DELETE FROM `country` WHERE id='$sid'");

if($deletestore)
{
$msg="CountryDeleted Successfully";	
	
}
	
}
	
	
}




?>
<script language="JavaScript"> 
function selectAll(source) 
{ 
checkboxes = document.getElementsByName('all[]'); 
for(var i in checkboxes) 
checkboxes[i].checked = source.checked; 
} 
</script>
       

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Country</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
             <?php
if($deletestore)
{ 
?>                      
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?=$msg?>
</div>
<?
}
?>
            
            <div class="row cusmbottom">
                <div class="col-md-12">
            
           <a href="add-country.php"><button type="button" class="btn btn-success cusright"><i class="glyphicon glyphicon-plus"></i> Add Country</button></a>
              
            </div>
            </div>
            <!-- /.row -->
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">            
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
                                            <th>CountryName</th>
                                             
                                           
                                            <th>Edit</th>
                                        <th><input type="checkbox" id="selectall" class="text-center" onclick="selectAll(this)" /></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php
								  $i=1;
								  $getimage=mysql_query("SELECT * FROM `country` ORDER BY id DESC");
								  while($fetchimage=mysql_fetch_array($getimage))
								  {
								  
								  ?>  
                                    
                            <tr  <?php if($i%2==0){?> class="odd gradeX" <? } else { ?>class="even gradeC" <? } ?> >
                              <td><?=$fetchimage['country']?></td>
                            
                            
                            
                            
               <td align="center"><a href="add-country.php?eid=<?=$fetchimage['id']?>"><i class="fa fa-pencil-square-o"></i></a></td>
                            
                            
                            <td><input type="checkbox" id="all" name="all[]" value="<?=$fetchimage['id']?>" /></td>
                            </tr>
                                        
                                    <?
									$i++;
								  }
								  ?>
                                 
                                  
                                       
                                        
                                    </tbody>
                                   
                                </table>
                                
                                
                                 
                            </div>
                            <!-- /.table-responsive -->
                            
                       <div class="row cusmbottom">
                <div class="col-md-12">
            
         
      
<button type="submit" name="delete" class="btn btn-danger cusright">
  <i class="glyphicon glyphicon-trash"></i> Delete
</button>              
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
