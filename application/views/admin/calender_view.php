<style>
        .booked {
            background-color: gray !important;
            color: white;
        }

        .available {
            background-color: green !important;
            color: white;
        }
    
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
         .table-container {
            width: 100%;
            margin: 20px auto;
            padding: 0 10px;
            box-sizing: border-box; /* To account for padding */
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;  /* Let the table adjust based on its content */
            max-width: 90%;     /* Prevents the table from exceeding the screen width */
            overflow: hidden;    /* Prevents any overflow from the table */
        }


        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            word-wrap: break-word; /* Allow text wrapping within cells */
        }

        th {
            background-color: #f2f2f2;
        }
    
    </style>

    
<table class="table table-bordered" style="max-width: 90%; ">
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
                $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month , date('Y'));

                $present_month= $month;
                $first_day_of_month = date('w', strtotime(date('Y-'.$month.'-01'))); 
               // echo date('m');
                //echo $days_in_month;exit;
                echo "<center><h3><b style='color:green'>".date("F", mktime(0, 0, 0, $present_month, 1))."</b></h3></center>";
                echo "<input type='hidden' value='".$present_month."' id='present_month'> </input>";

                $calendar_data = $calendar; // Data passed from controller
                
                for ($week = 0; $week < 6; $week++) {
                    echo "<tr style='width:50px'>";
                    for ($day = 0; $day < 7; $day++) {
                        if ($week == 0 && $day < $first_day_of_month) {
                    // Empty cells before the first day of the month
                    echo "<td></td>";
                } else if ($current_day <= $days_in_month) {
                            $date = date('Y-m-d', strtotime(date('Y-m-01') . " +$current_day days -1 day"));
                            //$slots = isset($calendar_data[$date]) ? $calendar_data[$date] : [];
                           // echo '<pre>';print_r($slots);
                            //$slots = $calendar_data[$date];
    $year=date('Y');
    $slots=$this->db->query('SELECT * 
FROM time_slots
WHERE YEAR(from_date) = '.$year.' 
  AND MONTH(from_date) = '.$present_month.' ')->result_array();

                            echo "<td data-date='{$date}' class='date-cell'>";
                            echo "<div>{$current_day}</div>";
                            if(!empty($slots)){
                                foreach ($slots as $slot) {
                                $slot_from_date=explode('-', $slot['from_date']);
                                $slot_to_date=explode('-', $slot['to_date']);
                                $slot_days=explode(',', $slot['days']);
                                $current_date = explode('-',$date);

                                //echo '<pre>';print_r($slot_from_date);

                                //echo '<pre>';print_r($slot_to_date);
                                //echo '<pre>';print_r($present_month);

                                //echo '<pre>';print_r($slot_days);

                $new_slot_days= printDaysInRange($slot['from_date'],$slot['to_date'],$slot_days);
                //echo '<pre>';print_r($new_slot_days);


                                //if(($slot_from_date[1] == $present_month)){

                                    //foreach($slot_days as $day){
                                        if (in_array($current_day, $new_slot_days)){
                                           // echo '<pre>';print_r($slot_days);
$slot_id=$slot['id'];
$user_id=$this->session->userdata('user_id');
$sport_id=$slot['sport_id'];
$booking=$this->db->query('select * from bookings where user_id='.$user_id.' and sport_id='.$sport_id.' and  slot_id='.$slot_id.' and day_no='.$current_day.' ')->row_array();
if(!empty($booking)){
  $slot['status']='booked';
}
                                $slot_class = ($slot['status'] === 'booked') ? 'booked' : 'available';
                                echo "<button class='btn btn-sm $slot_class' data-slot-id='{$slot['id']}' data-current-day='{$current_day}'>{$slot['slot_name']}</button><br>";
                                    
                                    }
                                //}
                            //}
                            }}
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

<?php

function printDaysInRange($fromDate, $toDate, $daysOfWeek) {
    // Convert the input dates to Unix timestamps
    $startDate = strtotime($fromDate);
    $endDate = strtotime($toDate);

    // Days of the week map to full day names (1 = Monday, 2 = Tuesday, ..., 7 = Sunday)
    $dayNames = [
        
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
        7 => 'Sunday'
        
    ];

    // Loop through each date in the range
    $printedcompleteDays = [];
    $printedDays = [];
    while ($startDate <= $endDate) {
        // Get the numeric day of the week (1 = Monday, 2 = Tuesday, ..., 7 = Sunday)
        $dayOfWeek = date('N', $startDate); // 'N' returns 1 (for Monday) to 7 (for Sunday)

        // Check if the current day is in the specified daysOfWeek
        if (in_array($dayOfWeek, $daysOfWeek)) {
            // Add the name of the day to the printedDays array
            //$printedcompleteDays[] = $dayNames[$dayOfWeek] . ' (' . date('Y-m-d', $startDate) . ')';
            $printedDays[] =  date('d', $startDate);

        }

        // Move to the next day
        $startDate = strtotime("+1 day", $startDate);
    }

    // Output the printed days
    // if (count($printedDays) > 0) {
    //     echo "The following specified days are between $fromDate and $toDate:\n";
    //     foreach ($printedDays as $day) {
    //         echo $day . "\n";
    //     }
    // } else {
    //     echo "No specified days found between $fromDate and $toDate.\n";
    // }
    return $printedDays;
}

?>