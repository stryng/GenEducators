<?php
	//$sql = "select *  from message_in where msg_status='1' and to_u_id = '1' ".$search_for."  ORDER BY msg_datetime desc ";
	//echo $sentsql = "select *  from message_in where userid = '".$_SESSION['userid']."' and pending_status ='3' ORDER BY msg_datetime desc ";
		 
	$n2=$_REQUEST['n2'];
	$sorton2=$_REQUEST['sorton2'];
	$sorttype2=$_REQUEST['sorttype2'];
	$option2=$_REQUEST['option2'];
	$keyword2=$_REQUEST['keyword2'];	
	
	$sql_2 = mysql_fetch_array(mysql_query("select count(*) as tot from message_in where userid = '".$_SESSION['userid']."' AND to_admin='no' "));
	$num_totrec2 = $sql_2["tot"];
	
	$var_extra2 = $var_extra2 . "&num_totrec2=" . $num_totrec2;
	$var_extra2 = $var_extra2 . "&n2=" . $n2;
	
	include(FUNCTION_PATH."second_level_paging.php");	
	if (!isset($sorton2)) $sorton2 = "message_id";	
	if (!isset($sorttype2)) $sorttype2 = "ASC";
	
	
	$sentsql = "select *  from message_in where userid = '".$_SESSION['userid']."' AND to_admin='yes' ORDER BY status desc,msg_datetime desc ".$var_limit2;	 
	$sentrow = $form->getArray($sentsql);
	$sentcount = sizeof($sentrow);
	
	$action = $_REQUEST['actionsent'];
	if(isset($action) && !empty($action)) 
	{
		//echo $action;die;
		$msg='';
		//$msg=$obj->funoperation();
		$str = strpos($_REQUEST['actionsent'],"=");
		//echo $str;die;
		if($str !== false)
		{
			$act = explode("=",$_REQUEST['actionsent']);
			if($act[0] == 'deleteone') {
				$query = "delete from product where productid = ".$act[1];
				$msg='Selected Record(s) Delete Successfully';
			}
		}
		if($_REQUEST['actionsent']=='delete') {
			$query = "delete from message_in where message_id in (".implode(",",$_REQUEST['chk']).")";
		}
		$form->inser_qry($query);
		?>
		<script type="text/javascript">
			window.location = "index.php?file=message";
		</script>
		<?php
	}	
	
?>

<form name="frm_sentbox" id="frm_sentbox" method="post" >
	<input type="hidden" id="actionsent" name="actionsent" value="" /> 
  <div class="widget check sentcheck">
    <div class="whead">
      <h6>Sent message</h6>
			<a class="buttonH bRed tipE" onclick="deleteaction('chk[]','delete', 'Are you sure, you want to Delete selected records?', 'frm_sentbox')" title="check checkbox and click">Delete</a>
      <div class="whead">
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div id="message_sentbox_div">
      <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia" id="checkAllsent">
        <thead>
          <tr>
            <th width="3%"><span class="sentIcon check">
              <input type="checkbox" id="sentCheck" name="sentCheck" />
              </span> </th>
            <th width="15%">To Name</th>
            <th width="15%">Email</th>
            <th width="15%">Subject</th>
            <th width="35%">Description</th>
            <th width="17%">Date/Time</th>
          <!--  <th width="5%">Id</th>-->
          </tr>
        </thead>
        <tbody>
          <?php 
			if($sentcount > 0)
			{
				for($i=0;$i<sizeof($sentrow);$i++)
				{
					?>
					<tr class="checkmsg" <?php echo ($sentrow[$i]['status'] == 'Unread')?' style="font-weight:bold;"':'';?> >
							<td>
								<input type="checkbox" name="chk[]" class="chkbox"  id="chknew<?php echo $sentrow[$i]['message_id'];?>" value="<?php echo $sentrow[$i]['message_id'];?>"/>
							</td>
							<?php
								$href = 'index.php?file=message_sent&ref='.base64_encode($sentrow[$i]['message_id']);  						 
								if($sentrow[$i]['to_u_id'] != '0')
								{
									$qry_db_out = "SELECT concat(FirstName,' ',LastName) as fullname,Email as username FROM userdetail where UserId = '".$sentrow[$i]['userid']."' ORDER BY UserId DESC";
									$po_rows = $form->getRow($qry_db_out);
								
									$useremail = $po_rows['fullname'];
									$useremail = $po_rows['email'];
															
								}else{
									$qry_db_out = "select *,username as fullname,email as default_email from admin_logindetail where AdminId = '1'";
									$po_rows = $form->getRow($qry_db_out);
		
									$useremail = $po_rows['fullname'];
									$useremail = $po_rows['default_email'];
								}
							?>
							<td align="center"><a href="<?php echo $href; ?>" > <?php echo $po_rows['fullname']; ?> </a> </td>
							<td align="center"><a href="<?php echo $href; ?>" > <?php echo $useremail; ?> </a> </td>
							<td align="center"><a href="<?php echo $href; ?>" > <?php echo $sentrow[$i]['msg_sub']?> </a> </td>
							<td align="center">
									<a href="<?php echo $href; ?>" >
									<?php
										 $desc = htmlentities(strip_tags($sentrow[$i]['msg_desc'])); 
										  if(strlen($desc) > 40) {
											$desc=substr($desc,0,40);
											$desc.=".....";
										  }
										  if($desc == "")
										  {
											$desc = " - ";
										  }
										  echo $desc;
									?>
									</a>
							</td>
							<td align="center">
									<a href="<?php echo $href; ?>" >
									<?php   
										$db_date = $sentrow[$i]['msg_datetime'];
										$date1=explode('-',$sentrow[$i]['msg_datetime']); 
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
                <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> <?php echo $page_link2 ;?> </div>
              </div></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</form>
