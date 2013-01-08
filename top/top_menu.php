<div class="wrapper col1">

  <div id="header">

    <div id="topnav">

      <ul>

		<?php

			if(isset($_SESSION['userid']))

			{

				?>

		        <li class="home_nav <?php echo (basename($_SERVER['PHP_SELF'])=="logout.php"?'active':''); ?> "><a href="logout.php" <?php echo (basename($_SERVER['PHP_SELF'])=="logout.php"?'class="active"':''); ?> >Logout</a></li>

				<?php

			}

			else

			{

				?>

        		<li class="home_nav <?php echo (basename($_SERVER['PHP_SELF'])=="login.php"?'active':''); ?> "><a href="index.php" <?php echo (basename($_SERVER['PHP_SELF'])=="login.php"?'class="active"':''); ?> >Login </a></li>

				<?php

			}

			?>

        <li class="home_nav <?php echo (basename($_SERVER['PHP_SELF'])=="sign-up.php"?'active':''); ?> "><a href="sign-up.php" <?php echo (basename($_SERVER['PHP_SELF'])=="sign-up.php"?'class="active"':''); ?> >Sign-Up</a></li>

        <li class="overview_nav <?php echo (basename($_SERVER['PHP_SELF'])=="about-us.php"?' active':''); ?> "><a href="about-us.php" <?php echo (basename($_SERVER['PHP_SELF'])=="about-us.php"?'class="active"':''); ?> > About Us</a></li>

        <li class="home_nav <?php echo (basename($_SERVER['PHP_SELF'])=="index.php"?'active':''); ?> "><a href="index.php" <?php echo (basename($_SERVER['PHP_SELF'])=="index.php"?'class="active"':''); ?> >Home </a></li>

      </ul>

    </div>

    <div id="logo">

     <a href="index.php"> <img src="images/logo.png" /> <img src="images/students_hands_up.png" class="logosecond" /></a>
	

    </div>

    <br class="clear" />

  </div>

</div>