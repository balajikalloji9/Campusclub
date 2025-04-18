
<div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo site_url();?>admin/dashboard">Home</a>
              </li>
              <li>                 
                <a href="<?php echo site_url();?>admin/slots">Slots</a>
              </li>
              <li class="active"> Edit</li>
            </ul><!-- /.breadcrumb -->            
          </div>

          <div class="page-content">
            <div class="page-header-2">
              <h1 class="col-lg-4 col-md-3 col-sm-3 col-xs-12 pdg-top-10">
                <i class="menu-icon fa fa-list-ul blue"></i>Slots
                <span class="label label-purple arrowed">Edit</span>
              </h1>
              <div class="pull-right ">              
                 <input type="hidden" name="hiv" id="hiv" value="0" />
              </div>
            </div><!-- /.page-header -->
            
             <?php echo $message; ?>
                   
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" name="myform" id="myform" method="post" action="<?php echo base_url()?>admin/slots/update_records" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-9 col-xs-12 col-sm-9 col-md-9 col-lg-offset-1">

                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">Name<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                  <input class="form-control" name="slot_name" id="" type="text" value="<?php echo $record['slot_name']?>" required="">
                    </div>
                  </div>

                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">Select Sport<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                      <select class="form-control" name="sport_id" id="sport_id" required="" onchange="getOrganisations(this.value)">
                                <option value="">Select Sport</option>
                                <?php
                                if(!empty($sports))
                                {
                                  foreach($sports as $sport)
                                  {
                                    ?>
                                    <option value="<?=$sport['id'];?>"
                                        <?php if($record['sport_id'] == $sport['id']){?>
                                            selected
                                        <?php }?>
                                     >
                                      <?=$sport['name'];?></option>
                                    <?php
                                  }
                                }
                                ?>
                              </select>
                    </div>
                  </div>

                         
                

                  
                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">From Date <span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                    <!-- <input class="form-control" name="date" id="" value="<?php echo date('d-m-Y')?>" readonly> -->
                    <input class="form-control date-picker" name="from_date" id="id-date-picker-1" value="<?php echo $record['from_date']?>" data-date-format="yyyy-mm-dd" required="">
                    </div>
                  </div>

                 <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">To Date <span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                    <!-- <input class="form-control" name="date" id="" value="<?php echo date('d-m-Y')?>" readonly> -->
                    <input class="form-control date-picker" name="to_date" id="id-date-picker-1" value="<?php echo $record['to_date']?>" data-date-format="yyyy-mm-dd" required="">
                    </div>
                  </div>

                  

                  
                  

                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">Time from to<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                      <input class="form-control" name="from_time" id="timepicker1" value="<?php echo $record['from_time']?>" required>
                    </div>
                  </div> 

                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">Time to<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                      <input class="form-control" name="to_time" value="<?php echo $record['to_time']?>" id="timepicker2"  required>
                    </div>
                  </div>
                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">No of players<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                      <input class="form-control" name="no_of_players" value="<?php echo $record['no_of_players']?>" required>
                    </div>
                  </div>


                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">Select week Days<span class="red bigger-120">*</span></label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                      <select class="form-control" name="select_day_type" id="select_day_type" required="" onchange="selectdays(this.value)">
                                <option value="1" <?php  if($record['day_type'] == 1){?> selected <?php }?>>Select the days</option>
                                <option value="2" <?php if($record['day_type'] == 2){?> selected <?php }?>>All Days</option>
                      </select>
                    </div>
                  </div>

                  <div class="row form-group frm-btm" id="all_days_div" <?php if($record['day_type'] == 2){?> style="display:block" <?php }else{?>  style="display:none"  <?php }?> >
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">All Days </label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                      

                      <?php
                                if(!empty($days))
                                {
                                  foreach($days as $day)
                                  {
                                    ?>
                                    <input class="form-control" type="checkbox" name="days[]" checked value="<?php echo $day['id'] ?>" id="" disabled ><?php echo $day['day'] ?>
                                    <?php
                                  }
                                }
                                ?>

                    </div>
                  </div> 

                  <div class="row form-group frm-btm" id="select_days_div" <?php if($record['day_type'] == 1){?> style="display:block" <?php }else{?>  style="display:none"  <?php }?>>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">Select the Days </label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 word-brk">
                      

                      <?php
                                if(!empty($days))
                                {
                                  foreach($days as $day)
                                  {
                                    ?>
                                    <input class="form-control" type="checkbox" name="days[]" value="<?php echo $day['id'] ?>" id="" 

                                    <?php if($record['day_type'] == 1){
                                      $re_days=explode(',',$record['days']);
                                        foreach($re_days as $re){
                                          if($re == $day['id']){?> checked <?php }
                                        }
                                        } ?>
                                    
                                    ><?php echo $day['day'] ?>
                                    <?php
                                  }
                                }
                                ?>

                    </div>
                  </div> 

                  <div class="row form-group frm-btm">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-5">
                      <label class="input-text">Description</label>
                    </div>
                    <div class="col-lg-1 col-xs-1 col-sm-1 col-md-1 input-text"> : </div>
                    <div class="col-lg-7  col-md-7 col-sm-7 col-xs-6">
                    <textarea class="form-control" type="text" rows="6" placeholder="Should not exceed 250 Characters..." name="description" id="description" value="" data-parsley-id="8322"><?php echo $record['description']?></textarea><ul class="parsley-errors-list" id="parsley-id-8322"></ul>
                    </div>
                  </div> 

                  

     <input class="form-control" type="hidden" name="id" value="<?php echo $record['id']?>" id="" >
                  

                    
                                    
                  </div>                  
                </div>


                <div class="col-lg-12 col-xs-12 col-sm-12">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 formfooter text-center mgtp-btm-10">
                    <input type="submit" name="edit"  class="btn btm-sm btn-success btn-sm" value="Edit" />
                 
                  <a class="btn btn-danger btn-sm" type="edit" href="<?php echo base_url();?>admin/slots">Back </a>
                
                  </div>                
                </div><!-- End Row -->

              </form>
              </div>
              </div>
            </div>
            
        </div>
      </div><!-- /.main-content -->
   
    

  


  <script type="text/javascript">

function getPaymentModes(center_id){

  var state_id=$("#state_id").val();
    var organisation_id=$("#organisation_id").val();
    var center_id=$("#center_id").val();

    $.ajax({
            type: 'post',
            url: '<?=base_url();?>admin/common/getExpensePaymentModes',
            data: {state_id: state_id,organisation_id:organisation_id,center_id:center_id},
            beforeSend: function(xhr){
              xhr.overrideMimeType("text/plain; charset=utf-8");
              $("#wait").css("display", "block");
            },
            success: function(data){ 
              //var json = $.parseJSON(data); 
              //alert("OTP Send Successfully");
              $("#payment_mode_id").html(data);
            }
          });

    $.ajax({
            type: 'post',
            url: '<?=base_url();?>admin/common/getCategories',
            data: {state_id: state_id,organisation_id:organisation_id,center_id:center_id},
            beforeSend: function(xhr){
              xhr.overrideMimeType("text/plain; charset=utf-8");
              $("#wait").css("display", "block");
            },
            success: function(data){ 
              //var json = $.parseJSON(data); 
              //alert("OTP Send Successfully");
              $("#category_id").html(data);
            }
          });
  }

  function selectdays(value){

    if(value == 2){
         $("#all_days_div").show();
         $("#select_days_div").hide();
    }else if(value == 1){
         $("#all_days_div").hide();
         $("#select_days_div").show();
    }

  }

  </script>