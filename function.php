<?

function SendMail($FromDisplay, $FromEmail, $ReplyTo, $ToName, $ToEmail, $CCList, $BCCList, $Subject, $HTMLMsg, $TxtMsg, $AttFile, $AttFileName, $AttFileType)
{
	require_once("class.sendmail.php");

	$myMail = New sendMail();

	$myMail->myName = $FromDisplay;
	$myMail->myFrom = $FromEmail;
	$myMail->ReplyTo = $ReplyTo;
	$myMail->ToName = $ToName;
	$myMail->myTo = $ToEmail;
	$myMail->myCCList = $CCList;
	$myMail->myBCCList = $BCCList;
	$myMail->mySubject =  $Subject;
	$myMail->HTMLMsg = $HTMLMsg;
	$myMail->TxtMsg = $TxtMsg;
	$myMail->AttFile = $AttFile;
	$myMail->AttFileName = $AttFileName;
	$myMail->AttFileType = $AttFileType;

	$myMail->Send();

}
?>