
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
   <!--  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        .booked {
            background-color: green !important;
            color: white;
        }
    </style>

            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo site_url();?>admin/dashboard">Home</a>
              </li>              
              <li class="active"> Slots</li>
            </ul><!-- /.breadcrumb -->            
          </div>

<div class="page-content">
  <div class="page-header-1">
              <h1 class="col-lg-3 col-sm-4 col-md-5 col-xs-7 mbl-mgbtm-5 pdg-top-10">
                <i class="menu-icon blue fa fa-cart-arrow-down"></i>  
                Slots
              </h1>
          <?php if($search_value == 'search'){ ?>
              <div class="pull-right ">  
              <a href="<?php echo base_url();?>admin/slots" class="btn btn-danger btn-sm" type="button"><i class="fa fa-arrow-left fa-lg"></i> Back </a> 
              </div>
            <?php }?>
              
            </div><!-- /.page-header -->
           

  <div class="row" >
    <div class="col-md-12">
 
      <!-- START DATATABLE EXPORT -->
      <div class="panel panel-default">
        
       <?php echo $message;?>
        
      </div>
      <!-- END DATATABLE EXPORT -->      
    </div>
  </div>

   <section class="edu_admin_content">  
          <div class="sectionHolder edu_admin_right edu_dashboard_wrap">
            <div class="edu_dashboard_widgets">             
                <div class="row">
                  <div class="col-xl-12 col-lg-4 col-md-4 col-sm-12 col-12">
                    
                   <!--  <h1>Google Calendar</h1>
    <div>
        <iframe src="https://calendar.google.com/calendar/embed?src=your_calendar_id&ctz=Your/Timezone"
                style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div> -->

    <div class="container mt-5">
    <h2>Booking Calendar</h2>

    <!-- Show flash message -->
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    <div class="calendar">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $current_day = 1;
                $days_in_month = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                $calendar_data = $calendar; // Data passed from controller
                
                for ($week = 0; $week < 6; $week++) {
                    echo "<tr style='width:50px'>";
                    for ($day = 0; $day < 7; $day++) {
                        if ($current_day <= $days_in_month) {
                            $date = date('Y-m-d', strtotime(date('Y-m-01') . " +$current_day days -1 day"));
                            $slots = isset($calendar_data[$date]) ? $calendar_data[$date] : [];
                            echo "<td data-date='{$date}' class='date-cell'>";
                            echo "<div>{$current_day}</div>";
                            foreach ($slots as $slot) {
                                $slot_class = ($slot['status'] === 'booked') ? 'booked' : '';
                                echo "<button class='btn btn-sm $slot_class' data-slot-id='{$slot['id']}'>{$slot['slot_time']}</button><br>";
                            }
                            echo "</td>";
                            $current_day++;
                        } else {
                            echo "<td></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div id="slotModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Book Slot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm" method="POST" action="<?= base_url('admin/slots/book_slot'); ?>">
                        <div class="form-group">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" required>
                        </div>
                        <input type="hidden" name="slot_id" id="slot_id">
                        <button type="submit" class="btn btn-primary">Book Slot</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle slot booking
    $(document).on('click', '.date-cell .btn', function() {
        var slotId = $(this).data('slot-id');
        if (!$(this).hasClass('booked')) {
            $('#slot_id').val(slotId);
            $('#slotModal').modal('show');
        }
    });
</script>
                  </div>
                  
                  
                </div>                    
              </div>
                  </div>
       
          </section>
          
</div>   
</div>       
</div>  
    <!-- JavaScript to control the actions
         of the date picker -->
    <script type="text/javascript">
       
        $(document).ready(function(){
    // $('#date_from,#date_to').datepicker({
    //     autoclose: true,
    //     todayHighlight: true,
    //     format:"yyyy-mm-dd",
    //     //setDate:"today"
    // }).datepicker("setDate", new Date());
   
})
    </script>

  
