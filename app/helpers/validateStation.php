<?php
function validateStation( $station )
{
    $errors = array();
    if(empty($station['name']))
    {
        array_push($errors, 'Station name is required');
    }
    if(empty($station['address']))
    {
        array_push($errors, 'Street address is required');
    }

    if(empty($station['city']))
    {
        array_push($errors, 'City is required');
    }
    if(empty($station['state']))
    {
        array_push($errors, 'State is required');
    }
    if(empty($station['zip']))
    {
        array_push($errors, 'Zip code is required');
    }

    return $errors;

}