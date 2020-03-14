<?php
function validateRequest( $request )
{
    $errors = array();
    if(empty($request['vehicle_id']))
    {
        array_push($errors, 'Please select your vehicle number plate. If it is unavailable you should contact the admin to assign you a vehicle.');
    }
    if(empty($request['station_name']))
    {
        array_push($errors, 'Please select the station name. If it is unavailable you can create one by clicking on add Fuel station.');
    }

    if(empty($request['station_address']))
    {
        array_push($errors, 'Please select the station address. If it is unavailable you can create one by clicking on add Fuel station.');
    }
    if(empty($request['time_out']))
    {
        array_push($errors, 'Time out is required');
    }
    if(empty($request['expected_time_in']))
    {
        array_push($errors, 'Expected time in is required');
    }

    return $errors;

}