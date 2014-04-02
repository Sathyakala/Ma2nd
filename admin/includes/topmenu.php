<div class="menu">
                    <ul>
                    <li><a href="index.php" <?php if($page=='index.php'){ ?> class="current" <?php } ?>>Admin Home</a></li>
                    <li><a href="users.php" <?php if($page=='users.php' || $page=='users_edit.php'){ ?> class="current" <?php } ?>>Manage Users<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="users.php" title="">All Users</a></li>
                        <li><a href="users.php?sid=1" title="">Active Users</a></li>
                        <li><a href="" title="">Pending Users</a></li>
                        <li><a href="users.php?sid=0" title="">Deactive Users</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="articles.php" title="Articles" <?php if($page=='articles.php' || $page=='articles_add.php' || $page=='articles_edit.php'){ ?> class="current" <?php } ?>>Articles</a>
                        <ul>
						<li><a href="articles.php" title="Articles List">Articles List</a></li>
                        <li><a href="articles_add.php" title="Articles Add">Add Articles</a></li>
                        
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="futurehome.php" title="Futured Homes" <?php if($page=='futurehome.php' || $page=='futurehome_add.php' || $page=='futurehome_edit.php'){ ?> class="current" <?php } ?>>Featured Homes<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
						<li><a href="futurehome.php" title="FuturedHomes List">FeaturedHomes List </a></li>  
                        <li><a href="futurehome_add.php" title="Add FuturedHomes">Add FeaturedHomes</a></li>     
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    
                    <li><a href="services.php" title="Services" <?php if($page=='services.php' || $page=='services_add.php' || $page=='services_edit.php'){ ?> class="current" <?php } ?>>Services</a>
					
					    <ul>
                        <li><a href="services.php" title="Services List">Services List</a></li>					
						<li><a href="services_add.php" title="Add Services">Add Services</a></li>
                        </ul>
					
					</li>
					
					
					
					<li><a href="communities.php" title="Communities" <?php if($page=='communities.php' || $page=='communities_add.php' || $page=='communities_edit.php'){ ?> class="current" <?php } ?>>Communities</a>
					
					    <ul>
                        <li><a href="communities.php" title="Communities List">Communities List</a></li>					
						<li><a href="communities_add.php" title="Add Communities">Add Communities</a></li>
                        </ul>
					
					</li>
					
					
					
					
					
					<li><a href="newsletter.php" title="Newsletter" <?php if($page=='newsletter.php' || $page=='sendmail.php' || $page=='newsletter_edit.php'){ ?> class="current" <?php } ?>>Newsletter<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
						<li><a href="newsletter.php" title="Send Mail">Newsletter List</a></li>
						<li><a href="sendmail.php" title="Send Mail">Send Mail</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    
                    <li><a href="sitecontent.php" title="Sitecontent" <?php if($page=='sitecontent.php' || $page=='sitecontent_edit.php'){ ?> class="current" <?php } ?>>Sitecontent</a></li>

					<!--<li><a href="sitemanagement.php">Manage Site</a></li>-->
                    </ul>
                    </div>