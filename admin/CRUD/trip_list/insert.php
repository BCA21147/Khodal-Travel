<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['trip_pick_up']) && isset($_POST['trip_drop']) && isset($_POST['trip_stoppage_point']) && isset($_POST['trip_schedule_time']) && isset($_POST['boarding_point_element']) && isset($_POST['dropping_point_element']) && isset($_POST['trip_children_seat']) && isset($_POST['trip_children_fair']) && isset($_POST['trip_special_seat']) && isset($_POST['trip_special_fair']) && isset($_POST['trip_adult_fair']) && isset($_POST['trip_distance']) && isset($_POST['trip_approximate_time']) && isset($_POST['trip_start_date']) && isset($_POST['trip_fleet_type']) && isset($_POST['trip_vehical_list']) && isset($_POST['trip_company_name']) && isset($_POST['trip_status'])) {

    $stoppage_point = (isset($_POST['trip_stoppage_point'])) ? $trip_stoppage_point : array();
    $weekend = (isset($_POST['trip_weekend'])) ? $trip_weekend : array();
    $facility = (isset($_POST['trip_facility'])) ? $trip_facility : array();
    $boarding_point = array();
    $dropping_point = array();
    $employee = array();

    for ($boarding = 1; $boarding < $boarding_point_element + 1; $boarding++) {
        if (isset(${"trip_boarding_time_$boarding"}) && isset(${"trip_boarding_bus_stand_$boarding"}) && isset(${"trip_boarding_details_$boarding"})) {
            $arr = array();
            $arr["boarding_time_12_hour"] = date("h:i A", strtotime(${"trip_boarding_time_$boarding"}));
            $arr["boarding_time_24_hour"] = ${"trip_boarding_time_$boarding"};
            $arr["boarding_bus_stand"] = ${"trip_boarding_bus_stand_$boarding"};
            $arr["boarding_details"] = ${"trip_boarding_details_$boarding"};
            array_push($boarding_point, $arr);
        }
    }
    for ($dropping = 1; $dropping < $dropping_point_element + 1; $dropping++) {
        if (isset(${"trip_dropping_time_$dropping"}) && isset(${"trip_dropping_bus_stand_$dropping"}) && isset(${"trip_dropping_details_$dropping"})) {
            $arr = array();
            $arr["dropping_time_12_hour"] = date("h:i A", strtotime(${"trip_dropping_time_$dropping"}));
            $arr["dropping_time_24_hour"] = ${"trip_dropping_time_$dropping"};
            $arr["dropping_bus_stand"] = ${"trip_dropping_bus_stand_$dropping"};
            $arr["dropping_details"] = ${"trip_dropping_details_$dropping"};
            array_push($dropping_point, $arr);
        }
    }
    $query = "SELECT * FROM `employee_type`;";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (isset(${"trip_" . strtolower($row['emp_type']) . "_" . $row['id']})) {
                $employee[strtolower($row['emp_type'])] = ${"trip_" . strtolower($row['emp_type']) . "_" . $row['id']};
            } else {
                $employee[strtolower($row['emp_type'])] = array();
            }
        }
    }
    $status = ($trip_status == "trip_status_active") ? 1 : 0;

    $query = "INSERT INTO `trip`(`id`, `trip_pick_up`, `trip_drop`, `stoppage_point`, `schedule_time`, `boarding_point`, `dropping_point`, `children_seat`, `children_fair`, `special_seat`, `special_fair`, `adult_fair`, `distance`, `approximate_time`, `start_date`, `weekend`, `facility`, `fleet_type`, `vehical_list`, `company_name`, `employee`, `status`) VALUES (null,'$trip_pick_up','$trip_drop','" . serialize($stoppage_point) . "','$trip_schedule_time','" . serialize($boarding_point) . "','" . serialize($dropping_point) . "','$trip_children_seat','$trip_children_fair','$trip_special_seat','$trip_special_fair','$trip_adult_fair','" . $trip_distance . " KM" . "','$trip_approximate_time','$trip_start_date','" . serialize($weekend) . "','" . serialize($facility) . "','$trip_fleet_type','$trip_vehical_list','$trip_company_name','" . serialize($employee) . "','$status')";
    mysqli_query($con, $query);

}

?>