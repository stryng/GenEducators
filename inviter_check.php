<? 

	include_once 'business_logic/config/configure.php';

	require_once("business_logic/class/form.class.php");

	$form = new Form();

	$sql="select Email, FirstName, LastName from userdetail where UserId = '".$_POST['inviter']."' ";

	$row = $form->getRow($sql);

	$num=sizeof($row);

	if($num == 6 )

	{?>

		<div style="color:#008000;"> 

			Email Id : <?=$row['Email'];?><br />

			Name: <?=$row['FirstName']."  ".$row['LastName'];?><br />

		 </div>

		 <div id="inviter_detail">

		 	<div style="color:#FF0000">Are You Sure You Want To Register in this User ?</div>

			 <input type="button" value="OK"  onclick="change_mod()" id="OK" name="OK" style="float:left" class="btn_cls" /> 

			 <input type="button" value="Cancel"  onclick="change_mod_read_only_cancle()" style="float:right" id="Cancle_view" name="Cancel" class="btn_cls"  />

		 </div>

	<? }else

	{?>

		<div style="color:#FF0000">Invalid Reffral Id. </div>

	<? }



?>