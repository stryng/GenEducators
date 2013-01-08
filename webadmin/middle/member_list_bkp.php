<?php
require_once CLASS_PATH.'member_list.php';
$obj = new member_list;

$action = $_REQUEST['action'];

if(isset($action) && !empty($action)) {
	$msg='';
	$msg=$obj->funoperation_ip();
}


$n=$_REQUEST['n'];
$sorton=$_REQUEST['sorton'];
$sorttype=$_REQUEST['sorttype']; 

$tableName="userdetail";

$sec_table = 'm_payment_fee';

$num_totrec = $obj->count_member_detail($tableName);

$var_extra = $var_extra . "&num_totrec=" . $num_totrec;
$var_extra = $var_extra . "&n=" . $n;

include(FUNCTION_PATH."paging.php");

if (!isset($sorton)) $sorton = "UserId";

if (!isset($sorttype)) $sorttype = "ASC";

$db_res = $obj->get_member_detail($tableName, $sorton, $sorttype,$var_limit);

?>

<script type="text/javascript">

function open_win(id,name)
{
	window.open("<?=SITE_URL?>updateprofile.php?user_id="+id+"&user_name="+name)
}
function edituser(uid)
{
	window.location.href = "<?=SITE_URL?>admin/edit_user_detail.php?uid="+uid;
}
</script>
<div id="content">

<!--<div class="contentTop">
		  Page Title varialbe here set it from middle files  
		<span class="pageTitle"><span class="icon-screen"></span>Welcome Administrator</span>
 		<div class="clear"></div>
 </div>-->

  <div class="wrapper">
    <div class="widget">
      <div class="whead">
        <h6>Member Listing</h6>
        <div class="whead">
          <a href="user_signup.php" class="buttonH bRed">Add New Member</a>
		  <!--<a onclick="setaction('chk[]','unblocked', 'Are you sure, you want to unblocked selected records?', 'frmmember_listing')" class="buttonH bGreen">Unblock</a>-->
          </ul>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="tablePars" style="display: block;">  
				<div id="dynamic_length" class="dataTables_length">
					<label>
						<span class="showentries">Show entries:</span>
							<?php echo createpagecombo();?> 
					</label>
				</div>
			</div>
      <div class="clear"></div>
      <div class="hiddenpars">
        <form id="frmmember_listing" name="frmmember_listing" method="post" action="<?=INDEX_FILE?>ip-tracking">
          <input type="hidden" name="action" id="action" />
          <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="checkAll">
            <thead>
				  <tr>
						<td>Name</td>
						<td>Inviter</td>
						<td>Email</td>
						<td>Status</td>
						<td>Payment</td>
						<td>Date</td>
						<td>GO</td>
						<td>Edit</td>
				  </tr>
            </thead>
            <tbody>
					<? 
					$inviter = "inviter";
					$sec_table = "m_payment_fee";
					/*if(isset($_GET['stream']) && $_GET['stream'] == "3x3")
					{
						$sec_table = "m_payment_fee";
						$inviter = "inviter";
					}
					else if(isset($_GET['stream']) && $_GET['stream'] == "5x3")
					{
						$sec_table = "m_payment_fee_5_3";
						$inviter = "inviter_5_3";
					}
					else if(isset($_GET['stream']) && $_GET['stream'] == "10x3")
					{
						$sec_table = "m_payment_fee_10_3";
						$inviter = "inviter_10_3";
					}
					else
					{
						$sec_table = "m_payment_fee";
						$inviter = $db_res[$i]["inviter"];
					}*/
					 for($i = 0;$i < count($db_res);$i++)
					 { 
						$query = "SELECT FirstName,LastName FROM $tableName WHERE UserId = '".$db_res[$i][$inviter]."'";
						$sql = $dbobj->select($query);
						$qry = "SELECT activedeactive,payment_done,payment_datetime FROM $sec_table WHERE usertb_id = '".$row['UserId']."'";
						$act_inact = $dbobj->select($qry);
					 ?>
						<tr>
							<td align="center"><?=$db_res[$i]["FirstName"];?>&nbsp;<?=$db_res[$i]["LastName"];?></td>
							<td><?=$sql[0]['FirstName'];?>&nbsp;<?=$sql[0]['LastName'];?></td>
							<td><?=$db_res[$i]['Email'];?></td>
							<td><?=isset($act_inact[0]['activedeactive'])? (($act_inact[0]['activedeactive'] =='active')?"Active":"Inactive"):"Inactive";?></td>
							<td><? if($act_inact[0]['payment_done']=='YES'){ echo "Yes"; }else{ echo "No"; } ?></td>
							<td><? echo $act_inact[0]['payment_datetime']?></td>
							<td><a class="acolor" href="javascript:open_win(<?=$db_res[$i]['UserId']?>,'<?=$db_res[$i]['UserName']?>')"> GO </a></td>
							<td><a class="acolor" href="javascript:edituser(<?=$db_res[$i]['UserId']?>)"> Edit </a></td>
						</tr>
				 <? } ?>
            </tbody>
          </table>
        </form>
        <div class="fg-toolbar tableFooter">
          <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> <?php echo $page_link;?> </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">		
<?php	
if(isset($msg) && !empty($msg))
{
	?>
	$.jGrowl('<?=$msg?>');
	<?
}	?>
</script>
</div>
<!-- Content ends -->
