<?php

function validateUser( $user)
{
    $errors = array();
    if(empty($user['username']))
    {
        array_push($errors, 'Full name is required');
    }
    if(empty($user['national_ID']))
    {
        array_push($errors, 'ID number is required');
    }

    if(empty($user['email']))
    {
        array_push($errors, 'email is required');
    }
    if(empty($user['phonenumber']))
    {
        array_push($errors, 'phone number is required');
    }
    if(empty($user['password']))
    {
        array_push($errors, 'Password  is required');
    }
    if(empty($user['passwordConf']))
    {
        array_push($errors, 'Password Confirmation is required');
    }
    if($user['passwordConf'] !== $_POST['password'] )
    {
        array_push($errors, 'Passwords do not match');
    }
        /*check if email, phone number or id is already inside the system*/
    $existing_ID = selectOne('users',['national_ID' => $user['national_ID']]);
    $existing_Email = selectOne('users',['email' => $user['email']]);
    $existing_phone = selectOne('users',['phonenumber' => $user['phonenumber']]);

    if ($existing_ID)
    {
        array_push($errors,'ID already exists');
    }
    if ($existing_Email)
    {
        array_push($errors,'Email already exists');
    }
    if ($existing_phone)
    {
        array_push($errors,'Phone Number already exists');
    }


    return $errors;

}


function validateLogin( $user)
{
    $errors = array();
    if(empty($user['national_ID']))
    {
        array_push($errors, 'National ID is required');
    }
    if(empty($user['password']))
    {
        array_push($errors, 'Password  is required');
    }
    return $errors;

}
function validateUserUpdate( $user)
{
    $errors = array();
    if(empty($user['username']))
    {
        array_push($errors, 'Full name is required');
    }
    if(empty($user['national_ID']))
    {
        array_push($errors, 'ID number is required');
    }

    if(empty($user['email']))
    {
        array_push($errors, 'email is required');
    }
    if(empty($user['phonenumber']))
    {
        array_push($errors, 'phone number is required');
    }
    if(empty($user['password']))
    {
        array_push($errors, 'Password  is required');
    }
    if(empty($user['passwordConf']))
    {
        array_push($errors, 'Password Confirmation is required');
    }
    if($user['passwordConf'] !== $_POST['password'] )
    {
        array_push($errors, 'Passwords do not match');
    }

    return $errors;

}
