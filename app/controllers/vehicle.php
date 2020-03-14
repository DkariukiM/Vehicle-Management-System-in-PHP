<?php
include (ROOT_PATH . "/app/database/db.php");
include (ROOT_PATH . "/app/helpers/validateVehicle.php");
include (ROOT_PATH . "/app/helpers/middleware.php");
$users_table = 'users';
$table = 'vehicle';
$drivers = selectAll($users_table, ['admin' => 0]);//select all non-admin users
$assignedVehicles = getVehicles();
$vehicles = selectAll($table,['assigned' => 0]);
$personals = selectAll($table,['driver_id' => $_SESSION['id']]);



$errors = array();
$id = '';
$d_id='';
$model = '';
$color = '';
$number_plate = '';
$driver = '';
$driver_name = '';
$driver_id = '';
/*create added vehicle*/
if (isset($_POST['create-vehicle'])) {
    $errors = validateVehicle($_POST);
    if (count($errors) === 0) {
        $_POST['assigned'] = 0;
        $_POST['user_name'] = $_SESSION['username'];

        unset($_POST['create-vehicle']);

        $vehicle_id = create($table, $_POST);
        $_SESSION['message'] = 'Vehicle added Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/vehicle management/index.php");
        /*    dd($vehicle_id);//display test data*/

    }else
    {
        $model = $_POST['model'];
        $color = $_POST['color'];
    }
}

/*fetch details to assign driver*/
/*fetch records for editing*/

if (isset($_GET['d_id']))
{
    $id = $_GET['d_id'];

    $vehicle = selectOne($table,['id' => $id]);
    $d_id = $vehicle['id'];
    $color = $vehicle['color'];
    $model = $vehicle['model'];
    $number_plate= $vehicle['number_plate'];
}

/*assign driver a vehicle*/
if (isset($_POST['assign-driver']))
{
    $errors = validateDriver($_POST);
    if (count($errors) === 0)
    {
        $_POST['assigned'] = 1;
        $_POST['user_name'] = $_SESSION['username'];
        $d_id = $_POST['d_id'];
        unset($_POST['assign-driver'], $_POST['d_id']);

        $drivers_id = update($table, $d_id, $_POST);
        $_SESSION['message'] = 'Driver assigned Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/vehicle management/index.php");

/*        dd($driver_id);*/
    }else
    {
        $model = $_POST['model'];
        $color = $_POST['color'];
        $number_plate = $_POST['number_plate'];
        $driver_id = $_POST['driver_id'];
    }



    }

    /*update an assigned vehicle*/

if (isset($_GET['v_id']))
{
    $id = $_GET['v_id'];

    $vehicle = selectOne($table,['id' => $id]);
    $d_id = $vehicle['id'];
    $color = $vehicle['color'];
    $model = $vehicle['model'];
    $number_plate= $vehicle['number_plate'];
    $driver_id = $vehicle['driver_id'];

}

/*update assigned vehicle*/
if (isset($_POST['update-assigned-Vehicle']))
{
    $errors = validateDriver($_POST);
    if (count($errors) === 0)
    {
/*        $_POST['assigned'] = 1;*/
        $_POST['user_name'] = $_SESSION['username'];
        $d_id = $_POST['d_id'];
        unset($_POST['update-assigned-Vehicle'], $_POST['d_id']);

        $drivers_id = update($table, $d_id, $_POST);
        $_SESSION['message'] = 'Vehicle updated Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/vehicle management/index.php");
    }else
    {
        $model = $_POST['model'];
        $color = $_POST['color'];
        $number_plate = $_POST['number_plate'];
        $driver_id = $_POST['driver_id'];
    }
    //dd($_POST);
}

/*fetch value to be deleted and delete it*/
if (isset($_GET['v_del_id']))
{
    $id = $_GET['v_del_id'];
    $count = delete($table,$id);
    $_SESSION['message'] = 'Vehicle Information Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/vehicle management/index.php");
    exit();

}

//Assign vehicle  and unassign vehicle

if (isset($_GET['assigned_vehicle']) && isset($_GET['v_a_id']) )
{
    $assigned = $_GET['assigned_vehicle'];
    $v_a_id = $_GET['v_a_id'];
    //..update assigned status on the vehicle and set a success message
    $count = update($table, $v_a_id, ['assigned' => $assigned]);
    $_SESSION['message'] = 'Vehicle assigned state changed!!';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/vehicle management/index.php");
    exit();
}

if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $vehicle = selectOne($table,['id' => $id]);
    $d_id = $vehicle['id'];
    $color = $vehicle['color'];
    $model = $vehicle['model'];
    $number_plate= $vehicle['number_plate'];
}

/*update assigned vehicle*/
if (isset($_POST['update-Vehicle']))
{
    $errors = validateUnassignedVehicle($_POST);
    if (count($errors) === 0)
    {
        /*        $_POST['assigned'] = 1;*/
        $_POST['user_name'] = $_SESSION['username'];
        $d_id = $_POST['d_id'];
        unset($_POST['update-Vehicle'], $_POST['d_id']);

        $drivers_id = update($table, $d_id, $_POST);
        $_SESSION['message'] = 'Vehicle updated Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/vehicle management/index.php");
    }else
    {
        $model = $_POST['model'];
        $color = $_POST['color'];
        $number_plate = $_POST['number_plate'];
    }
    //dd($_POST);
}


