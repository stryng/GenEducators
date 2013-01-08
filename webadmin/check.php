<?php
		include_once '../business_logic/config/configure.php';  
		require_once("../business_logic/class/form.class.php");
		$form = new Form();

        if($_POST['action'] == "emailsignup")
        {
			if(preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/",$_POST['email']))
			{
				//$username = trim(strtolower($_POST['username']));
				$email = trim(strtolower($_POST['email']));
				$email = mysql_real_escape_string($email);
				$result = $form->getRow("SELECT login FROM userdetail WHERE login= '$email' LIMIT 1");
				$num = (count($result)>1?1:0);
				echo $num;
			}
			else
			{
				echo 1;
			}
        }
        else if($_POST['action'] == "usersignup")
        {
            $username = trim(strtolower($_POST['username']));
			$username = mysql_real_escape_string($username);
            $result = $form->getRow("SELECT UserName  FROM userdetail WHERE UserName = '$username' LIMIT 1");
            $num = count($result);
            echo $num;
        }
/*        else if($_POST['action'] == "login")
        {
            $username = trim(strtolower($_POST['username']));
            $username = mysql_real_escape_string($username);
            $qry = "SELECT Login_Id,Password  FROM user_master WHERE Login_Id = '$username'";
            $dbcon->execArrayQuery($qry);
            $num = $dbcon->getRowsCount();
            if($num == 1)
            {
                $result = $dbcon->next();
                if($result['Password'] == $_POST['password'])
                {
                    $_SESSION['User_Name'] = $result['Login_Id'];
                    $_SESSION['Login_Id'] = $result['Login_Id'];
                    $_SESSION['usertype'] = "normaluser";
                    echo "Yes";
                }
                else
                    echo "No";
            }
            else
                echo "notexist";
        }
        else if($_POST['action'] == "owner_id_chk")
        {
            $login_id = trim(strtolower($_POST['login_id']));
            $login_id = mysql_real_escape_string($login_id);

            $qry = "SELECT Owner_Login_Id FROM owner_master WHERE Owner_Login_Id = '$login_id' LIMIT 1";
            $dbcon->execArrayQuery($qry);
            $result = $dbcon->next();
            $num = $dbcon->getRowsCount();
            echo $num;
        }
        else if($_POST['action'] == "owner_login_chk")
        {
            $username = trim(strtolower($_POST['username']));
            $username = mysql_real_escape_string($username);
            $qry = "SELECT Owner_Login_Id ,Password, Owner_Id, Owener_Name FROM owner_master WHERE Owner_Login_Id = '$username'";
            $dbcon->execArrayQuery($qry);
            $num = $dbcon->getRowsCount();
            if($num == 1)
            {
                $result = $dbcon->next();
                if($result['Password'] == $_POST['password'])
                {
                    $_SESSION['Owner_Login_Id'] = $result['Owner_Login_Id'];
                    $_SESSION['Owner_Id'] = $result['Owner_Id'];
                    $_SESSION['Owener_Name'] = $result['Owener_Name'];
                    $_SESSION['usertype'] = "owner";
                    echo "Yes";
                }
                else
                    echo "No";
            }
            else
                echo "notexist";
        }
        else if($_POST['action'] == "admin_login_chk")
        {
            $username = trim(strtolower($_POST['username']));
            $username = mysql_real_escape_string($username);
            $qry = "SELECT Login_Id ,Password, First_Name, Last_Name FROM user_master WHERE Login_Id = '$username'";
            $dbcon->execArrayQuery($qry);
            $num = $dbcon->getRowsCount();
            if($num == 1)
            {
                $result = $dbcon->next();
                if($result['Password'] == $_POST['password'])
                {
                    $_SESSION['Login_Id'] = $result['Login_Id'];
                    $_SESSION['First_Name'] = $result['First_Name'];
                    $_SESSION['Last_Name'] = $result['Last_Name'];
                    $_SESSION['usertype'] = "admin";
                    echo "Yes";
                }
                else
                    echo "No";
            }
            else
                echo "notexist";
        }
*/
?>