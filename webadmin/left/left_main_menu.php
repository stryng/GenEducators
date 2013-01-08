<div class="mainNav">
  <?php /*?><div class="user"><a title="" class="leftUserDrop"> <img src="images/userLogin2.png" alt="" width="72px" height="70px"> </a> <span>admin</span>
    <ul class="leftUser">
      <li><a href="index.php?file=configure_detail&amp;txtsystem_configid=1" title="" class="sProfile">My profile</a></li>
      <!--<li><a href="#" title="" class="sSettings">Settings</a></li>-->
      <li><a href="index.php?file=logoff_admin" title="" class="sLogout">Logout</a></li>
    </ul>
  </div><?php */?>
  <!-- Responsive nav -->
  <div class="altNav">
    <?php /*?><div class="userSearch">
      <form action="">
        <input type="text" placeholder="search..." name="userSearch">
        <input type="submit" value="">
      </form>
    </div><?php */?>
    <!-- User nav -->
    <ul class="userNav">
      <li><a href="#" title="" class="profile"></a></li>
      <li><a href="#" title="" class="messages"></a></li>
      <li><a href="#" title="" class="settings"></a></li>
      <li><a href="#" title="" class="logout"></a></li>
    </ul>
  </div>
  <!-- Main nav  class="active" -->
	<ul class="nav">
		<li><a href="index.php?file=profile&userid=1" title="" class="dash" ><img src="images/icons/mainnav/dashboard.png" alt=""><span>Admin Profile</span></a></li>
		<li><a title="" href="index.php?file=member_list" class="tracking"><img src="images/icons/color/sitemap.png" alt=""><span>Member List</span></a>
				<ul class="sub_tracking">
					<li><a href="index.php?file=volunteers" title="">Matricies</a></li>
                    <li><a href="index.php?file=yesterday_lvl_summery" title="">Summary</a></li>
			  </ul>
		</li>
		<li><a title="" class="location"><img src="images/icons/color/sitemap.png" alt=""><span>Ticket</span></a>
			<ul class="sub_location">
					<li><a href="index.php?file=message_create" title="">New Ticket</a></li>
					<li><a href="index.php?file=message" title="">Inbox</a></li>
			</ul>
		</li>
		<li><a title="" href="index.php?file=page_content_listing" ><img src="images/icons/color/sitemap.png" alt=""><span>CMS</span></a>
		<li><a title="" href="index.php?file=friends_list" ><img src="images/icons/color/sitemap.png" alt=""><span>View Friends</span></a>
	</ul>
</div>
