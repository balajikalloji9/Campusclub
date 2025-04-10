<div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Book Slot : <?php echo $slot['slot_name']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-30px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm" method="POST" action="<?= base_url('user/book_slot'); ?>">
                        <div class="form-group">
                            <label for="customer_name">From Time : <?php 
                            $dateTime = new DateTime($slot['from_time']);

                            // Format the time to 'h i A' (hour and minute in 12-hour format with AM/PM)
                            $formattedTime = $dateTime->format('h : i A');
                            echo $formattedTime;?> </label>
                        </div>
                        <div class="form-group">
                            <label for="customer_name">To Time : <?php 
                            $dateToTime = new DateTime($slot['to_time']);

                            // Format the time to 'h i A' (hour and minute in 12-hour format with AM/PM)
                            $formattedToTime = $dateToTime->format('h : i A');
                            echo $formattedToTime;?> </label>
                        </div>

                        <input type="hidden" name="slot_id" id="slot_id">
                        <input type="hidden" name="selected_date" value="<?php echo $selected_date;?>">
                        <button type="submit" class="btn btn-primary">Book Slot</button>
                    </form>
                </div>
            </div>
        </div>
