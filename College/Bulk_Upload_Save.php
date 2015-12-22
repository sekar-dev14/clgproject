<?php
#ini_set('display_errors','on');
if($session->logged_in && isset($_POST['bulkupload_student']))
{
	include('SendActiveMailToStudent.php');
	$Get_FileProperty 		= $_FILES['bulk_student_list'];
	$Get_FileProperty['type'] 	=  pathinfo(basename($_FILES["bulk_student_list"]["name"]) , PATHINFO_EXTENSION);
	$Allowed_FileFormat		= array('xls','csv');
	$Function_Name = array('xls' => 'read_xlsfile','csv' => 'read_csv');
	$flag = 1;
	if(in_array($Get_FileProperty['type'],$Allowed_FileFormat))
	{
		$flag = 0;
		
		$custom_function = $Function_Name[$Get_FileProperty['type']];
	
		$filename = $Get_FileProperty['tmp_name'];
		$query = $custom_function($filename);	
		if(count($query) > 0 && count($query) < 1000 )
		{
			$affected_rows = bulk_insert($query);
		}
		unlink_uploadedfilefromtemp($Get_FileProperty['tmp_name']);
	}
	foreach($_POST as $key => $val)
		$_POST[$key] = addslashes($val);
	@extract($_POST);
	if($instant_approved !='')
	{
		$flag = 0;
		$temp = explode(',',$instant_approved);
		for($i = 0 ;$i < count($temp); $i++){
			if(filter_var($temp[$i],FILTER_VALIDATE_EMAIL)){
			$query[] = "('','','{$temp[$i]}')";
			}
		}
		if(count($query) > 0)
		$affected_rows = bulk_insert($query);
	}	
	if($flag)
	{
		if(!in_array($Get_FileProperty['type'],$Allowed_FileFormat) && $Get_FileProperty['type'] != '')
		{
			$msg    =       'Only XLS or CSV file are allowed to upload';
			$error  =       1;
			$class  =       'danger';
			$flag   =       1;
		}else
		{ 
			$msg    =       'Please Choose File Or Please enter the student detail in the box.....';
			$error  =       1;
			$class  =       'danger';
			$flag   = 	1;
		}
	
	}else
	{
		$msg    =       'Update Successfully........';
                $error  =       1;
                $class  =       'success';
		$flag   = 	1;

	}
#	header("Location:Bulk_Upload.php");
}
	function moveuploaded_filetotemp($FILEPROPERTY)
	{
		global $session;
		$sessionid = $session->retriveSessionid();
		$filename = '/tmp/'.$sessionid.".".$FILEPROPERTY['type'];
		move_uploaded_file($FILEPROPERTY['tmp_name'],$filename);
		return $filename;
	}

	function unlink_uploadedfilefromtemp($filename)
	{
		return unlink($filename);
	}
	function read_xlsfile($filename) 
	{
		/** PHPExcel_IOFactory */
		include_once('Classes/PHPExcel/IOFactory.php');
		$inputFileName = $filename;	
		try {
			PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$row=0;
		foreach($sheetData as $v =>$i){
			if($row == 0){
				$row = 1;
				continue;
			}
			if(count($i) == 3 && filter_var($i['C'],FILTER_VALIDATE_EMAIL))	
			$query[] = "('".implode("','",$i)."')";					
		}
		
		if(count($query) == 1000){
			bulk_insert($query);
			$query = '';
		}
		return $query;	
		
	}

	function read_csv($filename)
	{
		$f = fopen($filename,"r");
		$row =0;
		while(!feof($f)){
			$fcontent =fgetcsv($f);
			if($row == 0){
				$row=1;
				continue;
			}
			if(count($fcontent) == 3)	
			$query[] = "('".implode("','",$fcontent)."')";
			if(count($query) == 1000){
				bulk_insert($query);
				$query = '';
			}
		}
		return $query;	
	}

	function bulk_insert($query)
	{
		$query_header = "INSERT IGNORE college_studentslist (`name`,`phoneno`,`emailid`) VALUES ";
		$sql = $query_header." ".implode(',',$query);
		$ex = mysql_query($sql);
		sendmailtouser();	
		
	}

	

	
?>
