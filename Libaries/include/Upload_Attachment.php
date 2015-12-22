<?php
		$allowed_type = array('jpg','jpeg','png');
		foreach($_FILES as $key => $FILE_PROP){
			$temp = explode("_",$key,2);
			$attachment_type = $temp[1];
		
			if(!file_exists($attachment_type)){
				mkdir("Storage/".$attachment_type);
			}	
			$target_path 	= "Storage/".$attachment_type;
			$fileinfo    	= $target_path."/".basename($FILE_PROP["name"]);
			$filetype   	=  pathinfo($fileinfo, PATHINFO_EXTENSION);
			if(in_array($filetype,$allowed_type)){
				to_unlinkfile($attachment_type);	
				$filename = "Storage/$attachment_type/$attachment_type"."_".date("Y-m-d-H:i:s").".".$filetype;
				$FILE_PROP['tmp_name']."<br>";
				if(move_uploaded_file($FILE_PROP['tmp_name'],$filename)){
					$sql = "INSERT INTO student_attachment VALUES('','".$session->userid."','$attachment_type','$filename');";
					mysql_query($sql);
				}
			}
		}

		function to_unlinkfile($attachment_type){
			global $session;
			$sql = "select filename , attachment_type from student_attachment where uid = '".$session->userid."' and attachment_type = '$attachment_type'";
			$ex  = mysql_query($sql);
			if(mysql_num_rows($ex) > 0){
				$rs  = mysql_fetch_assoc($ex);
				unlink($rs['filename']);
				$sql = "delete from student_attachment where uid = '".$session->userid."' and attachment_type = '$attachment_type'";
				mysql_query($sql);
			}
		}



?>
