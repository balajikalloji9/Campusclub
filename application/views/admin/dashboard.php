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
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
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
				
				</div><!-- /.row -->

 <!-- <h1>Google Calendar</h1>
    <div>
        <iframe src="https://calendar.google.com/calendar/embed?src=your_calendar_id&ctz=Your/Timezone"
                style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>  -->
				<section class="edu_admin_content">  
          <div class="">
            <div class="">             
                <div class="row">
                  <div class="col-xl-12 col-lg-4 col-md-4 col-sm-12 col-12">
                    
                   <!--  <h1>Google Calendar</h1>
    <div>
        <iframe src="https://calendar.google.com/calendar/embed?src=your_calendar_id&ctz=Your/Timezone"
                style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div> -->

    <div class="container mt-5">

    <div class="row">   
    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9"> 
    <h2 >Booking Calendar</h2>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
     <div class="arrows" style="padding:5%;margin-left:50px">
     <button class="arrow left-arrow" onclick="goBack()">&#8592;</button> 
     <button class="arrow right-arrow" onclick="goForward()">&#8594;</button>
     </div>
    </div>

    </div>

    <!-- Show flash message -->
    

    <div class="calendar table-container" id="calender_id">
        
    </div>

    <div id="slotModal" class="modal" tabindex="-1" role="dialog">
        
    </div>
</div>

<script>
    // Handle slot booking
    $(document).on('click', '.date-cell .btn', function() {
        var slotId = $(this).data('slot-id');
        var currentDay = $(this).data('current-day');
      var presentMonth=$("#present_month").val();
        if (!$(this).hasClass('booked')) {
            
            $.ajax({
            type: 'post',
            url: '<?=base_url();?>user/get_model_popup_data',
            data: {slot_id: slotId,current_day: currentDay,present_month: presentMonth},
            beforeSend: function(xhr){
              xhr.overrideMimeType("text/plain; charset=utf-8");
              $("#wait").css("display", "block");
            },
            success: function(data){ 
              //var json = $.parseJSON(data); 
              //alert("OTP Send Successfully");
              $("#slotModal").html(data);
              $('#slot_id').val(slotId);
              $('#slotModal').modal('show');
            }
          });
        }
    });
</script>

<script>
    function goBack() {
      //window.history.back();
     
      var value="back";
      var present_month=$("#present_month").val();
      var month= parseInt(present_month)-1;
      if(month == 0){
        var newMonth=12;
      }else{
        var newMonth=month;
      }

    $.ajax({
            type: 'post',
            url: '<?=base_url();?>user/get_calender_data',
            data: {present_month: newMonth,value:value},
            beforeSend: function(xhr){
              xhr.overrideMimeType("text/plain; charset=utf-8");
              $("#wait").css("display", "block");
            },
            success: function(data){ 
              //var json = $.parseJSON(data); 
              //alert("OTP Send Successfully");
              $("#calender_id").html(data);
            }
          });

    }

    function goForward() {
      //window.history.forward();

      var value="next";
      var present_month=$("#present_month").val();
      var month= parseInt(present_month)+1;
      if(month == 13){
        var newMonth=1;
      }else{
        var newMonth=month;
      }
    $.ajax({
            type: 'post',
            url: '<?=base_url();?>user/get_calender_data',
            data: {present_month: newMonth,value:value},
            beforeSend: function(xhr){
              xhr.overrideMimeType("text/plain; charset=utf-8");
              $("#wait").css("display", "block");
            },
            success: function(data){ 
              //var json = $.parseJSON(data); 
              //alert("OTP Send Successfully");
              $("#calender_id").html(data);
            }
          });
    }

    $(window).on('load', function() {
      // Your jQuery function here
      var value="present";
      var present_month=<?php echo date('m') ?>;

      $.ajax({
            type: 'post',
            url: '<?=base_url();?>user/get_calender_data',
            data: {present_month: present_month,value:value},
            beforeSend: function(xhr){
              xhr.overrideMimeType("text/plain; charset=utf-8");
              $("#wait").css("display", "block");
            },
            success: function(data){ 
              //var json = $.parseJSON(data); 
              //alert("OTP Send Successfully");
              $("#calender_id").html(data);
            }
          });
      //alert("Window is fully loaded!");
    });
  </script>
                  </div>
                  
                  
                </div>                    
              </div>
                  </div>
       
          </section>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
		<!--[if !IE]> -->
		
		
		