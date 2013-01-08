<?php
/**
 * 
 * Sample IPN V2 Handler for Item Payments
 * 
 * The purpose of this code is to help you to understand how to process the Instant Payment Notification 
 * variables for a payment received through AlertPay's buttons and integrate it in your PHP site. The following
 * code will ONLY handle ITEM payments. For handling IPNs for SUBSCRIPTIONS, please refer to the appropriate
 * sample code file.
 *	
 * Put this code into the page which you have specified as Alert URL.
 * The conditional blocks provide you the logical placeholders to process the IPN variables. It is your responsibility
 * to write appropriate code as per your requirements.
 *	
 * If you have any questions about this script or any suggestions, please visit us at: dev.alertpay.com
 * 
 *
 * THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY
 * OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE IMPLIED WARRANTIES OF FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * @author AlertPay
 * @copyright 2011
 */
//echo "hello";die;

include_once 'business_logic/config/configure.php';
require_once("business_logic/class/form.class.php");

    define("AP_URL","https://sandbox.Payza.com/sandbox/payprocess.aspx");
	define("AP_MERCHANT","seller_1_minesh.patel@spaculus.com");
$form = new Form();

//include ("com_function.php");


$ldate2 = date("Y-m-d H:i:s");
 	//The value is the url address of IPN V2 handler and the identifier of the token string 
	define("IPN_V2_HANDLER", "https://sandbox.Payza.com/sandbox/IPN2.ashx");
	define("TOKEN_IDENTIFIER", "token=");
	
	// get the token from Alertpay
	$token = urlencode($_REQUEST['token']);
     //echo $token; die;
	//preappend the identifier string "token=" 
	$token = TOKEN_IDENTIFIER.$token;
	
	/**
	 * 
	 * Sends the URL encoded TOKEN string to the Alertpay's IPN handler
	 * using cURL and retrieves the response.
	 * 
	 * variable $response holds the response string from the Alertpay's IPN V2.
	 */
	
	$response = '';
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, IPN_V2_HANDLER);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $token);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$response = curl_exec($ch);

	curl_close($ch);
	//echo strlen($response); 
	//die;
	//mail('minesh.patel@spaculus.com','test ap',$response);die;

	if(strlen($response) > 0)
	{
		if(urldecode($response) == "INVALID TOKEN")
		{
			echo "the token is not valid";
		}
		else
		{
			//mail('minesh.patel@spaculus.com','test ap',$response);die;
			//urldecode the received response from Alertpay's IPN V2
			$response = urldecode($response);
			
			//split the response string by the delimeter "&"
			$aps = explode("&", $response);
				
			//define an array to put the IPN information
			$info = array();
			
			foreach ($aps as $ap)
			{
				//put the IPN information into an associative array $info
				$ele = explode("=", $ap);
				$info[$ele[0]] = $ele[1];
			}

			//setting information about the transaction from the IPN information array
			$receivedMerchantEmailAddress = $info['ap_merchant']=$_REQUEST['ap_merchant'];
			@$transactionStatus = $info['ap_status'];
			
			@$testModeStatus = $info['ap_test'];
			$purchaseType = $info['ap_purchasetype']=$_REQUEST['ap_purchasetype'];
			@$totalAmountReceived = $info['ap_totalamount']=$_REQUEST[''];
			@$feeAmount = $info['ap_feeamount'];
			@$netAmount = $info['ap_netamount'];
			@$transactionReferenceNumber = $info['ap_referencenumber'];
			@$currency = $info['ap_currency'];
			@$transactionDate = $info['ap_transactiondate'];
			@$transactionType = $info['ap_transactiontype'];
			
			//setting the customer's information from the IPN information array
			@$customerFirstName = $info['ap_custfirstname'];
			@$customerLastName = $info['ap_custlastname'];
			@$customerAddress = $info['ap_custaddress'];
			@$customerCity = $info['ap_custcity'];
			@$customerState = $info['ap_custstate'];
			@$customerCountry = $info['ap_custcountry'];
			@$customerZipCode = $info['ap_custzip'];
			@$customerEmailAddress = $info['ap_custemailaddress'];
			
			//setting information about the purchased item from the IPN information array
			@$myItemName = $info['ap_itemname'];
			@$myItemCode = $info['ap_itemcode'];
			@$myItemDescription = $info['ap_description'];
			@$myItemQuantity = $info['ap_quantity'];
			$myAmount = $info['ap_amount']=$_REQUEST['ap_amount'];
			$myItemAmount = $myAmount-9;
			//echo $myItemAmount;die;
			
			//setting extra information about the purchased item from the IPN information array
			@$additionalCharges = $info['ap_additionalcharges'];
			@$shippingCharges = $info['ap_shippingcharges'];
			@$taxAmount = $info['ap_taxamount'];
			@$discountAmount = $info['ap_discountamount'];
			
			//setting your customs fields received from the IPN information array
			$myCustomField_1 = $info['apc_1'];  //idadsuser
			$myCustomField_3 = $info['apc_2'];  //stream
			//mail('minesh.patel@spaculus.com','test response',$response);
			//mail('minesh.patel@spaculus.com','test ap',$myCustomField_3."====".$myCustomField_1."===".implode("^^^",$info));die;
			if (trim($transactionStatus) =="Success")
			{
				
			 	//YOUR CODE GOES HERE
			    $details = "Name:".$customerFirstName." ".$customerLastName."\r\n Member:".$customerEmailAddress."\r\n status:".$transactionStatus."\r\n TransId:".$transactionReferenceNumber."\r\n type:".$transactionType."\r\n Date:".$transactionDate."\r\n  User-Email:".$myCustomField_1."\r\n For:".$myCustomField_3."\r\n ";
                $qry = "insert into ap_test values(NULL,'".$details."',NOW())";
                
				$rtnval = $form->inser_qry($qry);
				//mail('minesh.patel@spaculus.com','test ap',$qry."====".$rtnval);die;

				$table = "userdetail";
				$pre_table = "pre_userdetail";
				$Email = $myCustomField_1;
				$q="SELECT * FROM `$table` WHERE `$table`.`login` = '{$Email}'" ;
				$rows = $form->getRow($q);
				if(sizeof($rows)>0) {
							$form->message('Emailid is already exist. Please change it and try again.','error');
				}else{
						$q="SELECT * FROM `$pre_table` WHERE `$pre_table`.`UserId` = '{$myCustomField_3}'" ;
						//mail('minesh.patel@spaculus.com','test ap',$q."====");die;
						$rows = $form->getRow($q);
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
						include_once("ap_confirmation.php");
						userdetails($form,$rows['UserId'],$rows['usercode']);
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
			}
	}
}
?>
	