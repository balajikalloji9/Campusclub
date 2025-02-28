	<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				
				 
				<ul class="nav nav-list">
				
					
					<?php  $uri = $this->uri->segment(2); 


					?>
					
				
					
					<li class="<?php if($uri=='dashboard') echo 'active';?>">
						<a href="<?php echo site_url();?>user/dashboard">
							<i class="menu-icon blue fa fa-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>
    	
			
					<li class="<?php if($uri=='change_password') echo 'active';?>">
								<a href="<?php echo site_url();?>user/change_password">
									<i class="menu-icon fa fa-lock blue"></i>	
									 <span style="padding:3px">Change Password</span>
								</a>
								<b class="arrow"></b>
							</li>


					
					
					<li class="">
						<a href="<?php echo site_url();?>user/logout" >
							<i class="menu-icon blue fa fa-power-off"></i>
							<span class="menu-text"> Logout </span> 
						</a>
					</li> 
					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>