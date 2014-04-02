<?php

?>
<ul>
	<li><a href="index.php" <?php if($page=="index.php"){ echo "class=selected";} ?>>Home</a></li>
		<li><a href="aboutus.php" <?php if($page=="aboutus.php"){ echo "class=selected";} ?>>About Us</a>
			  <ul style="background:#e3ffd5; border:1px solid #ccc;">
				<li><a href="aboutus.php" style="color:#000;">Introduction</a></li>
				<li><a href="mission.php" style="color:#000;" >Mission & Vission</a></li>
    		</ul>
		</li>
	<li><a href="projects.php" <?php if($page=="projects.php") { echo "class=selected"; } ?>>Projects</a>
		  <ul style="background:#e3ffd5; border:1px solid #ccc;">
			  <li><a href="current.php" style="color:#000;">Current Projects</a>
		  <ul style="background:#e3ffd5; border:1px solid #ccc;">
			    <li><a href="booking.php" style="color:#000;">Booking Status</a></li>
			    <li><a href="project.php" style="color:#000;">Project Highlights</a></li>
		 </ul>
    </li>
		 		 <li><a href="completedprojects.php" style="color:#000;">Completed Projects</a></li>
				  <li><a href="featuredprojects.php" style="color:#000;">Featured Projects</a></li>
		  </ul>
	</li>
	<li><a href="nris.php">NRI's</a>   <ul style="background:#e3ffd5; border:1px solid #ccc;">
		  <li><a href="faqs.php" style="color:#000;">FAQ's</a></li>
		  <li><a href="nri.php" style="color:#000;">NRI Gallery</a>
	</li>
	  </ul>
	 </li>
		<li><a href="rbi.php" <?php if($page=="rbi.php") { echo "class=selected"; } ?>>RBI Guidelines</a>
	 </li>
	 <li><a href="advance.php" <?php if($page=="advance.php") { echo "class=selected"; } ?>>Advance Search</a></li>
	 <li><a href="contact.php" <?php if($page=="contact.php") { echo "class=selected"; } ?>>Contact</a></li>
	 <li><a href="careers.php" <?php if($page=="careers.php") { echo "class=selected"; } ?>>Careers</a></li>
</ul>