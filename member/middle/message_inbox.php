<?php
	//$sql = "select *  from message_in where msg_status='1' and to_u_id = '1' ".$search_for."  ORDER BY msg_datetime desc ";
	
	$n=$_REQUEST['n'];
	$sorton=$_REQUEST['sorton'];
	$sorttype=$_REQUEST['sorttype'];
	$option=$_REQUEST['option'];
	$keyword=$_REQUEST['keyword'];	 
	
	$sql_c = mysql_fetch_array(mysql_query("select count(*) as tot from message_in where msg_status='1' and to_u_id = '".$_SESSION['userid']."' AND to_admin='no' "));
	$num_totrec = $sql_c["tot"];
		
	$var_extra = $var_extra . "&num_totrec=" . $num_totrec;
	$var_extra = $var_extra . "&n=" . $n;
	
	include(FUNCTION_PATH."first_level_paging.php");	
	if (!isset($sorton)) $sorton = "message_id";	
	if (!isset($sorttype)) $sorttype = "ASC";
	
	$inboxsql = "select *  from message_in where msg_status='1' and to_u_id = '".$_SESSION['userid']."' AND to_admin='no' ORDER BY status desc,msg_datetime desc ".$var_limit;	
	$inboxrow = $form->getArray($inboxsql);
	$inboxcount = sizeof($inboxrow);
	
	$action = $_REQUEST['action'];
	if(isset($action) && !empty($action)) 
	{
		//echo $action;die;
		$msg='';
		//$msg=$obj->funoperation();
		$str = strpos($_REQUEST['action'],"=");
		//echo $str;die;
		if($str !== false)
		{
			$act = explode("=",$_REQUEST['action']);
			if($act[0] == 'deleteone') {
				$query = "delete from product where productid = ".$act[1];
				$msg='Selected Record(s) Delete Successfully';
			}
		}
		if($_REQUEST['action']=='delete') {
			$query = "delete from message_in where message_id in (".implode(",",$_REQUEST['chknew']).")";
		}
		$form->inser_qry($query);
		?>
		<script type="text/javascript">
			window.location = "index.php?file=message";
		</script>
		<?php
	}	
?>

<form name="frm_inbox" id="frm_inbox" method="post" >
	<input type="hidden" id="action" name="action" value="" /> 
  <div class="widget allcheck check">
    <div class="whead">
      <h6>Inbox</h6>
			<a class="buttonH bRed tipE" onclick="deleteaction('chknew[]','delete', 'Are you sure, you want to Delete selected records?', 'frm_inbox')" title="check checkbox and click">Delete</a>
      	<div class="whead">
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div id="message_inox_div">
      <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia" id="checkAllinbox">
        <thead>
          <tr>
            <th width="3%"><span class="titleIcon check">
              <input type="checkbox" id="inboxCheck" name="inboxCheck" />
              </span> </th>
            <th width="15%">From Name</th>
            <th width="15%">Email</th>
            <th width="15%">Subject</th>
            <th width="35%">Description</th>
            <th width="17%">Date/Time</th>
			<!--<th width="5%">id</th>-->
			<!--<a href="#" class="buttonS bDefault mb10 mt5">Button</a>-->
          </tr>
        </thead>
        <tbody>
          <?php		
			if($inboxcount > 0)
			{
				for($i=0;$i<sizeof($inboxrow);$i++)
				{
						?>
						<tr class="checkmsg" <?php echo ($inboxrow[$i]['status'] == 'Unread')?' style="font-weight:bold;"':'';?> >
							<td>
								<input type="checkbox" name="chknew[]" class="chkbox"  id="chknew<?php echo $inboxrow[$i]['message_id'];?>" value="<?php echo $inboxrow[$i]['message_id'];?>"/>
							</td>
							<?php
									$href = 'index.php?file=message_view&ref='.base64_encode($inboxrow[$i]['message_id']);  						 
									if($inboxrow[$i]['userid'] != '0')
									{
										$qry_db_out = "SELECT concat(FirstName,' ',LastName) as fullname,Email as username FROM userdetail where UserId = '".$inboxrow[$i]['userid']."' ORDER BY UserId DESC";	 
									}else{
										$qry_db_out = "select *,username as fullname,email as default_email from admin_logindetail where AdminId = '1'";
									}
									$po_rows = $form->getRow($qry_db_out);
									
									if($inboxrow[$i]['userid'] != '0'){
										$useremail = $po_rows['username'];
									}else{
										$useremail = $po_rows['default_email'];
									}
									//print_r($po_rows);
								?>
								<td align="center"><a href="<?php echo $href;?>" > <?php echo $po_rows['fullname']; ?> </a> </td>
								<td align="center"><a href="<?php echo $href;?>" > <?php echo $useremail; ?> </a> </td>
								<td align="center"><a href="<?php echo $href;?>" > <?php echo $inboxrow[$i]['msg_sub']?> </a> </td>
								<td align="center"><a href="<?php echo $href;?>" >
								  <?php
									 $desc = htmlentities(strip_tags($inboxrow[$i]['msg_desc'])); 
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
								  </a> </td>
								<td align="center"><a href="<?php echo $href; ?>" >
								  <?php   
														$db_date = $inboxrow[$i]['msg_datetime'];
														$date1=explode('-',$inboxrow[$i]['msg_datetime']); 
														echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
														$a = explode(' ',$db_date);
														echo  " &nbsp;/&nbsp;" .$a[1];
													 ?>
								  </a> </td>
								 <!--  <td align="center"><?php echo $inboxrow[$i]['message_id']; ?></td>-->
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
        <tfoot>
          <tr>
            <td colspan="7"><div>
                <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> <?php echo $page_link;?> </div>
              </div></td>
          </tr>
        </tfoot>
        </tbody>
        
      </table>
    </div>
  </div>
</form>
