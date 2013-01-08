<?php
		include_once 'business_logic/config/configure.php';  
		require_once("business_logic/class/form.class.php");
		$form = new Form();
		$result_cnt = $form->getRow("SELECT count(*) as tot FROM userdetail");
		if(isset($_GET['new']))
        {
				echo "Total Members: ".$result_cnt[0]."<br>";
				$result = $form->getArray("SELECT UserId,Email FROM userdetail ORDER BY UserId desc LIMIT 0, 10");
				if(sizeof($result)>0)
				{
					for($i=0;$i<sizeof($result);$i++)
					{
						echo "UesrId: ".$result[$i]['UserId']."<br>";
						echo "Email: ".$result[$i]['Email']."<br>";
						echo "&nbsp;<br>";
						echo "=============================<br>";
					}
					$_SESSION['updated_userlist'][0] = $result[0]['UserId'];
				}
				else
				{
					echo "No User Found";
				}
		}
		else
		{
				$result = $form->getArray("SELECT UserId,Email FROM userdetail WHERE UserId > '".$_SESSION['updated_userlist'][0]."' ORDER BY UserId desc LIMIT 0, 10");
				if(sizeof($result)>0)
				{
					//echo "Total Members: ".$result_cnt[0]."<br>";
					for($i=0;$i<sizeof($result);$i++)
					{
						echo "UesrId: ".$result[$i]['UserId']."<br>";
						echo "Email: ".$result[$i]['Email']."<br>";
						echo "&nbsp;<br>";
						echo "=============================<br>";
					}
					$_SESSION['updated_userlist'][0] = $result[0]['UserId'];
				}
		}
?>