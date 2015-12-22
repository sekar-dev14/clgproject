<?php
	/*== RETRIVE FIELD LABEL NAME FROM MODULE FIELD TABLE ==*/
	$sql = "select fieldname , labelname , uitype , optionvalue from module_fields where tablename = 'student_section' order by sequence;";
	$ex  = mysql_query($sql);
	while($rs  = mysql_fetch_assoc($ex)){	
	$FieldList[] = $rs;	
	$Tablefield[] = $rs['fieldname'];	
	}
	if(isset($_POST['education_info'])){
		foreach($_POST as $key => $val){
			$_POST[$key] = addslashes($val);
		}
		@extract($_POST);
		$sql = "select * from student_section where uid = '".$session->userid."' and id = '$recordId';";
		$ex  = mysql_query($sql);
		if(mysql_num_rows($ex) <= 0){
			$columns[] = "`uid`";
			$values[]  = $session->userid;
			foreach($Tablefield as $key => $columnname){
				if(isset($_POST[$columnname])){
					$columns[] = "`$columnname`";
					$values[]  = "'".$_POST[$columnname]."'";
				}

			}
			echo $sql = "INSERT INTO student_section (".implode(',',$columns).") VALUES (".implode(',',$values).");";	

		}else{
			foreach($Tablefield as $key => $columnname){
				
				if(isset($_POST[$columnname])){
					$values[]  = "`".$columnname."`  = '".$_POST[$columnname]."'";
				}
			}
			$sql = "UPDATE student_section SET ".implode(',' , $values)." where uid = '".$session->userid."' and id = '$recordId';"; 
		}
			mysql_query($sql);
		header("Location: index.php?module=Student&view=VedioInterview");

	}

?>
