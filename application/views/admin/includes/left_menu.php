	<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
			<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						
						
						<a class="btn btn-info" href="<?php echo site_url();?>admin/change_password" title="Add Voucher">
							<i class="fa fa-file-text fa-lg"></i>
						</a>

						<a class="btn btn-info" href="<?php echo site_url();?>admin/login/logout" title="Capture Payments">
							<i class="menu-icon fa-lg fa fa-power-off"></i>
						</a>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div> -->
				<!-- /.sidebar-shortcuts -->
				 
				<ul class="nav nav-list">
				
					
					<?php  $uri = $this->uri->segment(2); 

					//echo '<pre>';print_r($roleResponsible);exit;

					?>
					
				
					
					<li class="<?php if($uri=='dashboard') echo 'active';?>">
						<a href="<?php echo site_url();?>admin/dashboard">
							<i class="menu-icon blue fa fa-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>
				
					<li class="<?php if($uri=='all_students') echo 'active';?>">	
						<a href="<?php echo site_url();?>admin/students/all">	
							<i class="menu-icon blue fa fa-users bigger-120"></i> 
							<span class="menu-text">All Registered Students</span>
						</a>	
						<b class="arrow"></b>	
				        </li>
				
				<li class="<?php if($uri=='slots') echo 'active';?>">
								<a href="<?php echo site_url();?>admin/slots">
									<i class="menu-icon fa fa-calendar blue"></i>	
									 <span style="padding:3px">Total Slots</span>
								</a>
								<b class="arrow"></b>
							</li>

				<li class="<?php if($uri=='slot_bookings') echo 'active';?>">
								<a href="<?php echo site_url();?>admin/slot_bookings">
									<i class="menu-icon fa fa-bar-chart blue"></i>	
									 <span style="padding:3px">Slot Bookings</span>
								</a>
								<b class="arrow"></b>
							</li>
				

				

					

			

			

			

				

				
				
				

			
				


				 
<?php if((!empty($roleResponsible['roles'])) || (!empty($roleResponsible['employees'])) ){ ?>
				 
	<li class="xn-openable <?php if($uri == "roles" || $uri == "add_roles" || $uri == "edit_roles" || $uri == "employees" || $uri == "add_employees" || $uri == "edit_employees" || $uri == "view_role_employees" ||  $uri == "view_employee" ): echo "active"; endif; ?>">
            
            <a href="#" class="dropdown-toggle">
							<i class="menu-icon blue fa fa-sitemap"></i>
							<span class="menu-text"> Roles </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
           <b class="arrow"></b>

			<ul class="submenu">

		<?php if(!empty($roleResponsible['roles'])){ ?>
            
            <li <?php if($uri == "roles" || $uri == "add_roles" || $uri == "edit_roles" || $uri == "view_role_employees"): echo "class='active'"; endif; ?>>
            
            <a href="<?php echo base_url();?>admin/roles/roles">	
							<i class="menu-icon fa fa-sitemap blue"></i>	
							<span class="menu-text"> Roles</span>
						</a>  
            </li>
        <?php }?> 

           <?php if(!empty($roleResponsible['employees'])){ ?>
            <li <?php if($uri == "employees" || $uri == "add_employees" || $uri == "edit_employees" ||  $uri == "view_employee"): echo "class='active'"; endif; ?>>
            
            <a href="<?php echo base_url();?>admin/roles/employees">	
							<i class="menu-icon fa fa-user-plus blue"></i>	
							<span class="menu-text"> Employees</span>
						</a>      
            </li>
          <?php }?> 

           </ul>
          </li>
 			
 			
         	<?php }?>

         	<!-- <li class="<?php if($uri=='loans') echo 'active';?>">
								<a href="<?php echo site_url();?>admin/loans">
									<i class="menu-icon fa fa-lock blue"></i>	
									 <span style="padding:3px">Loans</span>
								</a>
								<b class="arrow"></b>
							</li> -->
			
					<li class="<?php if($uri=='change_password') echo 'active';?>">
								<a href="<?php echo site_url();?>admin/change_password">
									<i class="menu-icon fa fa-lock blue"></i>	
									 <span style="padding:3px">Change Password</span>
								</a>
								<b class="arrow"></b>
							</li>


					
					
					<li class="">
						<a href="<?php echo site_url();?>admin/login/logout" >
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