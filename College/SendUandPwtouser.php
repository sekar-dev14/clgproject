<?php
include("Activacode_EandD.php");
function process($activation_code){
	$activation_code = str_replace(' ','+',$activation_code);	
	$t = $activation_code;
	$decryptcodevalue = decryptIt($t);
	check_itvalid($decryptcodevalue);
}

function check_itvalid($decryptcodevalue){
	global $session , $form;	
	if($decryptcodevalue){

		$sql = "select emailid , welcomemail_acknowledgement , phoneno from college_studentslist where emailid = '$decryptcodevalue' and welcomemail_acknowledgement >= 1 ; ";
		$ex  = mysql_query($sql);
		$rs  = mysql_fetch_assoc($ex);

		if($rs['emailid'] != '' && $rs['welcomemail_acknowledgement'] == 1){
			$emailid = $rs['emailid'];
			$phoneno = $rs['phoneno'];
			$pwd = rand(6,99999);
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$content = " User Name : $emailid <br> Password : $pwd <br>";
			$headers .= 'From: CampusTrack <admin@praveenp.in>';
			$session->register($emailid,$pwd,$emailid,$phoneno,'5');
			mail($emailid,'ACCOUNT INFORMATION',$content , $headers);	
			$sql = "update college_studentslist set welcomemail_acknowledgement = 2 where emailid = '$decryptcodevalue' ; ";
			mysql_query($sql);
	
?>
			<script>alert("Username and Pasword Sent To Your Registered Mail Id <?php echo $rs['emailid'] ?>");
			window.location.replace("<?php echo SITE_URL;?>");
			</script>
				<?php
		}else if($rs['welcomemail_acknowledgement'] == 2){
			?>
			<script>alert("Activation Link Already Sent To This Email Id <?php echo $rs['emailid'] ?>");
			window.location.replace("<?php echo SITE_URL;?>");
			</script>
				<?php
		}
		else
		{
			?>
			<script>alert("INVALID REQUEST");
			window.location.replace("<?php echo SITE_URL;?>");
			</script>
				<?php
		}
	}	


}	


?>
