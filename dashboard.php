	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">
					try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
				</script>
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="dashboard">Home</a>
					</li>
					<li class="active">Dashboard</li>
				</ul><!-- /.breadcrumb -->						
			</div>
			<div class="page-content">						 
				<div class="page-header">
					<?php 
						if($this->session->flashdata('message')!=''){
						?>						
						<div class="alert alert-success alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<?php echo $this->session->flashdata('message');?>
						</div>	
						<?php 
						}
					?>				
					<h1 class="col-lg-6 col-md-3 col-sm-3 col-xs-9  pdg-top-10">
					<i class=" pull-left blue fa fa-dashboard"></i>
						Dashboard  
					</h1>
					<!-- <div class="pull-right">								
						<a class="btn btn-success btn-sm" href="<?php echo site_url();?>master/hyderabad_city_tour_booking_data" type="button"><i class="fa fa-bar-chart fa-lg"></i> </a>
						<a class="btn btn-warning btn-sm" href="<?php echo site_url();?>master/ramoji_film_city_booking_data" type="button"><i class="fa fa-bar-chart fa-lg"></i>  </a>
						 <input type="hidden" name="hiv" id="hiv" value="0" />
	               </div> -->
				</div><!-- /.page-header -->
				<div class="row">
					<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
						<div class="widget-item-icon" onclick="location.href='<?php echo base_url('admin/users')?>';" style="color:blue">
							<div class="edu_color_boxes box_left">
	    						<div class="edu_dash_box_data">
	    							   <h4><b>Users</b></h4>
	    							   <p><span><b><?php echo $users_count;?></b></span></p>	
	    						</div>
	    						<div class="edu_dash_box_icon">
									<i class="fa fa-cog" aria-hidden="true"></i>
	    						</div>
	    					</div>                                  
				        </div>
					</div>

					<?php foreach($sports as $sport){?>
					<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
						<div class="widget-item-icon" onclick="location.href='<?php echo base_url('admin/batchs')?>';" style="color:blue">
							<div class="edu_color_boxes box_left">
	    						<div class="edu_dash_box_data">

	    							   <h4><b><?php echo $sport['name']?></b></h4>

	    							   <ul><a href="<?php echo base_url('admin/bookings/all').'/'.$sport['id']?>"><span><b><?php $sport_id=$sport['id'];
$booking_count=$this->db->query('select id from bookings where sport_id='.$sport_id.'')->result_array();
	    							    echo count($booking_count);?></b></span></a></ul>	
	    						</div>
	    						<div class="edu_dash_box_icon">
									<i class="fa fa-futbol-o" aria-hidden="true"></i>
	    						</div>
	    					</div>                                    
				        </div>
					</div><!-- /.col -->
				<?php }?>
					
				
					<!--<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
						<div class="widget-item-icon" onclick="location.href='#';" style="color:orange">
							<div class="edu_color_boxes box_left">
	    						<div class="edu_dash_box_data">
	    							   <h4><b>Notifications</b></h4>
	    							   <p><span><b>23</b></span></p>	
	    						</div>
	    						<div class="edu_dash_box_icon">
									<i class="fa fa-cog" aria-hidden="true"></i>
	    						</div>
	    					</div>
				        </div>
					</div>
					<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
						<div class="widget-item-icon" onclick="location.href='#';" style="color:blue">
							<div class="edu_color_boxes box_left">
	    						<div class="edu_dash_box_data">
	    							   <h4><b>Schedule</b></h4>
	    							   <p><span><b>13</b></span></p>	
	    						</div>
	    						<div class="edu_dash_box_icon">
									<i class="fa fa-cog" aria-hidden="true"></i>
	    						</div>
	    					</div>                                     
				        </div>
					</div>
					<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
						<div class="widget-item-icon" onclick="location.href='#';" style="color:green">
							<div class="edu_color_boxes box_left">
	    						<div class="edu_dash_box_data">
	    							   <h4><b>Exams</b></h4>
	    							   <p><span><b>300</b></span></p>	
	    						</div>
	    						<div class="edu_dash_box_icon">
									<i class="fa fa-cog" aria-hidden="true"></i>
	    						</div>
	    					</div>                                      
				        </div>
					</div>
				</div>
					<div class="row">
						<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
							<div class="widget-item-icon" onclick="location.href='#';" style="color:blue">
								<div class="edu_color_boxes box_left">
		    						<div class="edu_dash_box_data">
		    							   <h4><b>Materials</b></h4>
		    							   <p><span><b>1200</b></span></p>	
		    						</div>
		    						<div class="edu_dash_box_icon">
										<i class="fa fa-cog" aria-hidden="true"></i>
		    						</div>
		    					</div>
					        </div>
						</div>
						<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
							<div class="widget-item-icon" onclick="location.href='#';" style="color:red">
								<div class="edu_color_boxes box_left">
		    						<div class="edu_dash_box_data">
		    							   <h4><b>Feedback</b></h4>
		    							   <p><span><b>133</b></span></p>	
		    						</div>
		    						<div class="edu_dash_box_icon">
										<i class="fa fa-cog" aria-hidden="true"></i>
		    						</div>
		    					</div>                                    
					        </div>
						</div>
						<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
							<div class="widget-item-icon" onclick="location.href='#';" style="color:orange">
								<div class="edu_color_boxes box_left">
		    						<div class="edu_dash_box_data">
		    							   <h4><b>Report your Problem</b></h4>
		    							   <p><span><b>10</b></span></p>	
		    						</div>
		    						<div class="edu_dash_box_icon">
										<i class="fa fa-cog" aria-hidden="true"></i>
		    						</div>
		    					</div>                                      
					        </div>
						</div> -->
					</div>
				</div><!-- /.row -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
		<!--[if !IE]> -->
		
		
		