<?php
global $ff;
$ff = fopen('maillog','w');
function sendmailtouser(){	
	include('Activacode_EandD.php');
	global $ff;
//where mailed_on = 0 
	$sql = "select * from college_studentslist where welcomemail_acknowledgement = 0 order by id limit 50 ; ";
	$ex  = mysql_query($sql) or die(mysql_error());
	
	$sendtousers = '';
	while($rs = mysql_fetch_assoc($ex)){
		$sendtousers[$rs['emailid']] = encryptit($rs['emailid']);	
		$activated_userid[] = "'".$rs['id']."'";
			
	}


	$activation_mailheadercontent = file_get_contents(dirname(__FILE__).'/activation_mailheadercontent.html');	
	$activation_mailfootercontent = file_get_contents(dirname(__FILE__).'/activation_mailfootercontent.html');
	foreach($sendtousers as $key => $activationcode){
		$siteurl = SITE_URL."/ActivateStudent.php?activation_code=".$activationcode;
		$content = $activation_mailheadercontent."<br><br>".$siteurl."<br><br>".$activation_mailfootercontent;	
		$mailid = $key;
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: CampusTrack <admin@praveenp.in>';
			$a = mail($mailid,'CAMPUSTRACK-ACTIVATION LINK',$content , $headers);	
	        if($a){
		fwrite($ff,"Email id ==> $mailid  Status ===> success \n\n");
                 }else{
                fwrite($ff,"Email id ==> $mailid  Status ===> failure \n\n");
                 }
		//sendmail function	

	}
	if(count($activated_userid) > 0){
		$sql = "update college_studentslist set mailed_on = '".date('Y-m-d')."' , welcomemail_acknowledgement = 1 where `id` in (".implode(',',$activated_userid).");";
		mysql_query($sql);
	}
}


fclose($ff);		
?>

