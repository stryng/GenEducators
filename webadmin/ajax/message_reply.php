<?php
	
	include("../../buisness_logic/config/configure.php");
 	include("../../buisness_logic/class/DBConnection.php");
	$db2 = new DBConnection();
	$db3 = new DBConnection();
	$db4 = new DBConnection();
	$db5 = new DBConnection();
	
	$user = $_SESSION['sess_adminid'] ;
	

	$n3=$_REQUEST['n3'];
	$sorton3=$_REQUEST['sorton3'];
	$sorttype3=$_REQUEST['sorttype3'];
	$option3=$_REQUEST['option3'];
	$keyword3=$_REQUEST['keyword3'];	
	
	$sql_3 = mysql_fetch_array(mysql_query("select count(*) as tot  from message_in where msg_status='2' and to_u_id = '".$_SESSION['sess_adminid']."'"));
	$num_totrec3 = $sql_3["tot"];
	
	
	$var_extra3 = $var_extra3 . "&num_totrec3=" . $num_totrec3;
	$var_extra3 = $var_extra3 . "&n3=" . $n3;
	
	include(FUNCTION_PATH."third_level_paging.php");	
	if (!isset($sorton3)) $sorton3 = "message_id";	
	if (!isset($sorttype3)) $sorttype3 = "ASC";

	$replysql = "select *  from message_in where msg_status='2' and to_u_id = '".$_SESSION['sess_adminid']."' ORDER BY msg_datetime desc ".$var_limit3;	 	
	$replyres = $db4->execArrayQuery($replysql);	
	$replycount = $db4->getRowsCount($replyres);


?>
<table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia" id="check_reply">
  <thead>
    <tr>
      <th width="5%"><span class="replyIcon check replyall">
        <input type="checkbox" id="replyCheck" name="replyCheck" />
        </span> </th>
      <th width="13%">From Name</th>
      <th width="15%">Email</th>
      <th width="15%">Subject</th>
      <th width="25%">Description</th>
      <th width="12%">Date/Time</th>
      <!--<th width="5%">Id</th>-->
    </tr>
  </thead>
  <tbody>
    <?php 
	if($replycount > 0)
	{
		while($replyrow=$db4->next())
		{
			if($replyrow['status'] == 'Unread'){?>
    <tr class="checkmsg" style="font-weight:bold;" >
      <? }else{?>
    <tr class="checkmsg">
      <? }?>
      <td><input type="checkbox" name="chknew[]" class="chkbox"  id="chknew<?php echo $replyrow['message_id'];?>" value="<?php echo $replyrow['message_id'];?>"/>
      </td>
      <?php
					$href = 'index.php?file=message_view&ref='.base64_encode($replyrow['message_id']); 			 
					if($replyrow['userid'] != '0')
					{ 					
						$qry_db_out = "SELECT concat(firstname,' ',lastname) as fullname,username FROM userdetail where userid = '".$replyrow['userid']."' ORDER BY userid DESC";	 
					}else{
						$qry_db_out = "select user_name,default_email from system_config where sid = '0'";
					}
					$db2->execArrayQuery($qry_db_out);
					$po_rows = $db2->next(); 
				?>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $po_rows['fullname']; ?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $po_rows['username']; ?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $replyrow['msg_sub']?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" >
        <?php
					 $desc = htmlentities(strip_tags($replyrow['msg_desc'])); 
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
						$db_date = $replyrow['msg_datetime'];
						$date1=explode('-',$replyrow['msg_datetime']); 
						echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
						$a = explode(' ',$db_date);
						echo  " &nbsp;/&nbsp;" .$a[1];
					 ?>
        </a> </td>
    <!--  <td align="center"><?php echo $replyrow['message_id']?></td>-->
    </tr>
    <?php 
		} 
	 }
	 else
	 {
	 	?>
    <tr>
      <td align="center" colspan="6">No record found</td>
    </tr>
    <?php	
	 }
	 ?>
  <tfoot>
    <tr>
      <td colspan="7"><div>
          <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> <?php echo $page_link3;?> </div>
        </div></td>
    </tr>
  </tfoot>
  </tbody>
  
</table>
