<?php
function validateVehicle( $vehicle )
{
    $errors = array();
    if(empty($vehicle['color']))
    {
        array_push($errors, 'Vehicle color is required');
    }
    if(empty($vehicle['number_plate']))
    {
        array_push($errors, 'Vehicle number plate is required');
    }
    if(empty($vehicle['model']))
    {
        array_push($errors, 'Vehicle model is required');
    }

    $existing_plates = selectOne('vehicle',['number_plate' => $vehicle['number_plate']]);


    if ($existing_plates)
    {
        array_push($errors,'Vehicle already exists');
    }

    return $errors;

}

function validateDriver( $vehicle )
{
    $errors = array();
    if(empty($vehicle['color']))
    {
        array_push($errors, 'Vehicle color is required');
    }
    if(empty($vehicle['number_plate']))
    {
        array_push($errors, 'Vehicle number plate is required');
    }
    if(empty($vehicle['model']))
    {
        array_push($errors, 'Vehicle model is required');
    }
    if(empty($vehicle['driver_id']))
    {
        array_push($errors, 'Please select a driver.');
    }

    return $errors;

}
function validateUnassignedVehicle( $vehicle )
{
    $errors = array();
    if(empty($vehicle['color']))
    {
        array_push($errors, 'Vehicle color is required');
    }
    if(empty($vehicle['number_plate']))
    {
        array_push($errors, 'Vehicle number plate is required');
    }
    if(empty($vehicle['model']))
    {
        array_push($errors, 'Vehicle model is required');
    }

    return $errors;

}