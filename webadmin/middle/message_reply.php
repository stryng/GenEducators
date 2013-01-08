<?php

	$n3=$_REQUEST['n3'];
	$sorton3=$_REQUEST['sorton3'];
	$sorttype3=$_REQUEST['sorttype3'];
	$option3=$_REQUEST['option3'];
	$keyword3=$_REQUEST['keyword3'];	
	
	$sql_3 = mysql_fetch_array(mysql_query("select count(*) as tot  from message_in where msg_status='2' and to_u_id = '".$_SESSION['admin']['userid']."' AND to_admin='yes'"));
	$num_totrec3 = $sql_3["tot"];
	
	
	$var_extra3 = $var_extra3 . "&num_totrec3=" . $num_totrec3;
	$var_extra3 = $var_extra3 . "&n3=" . $n3;
	
	include(FUNCTION_PATH."third_level_paging.php");	
	if (!isset($sorton3)) $sorton3 = "message_id";	
	if (!isset($sorttype3)) $sorttype3 = "ASC";

	$replysql = "select *  from message_in where msg_status='2' and to_u_id = '".$_SESSION['admin']['userid']."' AND to_admin='yes' ORDER BY status desc,msg_datetime desc ".$var_limit3;	 	
	$replyrow = $form->getArray($replysql);
	$replycount = sizeof($replyrow);

	$action = $_REQUEST['actionreply'];
	if(isset($action) && !empty($action)) 
	{
		//echo $action;die;
		$msg='';
		//$msg=$obj->funoperation();
		$str = strpos($_REQUEST['actionreply'],"=");
		//echo $str;die;
		if($str !== false)
		{
			$act = explode("=",$_REQUEST['actionreply']);
			if($act[0] == 'deleteone') {
				$query = "delete from product where productid = ".$act[1];
				$msg='Selected Record(s) Delete Successfully';
			}
		}
		if($_REQUEST['actionreply']=='delete') {
			$query = "delete from message_in where message_id in (".implode(",",$_REQUEST['chkreply']).")";
		}
		$form->inser_qry($query);
		?>
		<script type="text/javascript">
			window.location = "index.php?file=message";
		</script>
		<?php
	}	
?>
<form name="frm_replybox" id="frm_replybox" method="post" >
	<input type="hidden" id="actionreply" name="actionreply" value="" /> 
	<div class="widget replyall check">
  <div class="whead">
    <h6>Reply message</h6>
		<a class="buttonH bRed tipE" onclick="deleteaction('chkreply[]','delete', 'Are you sure, you want to Delete selected records?', 'frm_replybox')" title="check checkbox and click">Delete</a>
    <div class="whead">
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div id="message_replay_div">
  <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia" id="check_reply">
    <thead>
      <tr>
        <th width="3%"><span class="replyIcon check">
          <input type="checkbox" id="replyCheck" name="replyCheck" />
          </span> </th>
        <th width="15%">From Name</th>
        <th width="15%">Email</th>
        <th width="15%">Subject</th>
        <th width="35%">Description</th>
        <th width="17%">Date/Time</th>
        <!--<th width="5%">Id</th>-->
      </tr>
    </thead>
    <tbody>
      <?php 
	  
	if($replycount > 0)
	{
		for($i=0;$i<sizeof($replyrow);$i++)
		{
				?>
				<tr class="checkmsg" <?php echo ($replyrow[$i]['status'] == 'Unread')?' style="font-weight:bold;"':'';?> >
					<td>
						<input type="checkbox" name="chkreply[]" class="chkbox"  id="chknew<?php echo $replyrow[$i]['message_id'];?>" value="<?php echo $replyrow[$i]['message_id'];?>"/>
					</td>
						<?php
							$href = 'index.php?file=message_view&ref='.base64_encode($replyrow[$i]['message_id']); 
							if($replyrow[$i]['userid'] != '0')
							{
								$qry_db_out = "SELECT concat(FirstName,' ',LastName) as fullname,Email as username FROM userdetail where UserId = '".$replyrow[$i]['userid']."' ORDER BY UserId DESC";	 
							}else{
								$qry_db_out = "select *,username as fullname,email as default_email from admin_logindetail where AdminId = '1'";
							}
							$po_rows = $form->getRow($qry_db_out);
										
							if($replyrow[$i]['userid'] != '0'){
								$useremail = $po_rows['username'];
							}else{
								$useremail = $po_rows['default_email'];
							}
						?>
					<td align="center"><a href="<?php echo $href; ?>" > <?php echo $po_rows['fullname']; ?> </a> </td>
					<td align="center"><a href="<?php echo $href; ?>" > <?php echo $useremail; ?> </a> </td>
					<td align="center"><a href="<?php echo $href; ?>" > <?php echo $replyrow[$i]['msg_sub']?> </a> </td>
					<td align="center">
							<a href="<?php echo $href; ?>" >
							  <?php
								 $desc = htmlentities(strip_tags($replyrow[$i]['msg_desc'])); 
								  if(strlen($desc) > 40) {
									$desc=substr($desc,0,40);
									$desc.=".....";
								  }
								  if($desc == "")
								  {
									$desc = " - ";
								  }
								  // echo with html teg like "<p>" htmlentities()
								  echo $desc;
								?>
          					</a>
					</td>
					<td align="center">
						<a href="<?php echo $href; ?>" >
								<?php   
									$db_date = $replyrow[$i]['msg_datetime'];
									$date1=explode('-',$replyrow[$i]['msg_datetime']); 
									echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
									$a = explode(' ',$db_date);
									echo  " &nbsp;/&nbsp;" .$a[1];
								?>
						 </a>
					 </td>
		   		</tr>
				<?php 
		} 
	}
	else
	{
		?>
		<tr>
			<td align="center" colspan="7">No record found</td>
		</tr>
		<?php	
	 }
	?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7"><div>
            <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> <?php echo $page_link3;?> </div>
          </div></td>
      </tr>
    </tfoot>
  </table>
  </div>
</div>
</form>
