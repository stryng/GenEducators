<?php 

	if(isset($_REQUEST['msg']) && !empty($_REQUEST['msg'])) $msg=$_REQUEST['msg'];



	$table = "userdetail";

	$title = "Member Listing";

	$selected = "Active";

	function chk_type($search_word)

	{

			$findme = ' ';

			$pos = strpos($search_word, $findme);

			if(strlen($search_word)>0 ){

				if ($pos !== false) {

					$keyword = explode(' ',$search_word);

					$type = "and ( FirstName like '%".trim(strtolower ($keyword[0]))."%' or LastName like '%".trim(strtolower ($keyword[1]))."%' ) ";

				}else{

					$findme = '@';

					$pos = strpos($search_word, $findme);

					if ($pos !== false) {

						if(is_numeric($search_word))

						{

							$type = "and UserId = '".$search_word."'";

						}

						else

						{

							$type = "and Email like '%".$search_word."%'";

						}

					}else{

						if(is_numeric($search_word))

						{

							$type = "and UserId = '".$search_word."' ";

						}

						else

						{

							$type = "and( FirstName like '%".trim(strtolower ($search_word))."%' or LastName like '%".trim(strtolower ($search_word))."%' )";

						}

					}

				}	

			}else{

				$type = " and active = ".$selected;		

			}

			return $type;

	}

	$rtn_type = "";

	if( isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != "")

	{

		$selected = isset($_REQUEST['status'])?$_REQUEST['status']:"";

		$search_word = trim($_REQUEST['keyword']);

		$rtn_type = chk_type($search_word);

		$keyword = explode(' ',$search_word);

	}



	$form = new Form();

	$form->PaginationTable($table);

	$form->PageName = (isset($_REQUEST['keyword'])&& $_REQUEST['keyword']!="")?"file=member_list&keyword=".$_REQUEST['keyword']:"file=member_list";;

	$limit = (isset($_GET['limit']) && $_GET['limit']>0)?$_GET['limit']:10;

	$form->PageLimit($limit);	

	if(isset($_POST['keyword']) && $_POST['keyword']!= "")

	{

		$_GET['page'] == 0;

	}

	$form->getPage($_GET['page']);

	$sql  = "SELECT * FROM `{$table}` WHERE 1 $rtn_type ";

	$rows = $form->getParray($sql);



?>

<script language="javascript">

	function open_win(id,name)

	{

		window.open("<?=MEMBER_URL?>updateprofile.php?user_id="+id+"&user_name="+name)

	}

	function edituser(uid)

	{

		window.location.href = "<?=ADMIN_URL?>index.php?file=edit_user_detail&uid="+uid;

	}

	function getSearch() {

		//var page = '<?php echo isset($_GET['page'])?$_GET['page']:0; ?>';

		//window.location = '?file=member_list&page='+page+'&keyword='+document.getElementById('keyword').value;

		document.searchform.submit();

	}

	function activatemember(objid,objpasskey,username)

	{

		jQuery.ajax({

                       type: "POST",

                       url: "activatemember.php",

                       data: 'activatemember=yes&usersid='+ objid+'&passkey='+objpasskey,

                       cache: false,

                       success: function(response)

                       {

                            if(response == "1")

                            {

								window.location = "<?=INDEX_FILE?>member_list<?=$str_url?>";

								/*document.getElementById("acivatemember"+objid).innerHTML = '<a class="acolor" href="javascript:open_win('+objid+',\''+username+'\')"> GO </a>';

								alert("Memer activated successfully");*/

								

                            }

                            else

                            {

								alert("Memer is not activated");

                            }

                        }

                });

	}

	function activationmail(objid)

	{

		jQuery.ajax({

                       type: "POST",

                       url: "resend_activation_mail.php",

                       data: 'usersid='+ objid,

                       cache: false,

                       success: function(response)

                       {

                            if(response == "check_user")

                            {

								alert("User is not activate successfully, Please Check user details.");

                            }

                            else if(response == "fail")

                            {

								alert("Mail not send.");

                            }

							else

							{

								alert("Activation mail sent successfully.");

							}

                        }

                });

	}

</script>

<!-- full width -->

<div id="content">

  <div class="wrapper">

		<div class="widget" >

			<div class="whead">

				<h6>

					<span class="ico  gray arrow_bidirectional"></span><?php echo $title; ?>

				</h6> 

					<a class="buttonH bGreen"  title="Add Product" href="<?=INDEX_FILE?>user_signup" target="_blank">Add New Member</a>

				<div class="clear"></div> 

				

			</div> <!-- whead end -->

			

			<div class="tablePars">

				<div class="dataTables_filter"> 

				  <div >

					<form name="searchform" id="searchform" method="post" action="index.php?file=member_list<?=$str_url?>">

						<table width="100%">

							<tr>

								<td>

								<div class="floatleft padleft20">

								<span> Search Member </span>

									<input type="hidden" name="option" id="option" value="business_name"/>

									<input type="text" size="30" class="border_blue width_set textfield" name="keyword"  id="keyword" value="<? echo isset($_REQUEST['keyword'])?$_REQUEST['keyword']:""; ?>">

							</div>

							<div class="floatleft padleft20">

								<!-- <input type="submit" style="display:none;" /> -->

								<a  onclick="javascript:getSearch();" class="buttonS bBlue mb10">Search</a>

								<a href="<?=INDEX_FILE?>member_list" class="buttonS bRed mb10">Refresh</a>

							</div>

							<div style="clear:both;"></div>

								</td>

								<td style="float:right;" align="right"  width="100">

									<?php echo $form->ShowLimit("Show Entries:",array("5","10",20,30,40,50)); ?>

								</td>

							</tr>

						</table>

					</form>

				  </div>

				</div> <!-- dataTables_filter End -->

				<div class="dataTables_length">

			</div>

		 	</div> <!-- tablePars End -->

      		<div class="clear"></div>

			

			 <div class="hiddenpars">

        		<form class="tableName toolbar" id="frm_memberlist" name="frm_memberlist" method="post" action="<?=INDEX_FILE?>member_list<?=$str_url?>">

				  <input type="hidden" name="action" id="action" />

				  <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="checkAll">

					<thead>

						  <tr>

								<td>Name</td>

								<td>Inviter</td>

								<td>Email</td>

								<td>Status</td>

								<td>Payment</td>

								<td>Date Joined</td>

								<td>Date Upgraded</td>

								<td>GO/Active</td>

								<td>Edit</td>

								<td>Resend-Mail</td>

						  </tr>

					</thead>

					<tbody>

					  	<?php  

								$inviter = "inviter";

								$sec_table = "m_payment_fee";



								if(is_array($rows) && sizeof($rows)) { 

									foreach($rows as $row) { 
										$query = "SELECT FirstName,LastName FROM $table WHERE UserId = '".$row[$inviter]."'";

										$sql = $dbobj->select($query);

										$qry = "SELECT activedeactive,payment_done,payment_datetime FROM $sec_table WHERE usertb_id = '".$row['UserId']."'";

										$act_inact = $dbobj->select($qry);

											?>	

											<tr>

												<td><?=$row["FirstName"];?>&nbsp;<?=$row["LastName"];?></td>

												<td><?=$sql[0]['FirstName'];?>&nbsp;<?=$sql[0]['LastName'];?></td>

												<td><?=$row['Email'];?></td>

												<td><?=isset($act_inact[0]['activedeactive'])? (($act_inact[0]['activedeactive'] =='active')?"Active":"Inactive"):"Inactive";?></td>

												<td><? if($act_inact[0]['payment_done']=='YES'){ echo "Yes"; }else{ echo "No"; } ?></td>

												<td><? echo $row['joindate']?></td>

												<td><? echo $act_inact[0]['payment_datetime']?></td>

												<?php

												if($row['UserId'] == 1)

												{

													echo "<td>&nbsp;</td>";

												}

												else if($row['entry'] == 'prepaid')

												{

													?>

													<td><a class="acolor" href="javascript:open_win(<?=$row['UserId']?>,'<?=$row['UserName']?>')"> GO </a></td>

													<?php

												}

												else

												{

													?>

													<td id="acivatemember<?=$row['UserId']?>"><a class="acolor" href="javascript:void(0);" onclick="activatemember(<?=$row['UserId']?>,'<?=$row['usercode']?>','<?=$row['UserName']?>')"> Activate </a></td>

													<?php

												}

												if($row['UserId'] == 1)

												{

													echo "<td>&nbsp;</td>";

												}

												else

												{

													?>

													<td><a class="acolor" href="javascript:edituser(<?=$row['UserId']?>)"> Edit </a></td>

													<?php

												}

												if($row['UserId'] == 1)

												{

													echo "<td>&nbsp;</td>";

												}

												else if($row['entry'] == 'prepaid')

												{

													?>

													<td>--</td>

													<?php

												}

												else

												{

													?>

													<td><a class="acolor" href="javascript:void(0);" onclick="activationmail(<?=$row['UserId']?>)"> Resend Mail</a></td>

													<?php

												}

												?>

											</tr>

											<?php

									}

								}else{ 

					?>

							<tr>

								<td>No record found</td>

							</tr>

						<?php } ?>

					 </tbody>

				  </table>

				</form>

        		<div class="fg-toolbar tableFooter">

          			<div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> 

					 <?php echo $form->pageLinks();  ?>

					 </div>

        		</div>

      		</div> <!-- hiddenpars End -->

		</div>

	</div> <!-- content end -->

</div> <!-- wrapper end -->

<!-- End full width -->





