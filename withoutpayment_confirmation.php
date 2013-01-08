<?php

	include_once 'business_logic/config/configure.php';

	require_once("business_logic/class/form.class.php");

	//$db = new DBConnection;

	$form = new Form();



				$table = "userdetail";

				$pre_table = "pre_userdetail";

				$myCustomField_1  = $Email = $_GET['email'];

				$myCustomField_3 = $_GET['userid'];

				$q="SELECT * FROM `$table` WHERE `$table`.`login` = '{$Email}'" ;

				$rows = $form->getRow($q);

				if(sizeof($rows)>0) {

							$form->message('Emailid is already exist. Please change it and try again.','error');

				}else{

						$q="SELECT * FROM `$pre_table` WHERE `$pre_table`.`UserId` = '{$myCustomField_3}'" ;

						//mail('minesh.patel@spaculus.com','test ap',$q."====");die;

						$rows = $form->getRow($q);

						if($rows['Email'] !="" && sizeof($rows)>0)

						{

								$query = "insert userdetail set 

												usercode = '".$rows['usercode']."', 

												usercode_5_3 = '".$rows['usercode_5_3']."', 

												usercode_10_3 = '".$rows['usercode_10_3']."', 

									

												stream = '".$rows['stream']."', 

												inviter = '".$rows['inviter']."', 

												inviter_5_3 = '".$rows['inviter_5_3']."', 

												inviter_10_3 = '".$rows['inviter_10_3']."', 

												Email = '".$rows['Email']."', 

												UserName = '".$rows['UserName']."', 

												Password = '".$rows['Password']."', 

												

												FirstName = '".$rows['FirstName']."', 

												MiddleName = '".$rows['MiddleName']."', 

												LastName = '".$rows['LastName']."', 

												suffix = '".$rows['suffix']."', 

												Gender = '".$rows['Gender']."', 

												POB = '".$rows['POB']."', 

												POC = '".$rows['POC']."', 

												CountryId = '".$rows['CountryId']."', 

												Mothername = '".$rows['Mothername']."', 

												Phone = '".$rows['Phone']."', 

												Cellphone = '".$rows['Cellphone']."', 

												Addressl1 = '".$rows['Addressl1']."', 

												Addressl2 = '".$rows['Addressl2']."', 

												City = '".$rows['City']."', 

												State = '".$rows['State']."', 

												Zipcode = '".$rows['Zipcode']."', 

												Country = '".$rows['Country']."', 

												skype = '".$rows['skype']."', 

												ap = '".$rows['ap']."', 

												stp = '".$rows['stp']."', 

												login = '".$rows['login']."',

												joindate = '".$rows['joindate']."'

								";

							$sql_result = $form->inser_qry($query);

							//mail('minesh.patel@spaculus.com','test ap',$sql_result."====".$query);die;

							$table = "userdetail";

							$q="SELECT * FROM `$table` WHERE `$table`.`login` = '{$myCustomField_1}'" ;

							$rows = $form->getRow($q);

							//mail('minesh.patel@spaculus.com','test ap',$q);die;

							/*include_once("ap_confirmation.php");

							userdetails($form,$rows['UserId'],$rows['usercode']);*/

								

							$q="SELECT `UserId`,`usercode` FROM `{$table}` WHERE `{$table}`.`login` = '{$myCustomField_1}'" ;

							$result = $form->getRow($q);

							  

						 

							 // if suceesfully inserted data into database, send confirmation link to email

							 //---------------- SEND MAIL FORM ----------------

							

							//commeted as per client requirement for creating fack accounts

							include("function.php");

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

							$HTMLMsg .= "<tr><td>Link:</td><td>".SERVER_URL."confirmation.php?uid=".$result['UserId']."&passkey=".(isset($result['usercode'])?$result['usercode']:$rows['usercode'])."</td></tr>";						$HTMLMsg .= "</table>";

							$TxtMsg ="Your registration is done succesfully";

							//echo $TxtMsg;die;

							$AttFile="";

							$AttFileName ="";

							$AttFileType="";

							//echo $HTMLMsg;die;

							SendMail($FromDisplay,$FromEmail,$ReplyTo,$ToName,$ToEmail,$CCList,$BCCList,$Subject,$HTMLMsg,$TxtMsg, $AttFile, $AttFileName, $AttFileType);

							//$sentmail=mail($ToEmail,$Subject,$TxtMSg,$FromEmail);

							//header("location:login.php");

						}



						?>

						<script type="text/javascript">

							window.location = "thanks.php";

						</script>

						<?php

				}