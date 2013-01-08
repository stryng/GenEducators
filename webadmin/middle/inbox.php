<?
include CONFIG_PATH.'DBConnection.class.php ';

$db2=new DBConnection();	
$db = new DBConnection();

$action = $_REQUEST['action'];
if(isset($action) && !empty($action)) {
	//echo $action;die;
	$tempvar = explode("_",$action);
	$msg='';
	//$msg=$obj->funoperation();
	if($tempvar[1] == "new") {
		$query = "delete from message_in where message_id in (".implode(",",$_REQUEST['chknew']).")";
	}else if($tempvar[1] == "reply") {
		$query = "delete from message_in where message_id in (".implode(",",$_REQUEST['chkreply']).")";
	}else{
		$query = "delete from message_in where message_id in (".implode(",",$_REQUEST['chkclose']).")";
	}
	mysql_query($query);
	$msg='Selected Record(s) Delete Successfully';
}

if(isset($_REQUEST['msgtextconsumer']) && !empty($_REQUEST['msgtextconsumer'])) {
	$msg=$_REQUEST['msgtextconsumer'];
}
?>
<script type="text/javascript">
function setaction(elename, actionval, actionmsg, formname)
{
	//alert(" element name==="+elename+"===action==="+actionval+"===mag==="+actionmsg+"===form name==="+formname);
	vchkcnt=0;
	elem = document.getElementsByName(elename);
	 
	for(i=0;i<elem.length;i++)
	{
		if(elem[i].checked) vchkcnt++;	
	}
	if(vchkcnt==0) 
	{
		//selecet_record();
		alert('Please select record')
	} 
	else 
	{
		//Operation(actionmsg,actionval,formname);
		
		var r=confirm(actionmsg);
		if (r==true)
		  {
		    document.getElementById('action').value=actionval;
		 	document.getElementById(formname).submit();
		  }
		 else
		  {
		  }
	}
}

	
	function cancle(a)
	{
		var b=a+"view";
		document.getElementById(b).style.display="none";
		document.getElementById(a).style.display="";
	}
	function status(a)
	{
		var b=a+"view";
		document.getElementById(b.).style.display="";
		document.getElementById(a).style.display="none";
	
	}
	function save(a)
	{		
		var b=a+"status";
		//alert(b);
		var c=document.getElementById(b).value;
		window.location="chnage_action.php?msg_id="+a+"&status="+c+"";
	}
	function delete1(a)
	{
		var b=confirm("Are you sure you want to delete the message ? ");
		if (b==true)
		{
			window.location="delete2.php?msg_id="+a;
		}
	}
	/*function checkall(allid)
	{
		for(var i=1;i<=allid;i++)
		{
			if(document.getElementById("chkalldelete").checked==true)
			{
				document.getElementById("msg_"+i).checked=true;
			}
			else
			{
				document.getElementById("msg_"+i).checked=false;
			}
		}
	}*/
	function validate()
	{
		var a = confirm("Are You Sure You Want To Delete Selected  Entry ? " );
		if(a == true)
		{
			return true;
		}else
		{
			return false ;
		}
	}

/*function checkall1(allid1)
	{
		for(var i=1;i<=allid1;i++)
		{
			if(document.getElementById("chkalldelete1").checked==true)
			{
				document.getElementById("msg2_"+i).checked=true;
			}
			else
			{
				document.getElementById("msg2_"+i).checked=false;
			}
		}
	}
	function validate1()
	{
		var a = confirm("Are You Sure You Want To Delete Selected  Entry ? " );
		if(a == true)
		{
			return true;
		}else
		{
			return false ;
		}
	}

function checkall2(allid2)
	{
		for(var i=1;i<=allid2;i++)
		{
			if(document.getElementById("chkalldelete2").checked==true)
			{
				document.getElementById("msg3_"+i).checked=true;
			}
			else
			{
				document.getElementById("msg3_"+i).checked=false;
			}
		}
	}*/
	function validate2()
	{
		var a = confirm("Are You Sure You Want To Delete Selected  Entry ? " );
		if(a == true)
		{
			return true;
		}else
		{
			return false ;
		}
	}
	function search_fun()
	{
		document.forms['search'].submit();
	}
	
	
</script>
<style type="text/css">
.checkmsg:hover{
	background-color:#FFFFFF !important;
}
.replyIcon { float: left; padding: 0px 0 0px 0; width: 40px;text-align: center; }
.replyIcon .checker { margin: 2px auto 0 auto; float: none; }
.closeIcon { float: left; padding: 0px 0 0px 0; width: 40px;text-align: center; }
.closeIcon .checker { margin: 2px auto 0 auto; float: none; }

</style>
<!-- Sidebar begins -->
<div id="sidebar">
  <?php include_once "left/left_main_menu.php" ?>
  <!-- Secondary nav -->
</div>
<!-- Sidebar ends -->
<!-- Content begins -->
<div id="content">
  <div class="contentTop">
    <!-- Page Title varialbe here set it from middle files -->
    <span class="pageTitle"><span class="icon-screen"></span>View Tickets</span>
    <?php include_once "breadcrum/before_breadcrum.php" ?>
    <div class="clear"></div>
  </div>
  <?php include_once "breadcrum/breadcrum.php" ?>
  
  <!--=========New tiket system start====-->
  <div class="wrapper">
    <div class="widget">
      <div class="whead">
        <h6>New Tickets</h6>
        <div class="whead">
          <ul class="titleToolbar">
            <li>
				<!--<input type="submit" name="delete_data" id="delete_data" value="Delete" onClick="return validate()" class="buttonS bRed"/>-->
				<a onclick="setaction('chknew[]','delete_new', 'Are you sure, you want to delete selected records?', 'frmnewticket')" class="tipS" title="Delete">
					Delete
				</a>
			</li>
				<!--<a onClick="return validate()" class="tipS" title="Delete">Delete</a>-->
			</li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <form class="tableName toolbar" id="frmnewticket" name="frmnewticket" method="post" >
	  	<input type="hidden" name="action" id="action"  />
        <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="checkAll">
          <thead>
            <tr>
              <th width="3%"><span class="titleIcon check">
                <input type="checkbox" id="titleCheck" name="titleCheck" />
                </span> </th>
              <th width="4%">From</th>
              <th width="10%">Name</th>
              <th>Subject</th>
              <th>Description</th>
              <th width="11%" align="center">Status</th>
              <th width="5%">priority</th>
              <th width="12%">Date/Time</th>
              <th width="5%">Reply</th>
              <th width="5%">Delete</th>
            </tr>
          </thead>
          <tbody>
          <?
		  	if(isset($_GET['limit']))
					$limit = mysql_escape_string($_GET['limit']);
				else
					$limit="50";
				$tableName="message_in";
				$targetpage = "inbox.php"; 		
				if($search_for != "")
				{
					$sql = "select *  from message_in where msg_status='1' and to_u_id = '0' ".$search_for."  ORDER BY msg_datetime desc ";
				}else{
					$sql = "select *  from message_in where msg_status='1' and to_u_id = '0'  ORDER BY msg_datetime desc ";
				}
				$res = $db2->execArrayQuery($sql);
				$num= $db2->getRowsCount($res);
				
				$total_pages = $num;
				$stages = 3;
				if(isset($_GET['page']))
					$page = mysql_escape_string($_GET['page']);
				else 
					$page=0;
				if($page)
					$start = ($page - 1) * $limit; 
				else
					$start = 0;
				
				if($search_for != "")
				{
					$sql1 = "select *  from message_in where msg_status='1'  ".$search_for."  ORDER BY msg_datetime desc LIMIT $start, $limit";
				}else{
					$sql1 = "select *  from message_in where msg_status='1' ORDER BY msg_datetime desc  LIMIT $start, $limit";
				}
				
				//$sql1 = "select *  from message_in where msg_status='1' ORDER BY msg_datetime desc LIMIT $start, $limit";
				$db2->execArrayQuery($sql1);
				
				if ($page == 0){$page = 1;}
				$prev = $page - 1;	
				$next = $page + 1;							
				$lastpage = ceil($total_pages/$limit);		
				$LastPagem1 = $lastpage - 1;					
				
				
				$paginate = '';
				if($lastpage > 1)
				{	
					$paginate .= "<div style='flaot:left ;' >";
					// Previous
					if ($page > 1){
							$paginate.= "<a href='$targetpage?page=$prev' class='paginate_button' >previous</a>";
					}else{
						$paginate.= "<span  class='previous paginate_button paginate_button_disabled'>previous</span>";	}
						
			
					
					// Pages	
					if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
					{	
						for ($counter = 1; $counter <= $lastpage; $counter++)
						{
							if ($counter == $page){
								$paginate.= "<span class='paginate_active'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage?page=$counter' class='paginate_button' >$counter</a>";}					
						}
					}
					elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
					{
						// Beginning only hide later pages
						if($page < 1 + ($stages * 2))		
						{
							for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
							{
								if ($counter == $page){
									$paginate.= "<span class='paginate_active'>$counter</span>";
								}else{
									$paginate.= "<a href='$targetpage?page=$counter' class='paginate_button' >$counter</a>";}					
							}
							$paginate.= "...";
							$paginate.= "<a href='$targetpage?page=$LastPagem1' class='paginate_button'>$LastPagem1</a>";
							$paginate.= "<a href='$targetpage?page=$lastpage' class='paginate_button'>$lastpage</a>";		
						}
						// Middle hide some front and some back
						elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
						{
							$paginate.= "<a href='$targetpage?page=1' class='paginate_button'>1</a>";
							$paginate.= "<a href='$targetpage?page=2' class='paginate_button'>2</a>";
							$paginate.= "...";
							for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
							{
								if ($counter == $page){
									$paginate.= "<span class='paginate_active'>$counter</span>";
								}else{
									$paginate.= "<a href='$targetpage?page=$counter' class='paginate_button'>$counter</a>";}					
							}
							$paginate.= "...";
							$paginate.= "<a href='$targetpage?page=$LastPagem1' class='paginate_button'>$LastPagem1</a>";
							$paginate.= "<a href='$targetpage?page=$lastpage' class='paginate_button'>$lastpage</a>";		
						}
						// End only hide early pages
						else
						{
							$paginate.= "<a href='$targetpage?page=1'>1</a>";
							$paginate.= "<a href='$targetpage?page=2'>2</a>";
							$paginate.= "...";
							for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
							{
								if ($counter == $page){
									$paginate.= "<span class='paginate_active'>$counter</span>";
								}else{
									$paginate.= "<a href='$targetpage?page=$counter' class='paginate_button'>$counter</a>";}					
							}
						}
					}
								
							// Next
					if ($page < $counter - 1){ 
						$paginate.= "<a href='$targetpage?page=$next' class='paginate_button'>next</a>";
					}else{
						$paginate.= "<span class='paginate_button_disabled'>next</span>";
						}
						
					$paginate.= "</div>";		
				
				}
		
				$res = $db2->execArrayQuery($sql);	
				$count=$db2->getRowsCount($res);
		  
		  	if($count > 0)
			{
				while($row=$db2->next())
				{
					if($row['status'] == 'Unread'){?>
            			<tr class="checkmsg" style="font-weight:bold;" >
              		<? }else{?>
            			<tr class="checkmsg">
              		<? }?>
					  <td>
						<input type="checkbox" name="chknew[]" class="chkbox"  id="chknew<?=$row['message_id'];?>" value="<?=$row['message_id'];?>"/>
					  </td>
					  <td>
					  	<a href="view.php?msg_id=<?=$row['message_id']; ?>" > <? echo $row['userid']; ?> </a>
					  </td>
					  <td>
					  	<?php 						 
							if($row['userid'] != '0')
							{ 						 
								$qry_db_out = "select fullname from userdetail where userid = '".$row['userid']."' ";
							}else{
								$qry_db_out = "select concat(Con_FirstName,' ',Con_LastName) as fullname from configure where Con_Id = '1'";
							}
								//$qry_db_out = "select fullname from userdetail where userid = '".$row['userid']."' ";
							$db->execArrayQuery($qry_db_out);
							$po_rows = $db->next(); 
						?>
						<a href="view.php?msg_id=<?=$row['message_id']; ?>" >
							<? echo $po_rows['fullname']; ?>
						</a>
					  </td>
					  <td>
					  		<a href="view.php?msg_id=<?=$row['message_id']; ?>" ><?=$row['msg_sub']?></a>
					  </td>
					  <td>
					  		<a href="view.php?msg_id=<?=$row['message_id']; ?>" >
							<?
							 $desc = htmlentities(strip_tags($row['msg_desc'])); 
							  if(strlen($desc) > 50) {
								$desc=substr($desc,0,50);
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
					  <td>
					  	<select name="<?=$row['message_id']."status"?>" id="<?=$row['message_id']."status" ?>" onchange="save(<?=$row['message_id'] ?>)">
						  <option value="">Change</option>
						  <option value="1">New</option>
						  <option value="2">Reply</option>
						  <option value="3">Close</option>
						</select>
					  </td>
					  <td>
					  	<a href="view.php?msg_id=<?=$row['message_id']; ?>" >
						<?   
						  $pr=$row['priority'];
						  if($pr=='0')
							echo "Low";
							if($pr=='1')
								echo "Medium";
							if($pr=='2')
								echo "High";
						 ?>
						</a> </td>
					  <td>
					  	<a href="view.php?msg_id=<?=$row['message_id']; ?>" >
						<? echo $db_date=$row['msg_datetime'];?>
						</a>
					</td>
					  <td>
					  	<a href="reply.php?msg_id=<?=$row['message_id'];?>" class="buttonS bDefault opt tipS" title="Reply">
							<span class="icos-download"></span>
						</a>
					  </td>
					  <td>
						<a onClick="delete1(<?=$row['message_id'] ;?>)" class="buttonS bDefault opt tipS" title="Delete">
							<span class="icos-cart"></span>
						</a>
					 </td>
            </tr>
        <? }
				?>
				<td colspan="10" ><div style="float:right;"><? echo $paginate; ?> </div></td>
				<? 
			}else {
				?>
					<td colspan="10" align="center" ><? echo "Record not found"; ?></td>
				<?
			} ?>
          </tbody>
        </table>
        <!--<input type="submit" name="delete_data" id="delete_data" value="Delete" onClick="return validate()" class="buttonS bRed"/>-->
      </form>
    </div>
  </div>
  <!--=========New tiket system close====-->
  <!--=========Reply tiket system start====-->
  <div class="wrapper">
    <div class="widget">
      <div class="whead">
        <h6>Reply</h6>
        <div class="whead">
          <ul class="titleToolbar">
            <li>
				<!--<input type="submit" name="delete_data" id="delete_data" value="Delete" onclick="return validate()" class="buttonS bRed"  />-->
				<!--<a href="#" class="tipS" title="Delete">Delete</a>-->
				<a onclick="setaction('chkreply[]','delete_reply', 'Are you sure, you want to delete selected records?', 'frmnewticket')" class="tipS" title="Delete">
					Delete
				</a>
			</li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <form class="tableName toolbar" id="frmreply" name="frmreply" method="post" >
        <? if(isset($_GET['limit']))
					$limit = mysql_escape_string($_GET['limit']);
				else
					$limit="50";
				$tableName="message_in";
				$targetpage = "inbox.php"; 		
				//$sql = "select *  from message_in where  msg_status='2' ORDER BY msg_datetime desc";
				if($search_for != "")
				{
					$sql = "select *  from message_in where msg_status='2' ".$search_for."  ORDER BY msg_datetime desc ";
				}else{
					$sql = "select *  from message_in where msg_status='2' ORDER BY msg_datetime desc  ";
				}
				//echo $sql."=====";
				$res = $db->execArrayQuery($sql);
				$num= $db->getRowsCount($res);
				$total_pages = $num;
				$stages = 3;
				if(isset($_GET['page1']))
					$page = mysql_escape_string($_GET['page1']);
				else 
					$page=0;
				if($page)
					$start = ($page - 1) * $limit; 
				else
					$start = 0;
				//$sql1 = "select *  from message_in where  msg_status='2' ORDER BY msg_datetime desc LIMIT $start, $limit";
				if($search_for != "")
				{
					$sql1 = "select *  from message_in where msg_status='2' ".$search_for."  ORDER BY msg_datetime desc LIMIT $start, $limit";
				}else{
					$sql1 = "select *  from message_in where msg_status='2' ORDER BY msg_datetime desc  LIMIT $start, $limit";
				}
				$db2->execArrayQuery($sql1);
				
				if ($page == 0){$page = 1;}
					$prev = $page - 1;	
					$next = $page + 1;							
					$lastpage = ceil($total_pages/$limit);		
					$LastPagem1 = $lastpage - 1;					
					
					
					$paginate = '';
				
					if($lastpage > 1)
					{	
						$paginate .= "<div style='flaot:left ;' >";
						// Previous
						if ($page > 1){
								$paginate.= "<a href='$targetpage?page=$prev' class='paginate_button' >previous</a>";
						}else{
							$paginate.= "<span  class='previous paginate_button paginate_button_disabled'>previous</span>";	}
							
				
						
						// Pages	
						if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
						{	
							for ($counter = 1; $counter <= $lastpage; $counter++)
							{
								if ($counter == $page){
									$paginate.= "<span class='paginate_active'>$counter</span>";
								}else{
									$paginate.= "<a href='$targetpage?page1=$counter' class='paginate_button' >$counter</a>";}					
							}
						}
						elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
						{
							// Beginning only hide later pages
							if($page < 1 + ($stages * 2))		
							{
								for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
								{
									if ($counter == $page){
										$paginate.= "<span class='paginate_active'>$counter</span>";
									}else{
										$paginate.= "<a href='$targetpage?page1=$counter' class='paginate_button' >$counter</a>";}					
								}
								$paginate.= "...";
								$paginate.= "<a href='$targetpage?page1=$LastPagem1'>$LastPagem1</a>";
								$paginate.= "<a href='$targetpage?page1=$lastpage'>$lastpage</a>";		
							}
							// Middle hide some front and some back
							elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
							{
								$paginate.= "<a href='$targetpage?page1=1' class='paginate_button'>1</a>";
								$paginate.= "<a href='$targetpage?page1=2' class='paginate_button'>2</a>";
								$paginate.= "...";
								for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
								{
									if ($counter == $page){
										$paginate.= "<span class='paginate_active'>$counter</span>";
									}else{
										$paginate.= "<a href='$targetpage?page1=$counter' class='paginate_button'>$counter</a>";}					
								}
								$paginate.= "...";
								$paginate.= "<a href='$targetpage?page1=$LastPagem1' class='paginate_button'>$LastPagem1</a>";
								$paginate.= "<a href='$targetpage?page1=$lastpage' class='paginate_button'>$lastpage</a>";		
							}
							// End only hide early pages
							else
							{
								$paginate.= "<a href='$targetpage?page1=1'>1</a>";
								$paginate.= "<a href='$targetpage?page1=2'>2</a>";
								$paginate.= "...";

								for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
								{
									if ($counter == $page)
									{
										$paginate.= "<span class='paginate_active'>$counter</span>";
									}else{
										$paginate.= "<a href='$targetpage?page1=$counter' class='paginate_button'>$counter</a>";}					
								}
							}
						}
				
									
								// Next
						if ($page < $counter - 1)
						{ 
							$paginate.= "<a href='$targetpage?page1=$next' class='paginate_button'>next</a>";
						}else
						{
							$paginate.= "<span class='paginate_button_disabled'>next</span>";
						}
							
							$paginate.= "</div>";
					}  
				 $res = $db->execArrayQuery($sql);	
				 $count1=$db2->getRowsCount($res);
				 ?>
				 
 		<table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="replyAll">
          <thead>
            <tr>
              <th width="3%"><span class="replyIcon check">
                <input type="checkbox" id="titleCheck" name="titleCheck" />
                </span> </th>
              <th width="4%">From</th>
              <th width="10%">Name</th>
              <th>Subject</th>
              <th>Description</th>
              <th width="5%">Status</th>
              <th width="5%">priority</th>
              <th width="12%">Date/Time</th>
              <th width="5%">Reply</th>
              <th width="5%">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?
			while($row_rply=$db2->next())
			{
				if($row_rply['status'] == 'Unread'){?>
            		<tr style="font-weight:bold;">
              	<? }else{ ?>
            		<tr>
              	<? } ?>
              <!--	<input type="hidden" name="count" value="<?=$cnt;?>"  />-->
             	<td align="center">
					<input type="checkbox" name="chkreply[]" id="chkreply<?=$i?>" value="<?=$row_rply['message_id']; ?>" />
              	</td>
				  <td>
					<a href="view.php?msg_id=<?=$row_rply['message_id']; ?>" >
						<? echo $row_rply['userid']; ?>
					</a>
				  </td>
             	<td>
                <?php
					if($row_rply['userid'] != '0')
					{ 						 
						$qry_db_out = "select fullname from userdetail where userid = '".$row_rply['userid']."' ";
					}else{
						$qry_db_out = "select concat(Con_FirstName,' ',Con_LastName) as fullname from configure where Con_Id = '1'";
					}	
					$db->execArrayQuery($qry_db_out);
					$po_rows = $db->next(); 
				?>
                <a href="view.php?msg_id=<?=$row_rply['message_id']; ?>" >
					<? echo $po_rows['fullname']; ?>
				</a>
				</td>
                 <td>
					<a href="view.php?msg_id=<?=$row_rply['message_id']; ?>" >
						<? echo $row_rply['msg_sub']; ?>
					</a>
				</td>
              <td><a href="view.php?msg_id=<?=$row_rply['message_id']; ?>" >
                	<?
					  $desc = htmlentities(strip_tags($row_rply['msg_desc'])); 
					  if(strlen($desc) > 50)
					  {
						$desc=substr($desc,0,50);
						$desc.=".....";
					  }
					  echo $desc;
					  ?>
                </a></td>
              <td>
			  		<select name="<?=$row_rply['message_id']."status"?>" id="<?=$row_rply['message_id']."status" ?>" onchange="save(<?=$row_rply['message_id'] ?>)">
					  <option value="">Change</option>
					  <option value="1">New</option>
					  <option value="2">Reply</option>
					  <option value="3">Close</option>
					</select>
              <td class=center>
			  	<a href="view.php?msg_id=<?=$row_rply['message_id']; ?>" >
                <?   
				  $pr=$row_rply['priority'];
				  if($pr=='0')
					echo "Low";
				  if($pr=='1')
					echo "Medium";
				  if($pr=='2')
					echo "High";
				 ?>
                </a></td>
              <td class=center>
			  	<a href="view.php?msg_id=<?=$row_rply['message_id']; ?>" >
                <?   
					echo $db_date=$row_rply['msg_datetime'];
				?>
                </a></td>
              <td class=center>
			  	<a href="<?=SITE_URL;?>webadmin/reply.php?msg_id=<?=$row_rply['message_id']; ?>" class="buttonS bDefault opt tipS" title="Reply">
					<span class="icos-download"></span>
				</a>
                <!--<a href="<?=SITE_URL;?>webadmin/reply.php?msg_id=<?=$row_rply['message_id']; ?>"></a>-->
              </td>
             	<td><!--<a onClick="delete1(<?=$row_rply['message_id'] ;?>)" > </a>-->
					<a onClick="delete1(<?=$row_rply['message_id'] ;?>)" class="buttonS bDefault opt tipS" title="Delete">
						<span class="icos-cart"></span>
					</a>
				</td>
            </tr>
            <?
			} ?>
         	 <tr>
            	<td colspan="8" ><div style="float:right;"><?=$paginate; ?> </div></td>
          	 </tr>
          </tbody>
          
        </table>
        
      </form>
    </div>
  </div>
  <!--=========Reply tiket system close====-->
  <div class="wrapper">
    <div class="widget">
      <div class="whead">
        <h6>Close Tickets</h6>
        <div class="whead">
          <ul class="titleToolbar">
            <li>
				<!--<input type="submit" name="delete_data2" id="delete_data2" value="Delete" onClick="return validate2()" class="buttonS bRed"  />-->
				<a onclick="setaction('chkclose[]','delete_new', 'Are you sure, you want to delete selected records?', 'frmnewticket')" class="tipS" title="Delete">
					Delete
				</a>
			</li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <form class="tableName toolbar" id="frmclose" name="frmclose" method="post">
        <? 
				if(isset($_GET['limit']))
					$limit = mysql_escape_string($_GET['limit']);
				else
					$limit="50";
				$tableName="message_in";
				$targetpage = "inbox.php"; 		
				//$sql = "select *  from message_in where  msg_status='3' ORDER BY msg_datetime desc";
				if($search_for != "")
				{
					$sql = "select *  from message_in where msg_status='3' ".$search_for."  ORDER BY msg_datetime desc ";
				}else{
					$sql = "select *  from message_in where msg_status='3' ORDER BY msg_datetime desc  ";
				}
				$res = $db->execArrayQuery($sql);
				$num= $db->getRowsCount($res);
				$total_pages = $num;
				$stages = 3;
				if(isset($_GET['page2']))
					$page = mysql_escape_string($_GET['page2']);
				else 
					$page=0;
				if($page)
					$start = ($page - 1) * $limit; 
				else
					$start = 0;
				//$sql1 = "select *  from message_in where  msg_status='3' ORDER BY msg_datetime desc LIMIT $start, $limit";
				if($search_for != "")
				{
					$sql1 = "select *  from message_in where msg_status='3' ".$search_for."  ORDER BY msg_datetime desc LIMIT $start, $limit";
				}else{
					$sql1 = "select *  from message_in where msg_status='3' ORDER BY msg_datetime desc  LIMIT $start, $limit";
				}
				$db2->execArrayQuery($sql1);
				
				if ($page == 0){$page = 1;}
					$prev = $page - 1;	
					$next = $page + 1;							
					$lastpage = ceil($total_pages/$limit);		
					$LastPagem1 = $lastpage - 1;					
					
					
					$paginate = '';
				
					if($lastpage > 1)
					{	
						$paginate .= "<div style='flaot:left ;' >";
						// Previous
						if ($page > 1){
								$paginate.= "<a href='$targetpage?page=$prev' class='paginate_button' >previous</a>";
						}else{
							$paginate.= "<span  class='previous paginate_button paginate_button_disabled'>previous</span>";	}
							
				
						
						// Pages	
						if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
						{	
							for ($counter = 1; $counter <= $lastpage; $counter++)
							{
								if ($counter == $page){
									$paginate.= "<span class='paginate_active'>$counter</span>";
								}else{
									$paginate.= "<a href='$targetpage?page2=$counter' class='paginate_button' >$counter</a>";}					
							}
						}
						elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
						{
							// Beginning only hide later pages
							if($page < 1 + ($stages * 2))		
							{
								for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
								{
									if ($counter == $page){
										$paginate.= "<span class='paginate_active'>$counter</span>";
									}else{
										$paginate.= "<a href='$targetpage?page2=$counter' class='paginate_button' >$counter</a>";}					
								}
								$paginate.= "...";
								$paginate.= "<a href='$targetpage?page2=$LastPagem1'>$LastPagem1</a>";
								$paginate.= "<a href='$targetpage?page2=$lastpage'>$lastpage</a>";		
							}
							// Middle hide some front and some back
							elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
							{
								$paginate.= "<a href='$targetpage?page2=1' class='paginate_button'>1</a>";
								$paginate.= "<a href='$targetpage?page2=2' class='paginate_button'>2</a>";
								$paginate.= "...";
								for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
								{
									if ($counter == $page){
										$paginate.= "<span class='paginate_active'>$counter</span>";
									}else{
										$paginate.= "<a href='$targetpage?page2=$counter' class='paginate_button'>$counter</a>";}					
								}
								$paginate.= "...";
								$paginate.= "<a href='$targetpage?page2=$LastPagem1' class='paginate_button'>$LastPagem1</a>";
								$paginate.= "<a href='$targetpage?page2=$lastpage' class='paginate_button'>$lastpage</a>";		
							}
							// End only hide early pages
							else
							{
								$paginate.= "<a href='$targetpage?page2=1'>1</a>";
								$paginate.= "<a href='$targetpage?page2=2'>2</a>";
								$paginate.= "...";
								for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
								{
									if ($counter == $page)
									{
										$paginate.= "<span class='paginate_active'>$counter</span>";
									}else{
										$paginate.= "<a href='$targetpage?page2=$counter' class='paginate_button'>$counter</a>";}					
								}
							}
						}
				
									
								// Next
						if ($page < $counter - 1)
						{ 
							$paginate.= "<a href='$targetpage?page2=$next' class='paginate_button'>next</a>";
						}else
						{
							$paginate.= "<span class='paginate_button_disabled'>next</span>";
						}
							
							$paginate.= "</div>";		
						
							
					} 
					 $res = $db->execArrayQuery($sql);	
					 $count2=$db2->getRowsCount($res); ?>
        <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="closeAll">
          <thead>
            <tr>
              <th width="3%"><span class="closeIcon check">
                <input type="checkbox" id="titleCheck" name="titleCheck" />
                </span> </th>
              <th width="4%">From</th>
              <th width="10%">Name</th>
              <th>Subject</th>
              <th>Description</th>
              <th width="5%">Status</th>
              <th width="5%">priority</th>
              <th width="12%">Date/Time</th>
              <th width="5%">Reply</th>
              <th width="5%">Delete</th>
            </tr>
          </thead>
          <tbody>
      <?php
	  while($row=$db2->next())
	  {
	  		?>
            <tr>
              <!--<input type="hidden" name="count2" value="<?=$cnt2;?>"  />-->
              <td align="center">
			  	<input type="checkbox" name="chkclose[]" id="chkclose<?=$i?>" value="<?=$row['message_id'];?>" />
			  	<!--<input type="checkbox" name="msg3_<?php echo $cnt2; ?>" id="msg3_<?php echo $cnt2; ?>" value="<?=$row['message_id']; ?>"   />-->
			  </td>
              <td>
			  	<a href="view.php?msg_id=<?=$row['message_id']; ?>" > <? echo $row['userid']; ?> </a>
			  </td>
              <td>
			  	<?php	 
				if($row['userid'] != '0')
				{ 						 
					$qry_db_out = "select fullname from userdetail where userid = '".$row['userid']."' ";
				}else{
					$qry_db_out = "select concat(Con_FirstName,' ',Con_LastName) as fullname from configure where Con_Id = '1'";
				}
					//$qry_db_out = "select fullname from userdetail where userid = '".$row['userid']."' ";
				$db->execArrayQuery($qry_db_out);
				$po_rows = $db->next();
				?>
				<a href="view.php?msg_id=<?=$row['message_id']; ?>" > <? echo $po_rows['fullname']; ?> </a> </td>
         	    <td>
					<a href="view.php?msg_id=<?=$row['message_id']; ?>" > <? echo $row['msg_sub']; ?> </a>
				</td>
              <td style="height:50px !imortant;"><a href="view.php?msg_id=<?=$row['message_id']; ?>" >
                <? 
						  $desc = htmlentities(strip_tags($row['msg_desc'])); 
						  if(strlen($desc) > 50)
						  {
							$desc=substr($desc,0,50);
							$desc.=".....";
						  }
						  echo $desc;
						  ?>
                </a> </td>
              <td>
			  	<select name="<?=$row['message_id']."status"?>" id="<?=$row['message_id']."status" ?>" onchange="save(<?=$row['message_id'] ?>)">
				  <option value="">Change</option>
				  <option value="1">New</option>
				  <option value="2">Reply</option>
				  <option value="3">Close</option>
				</select>
			</td>
              <td class=center><a href="view.php?msg_id=<?=$row['message_id']; ?>" >
                <?   
				  $pr=$row['priority'];
				  if($pr=='0')
				  	echo "Low";
					if($pr=='1')
						echo "Medium";
					if($pr=='2')
						echo "High";
					
				 ?>
                </a> </td>
              <td class=center><a href="view.php?msg_id=<?=$row['message_id']; ?>" >
                <?   
				  	$db_date=$row['msg_datetime'];
					$date1=explode('-',$row['msg_datetime']); 
					echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
					$a = explode(' ',$db_date);
					echo  " &nbsp;/&nbsp;" .$a[1];
				 ?>
                </a> </td>
              <td><a  href="<?=SITE_URL;?>webadmin/reply.php?msg_id=<?=$row['message_id']; ?>" class="buttonS bDefault opt tipS" title="Reply"> <span class="icos-download"></span> </a> </td>
              <td><a onClick="delete1(<?=$row['message_id'] ;?>)" class="buttonS bDefault opt tipS" title="Delete"> <span class="icos-cart"></span> </a> </td>
            </tr>
            <? $cnt2++; ?>
            <? } ?>
            <tr>
              <td colspan="8" ><div style="float:right;"> <? echo $paginate; ?> </div></td>
            </tr>
          </tbody>
        </table>
        <!--<input type="submit" name="delete_data2" id="delete_data2" value="Delete" onClick="return validate2()" class="buttonS bRed"  />-->
      </form>
    </div>
  </div>
  
<script type="text/javascript">		
	<?		
	if(isset($msg) && !empty($msg)){
		?>
		$.jGrowl('<?=$msg?>');
		<?
	}
	if(isset($_GET['msg']) && !empty($_GET['msg']))
	{
		?>
		$.jGrowl('Record(s) successfully updated .');
		<?
	}
	?>
</script> 
  
</div>
<!-- Content ends -->
