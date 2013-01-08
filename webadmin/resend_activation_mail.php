<?php
		include_once '../business_logic/config/configure.php';  
		require_once("../business_logic/class/form.class.php");
		//$db = new DBConnection;
		$form = new Form();
				$table = "userdetail";
				$usersid = $_POST['usersid']; 
				$qry="SELECT * FROM `$table` WHERE `$table`.`UserId` = '{$usersid}'" ;
				$rows = $form->getRow($qry);
				if(sizeof($rows)>0) {
						
							 // if suceesfully inserted data into database, send confirmation link to email
							 //---------------- SEND MAIL FORM ----------------
							
							//commeted as per client requirement for creating fack accounts
							include("../function.php");
							$FromDisplay="";
							$FromEmail = "admin@MLM.com";
							//echo $FromEmail;die;
							$ReplyTo="";
							$ToName = $rows['FirstName']." ".$rows['LastName'];
							$ToEmail = $Email;	//echo $ToEmail;die;
							$CCList = "";
							$BCCList = "";
							$Subject ="Registration";
							//$HTMLMsg = "<table align='center' border='1'><tr><td>Email Address:</td><td>".$_POST['Login']."</td></tr>";
							$HTMLMsg = "<table align='center' border='1'><tr><td>Email Address:</td><td>".$Email."</td></tr>";
							$HTMLMsg = "<tr><td>Email Address:</td><td>Activation Successfully done. If not then please click on below link </td></tr>";
							$HTMLMsg .= "<tr><td>Link:</td><td>".SERVER_URL."confirmation.php?uid=".$rows['UserId']."&passkey=".($rows['usercode']))."</td></tr>";
							$HTMLMsg .= "</table>";
							$TxtMsg ="Your registration is done succesfully";
							//echo $TxtMsg;die;
							$AttFile="";
							$AttFileName ="";
							$AttFileType="";
							//echo $HTMLMsg;die;
							if(SendMail($FromDisplay,$FromEmail,$ReplyTo,$ToName,$ToEmail,$CCList,$BCCList,$Subject,$HTMLMsg,$TxtMsg, $AttFile, $AttFileName, $AttFileType));
							{
								echo "send";
							}
							else
							{
								echo "fail";
							}
				}
				else
				{
					echo "check_user";
				}
?>