<?

//echo "true";die;
class sendMail {

	var $myName="";
	var $myFrom="";
	var $ReplyTo="";
	var $ToName="";
	var $myTo="";
	var $myCCList="";
	var $myBCCList="";
	var $mySubject="";
	var $HTMLMsg="";
	var $TxtMsg="";
	var $AttFile="";
	var $AttFileName="";
	var $AttFileType="";

	Function Send()
	{
		# multipart/mixed - Attachments
		# multipart/alternative - HTML and Text messages
		# multipart/relative - for embedding images etc in message

		$myBoundry1 = "key_boundry1_".md5(time());
		$myBoundry2 = "key_boundry2_".md5(time());

		if(strlen(trim($this->ReplyTo)) == 0)
			$this->ReplyTo = $this->myTo;

		$headers = "From: ".$this->myName." <".$this->myFrom.">\n";
		$headers .= "Reply-To: ".$this->ReplyTo."\n";
		$headers .= "X-Sender: <".$this->myFrom.">\n";
		$headers .= "X-Mailer: PHP\n"; // mailer
		$headers .= "Return-Path: <".$this->myFrom.">\n";  // Return path for errors

		if(isset($this->myCCList) && strlen(trim($this->myCCList)) > 0)
			$headers .= "cc: $this->myCCList\n";

		if(isset($this->myBCCList) && strlen(trim($this->myBCCList)) > 0)
			$headers .= "bcc: $this->myBCCList\n";

		# -- If attachment is present then multipart / mixed.

		if(strlen(trim($this->AttFileName))> 0 && is_file($this->AttFile) && file_exists($this->AttFile))
		{
			$headers .= "MIME-Version: 1.0\n";
			$headers .= $this->getBoundary("multipart/mixed",$myBoundry1);

			$message = "\nThis is a multi-part message in MIME format.";

			# HTML version of message present than multipart / alternative else send the text only message

			if(strlen(trim($this->HTMLMsg)) > 0)
			{
				$message .= $this->startBoundary($myBoundry1);
				$message .= $this->getBoundary("multipart/alternative",$myBoundry2);

				$message .= $this->startBoundary($myBoundry2);
				$message .= $this->getCType("text/plain","iso-8859-1","7bit");

				# if text version of msg not present, convert HTML message to text format.

				if(strlen(trim($this->TxtMsg)) >0) {
					$message .= $this->TxtMsg;
				}else	{
					$message .= $this->getTextContent($this->HTMLMsg);
				}

				$message .= $this->startBoundary($myBoundry2);
				$message .= $this->getCType("text/html","iso-8859-1","7bit");
				$message .= $this->HTMLMsg;

				$message .= $this->closeBoundary($myBoundry2);
			}
			elseif(strlen(trim($this->TxtMsg)) >0)
			{
				$message .= $this->startBoundary($myBoundry1);
				$message .= $this->getCType("text/plain","iso-8859-1","7bit");
				$message .= $this->TxtMsg;
			}

			# -- this can be repeated for as many attachments as needed.
			# ---------

			$message .= $this->startBoundary($myBoundry1);
			$message .= $this->doAttach($this->AttFile,$this->AttFileName,$this->AttFileType);
			$message .= $this->closeBoundary($myBoundry1);

			# -----------------
		}
		elseif(strlen(trim($this->HTMLMsg)) > 0)
		{
			$headers .= "MIME-Version: 1.0\n";
			$headers .= $this->getBoundary("multipart/alternative",$myBoundry1);

			$message = "\nThis is a multi-part message in MIME format.";

			$message .= $this->startBoundary($myBoundry1);
			$message .= $this->getCType("text/plain","iso-8859-1","7bit");

			# if text version of msg not present, convert HTML message to text format.

			if(strlen(trim($this->TxtMsg)) >0) {
				$message .= $this->TxtMsg;
			}else	{
				$message .= $this->getTextContent($this->HTMLMsg);
			}

			$message .= $this->startBoundary($myBoundry1);
			$message .= $this->getCType("text/html","iso-8859-1","7bit");
			$message .= $this->HTMLMsg;

			$message .= $this->closeBoundary($myBoundry1);
		}
		elseif(strlen(trim($this->TxtMsg)) > 0)
		{
			$headers .= $this->getCType("text/plain","iso-8859-1","7bit");
			$message = $this->TxtMsg;
		}
		# ---------

		$receipient = $this->myTo;
		$subject = $this->mySubject;

		if(strlen($message) > 0)
		{
			mail($receipient,$subject,$message,$headers);
		}
	}

	private Function getBoundary($CType,$Boundary)
	{
		$myvar = "Content-Type: ".$CType.";\n";
		$myvar .= " boundary=\"".$Boundary."\"\n\n";

		return $myvar;
	}

	private Function startBoundary($Boundary)
	{
		$myvar = "\n\n--".$Boundary."\n";
		return $myvar;
	}

	private Function closeBoundary($Boundary)
	{
		$myvar = "\n\n--".$Boundary."--\n\n";
		return $myvar;
	}

	private Function doAttach($FPath,$FName,$FType)
	{
		$file = fopen($FPath,'rb');
		$data = fread($file,filesize($FPath));
		fclose($file);
		$data = chunk_split(base64_encode($data));

		$myvar = "Content-Type: ".$FType.";\n";
		$myvar .= " name=\"".$FName."\"\n";
		$myvar .= "Content-Disposition: attachment\n";
		$myvar .= " filename=\"".$FName."\"\n";
		$myvar .= "Content-Transfer-Encoding: base64\n\n";
		$myvar .= $data;

		return $myvar;
	}

	private Function getCType($CType,$Charset,$CEncode)
	{
		$myvar = "Content-Type: ".$CType."; charset=\"".$Charset."\"\n";
		$myvar .= "Content-Transfer-Encoding: ".$CEncode."\n\n";

		return $myvar;
	}

	private Function getTextContent($myC)
	{
		$myvar = strip_tags($myC);
		//$myvar = str_replace("\n","",$myvar);
		$myvar = str_replace("\t","",$myvar);
		$myvar = str_replace("&nbsp;","",$myvar);

		return $myvar;
	}

}
?>
