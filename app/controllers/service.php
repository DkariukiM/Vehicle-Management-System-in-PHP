<?php
include (ROOT_PATH . "/app/database/db.php");
include (ROOT_PATH . "/app/helpers/validateStation.php");
include (ROOT_PATH . "/app/helpers/validateService.php");
include (ROOT_PATH . "/app/helpers/middleware.php");
$station_table = 'service_station';
$table = 'service_request';
$completed_services = getServiceCompleted();
$uncompleted_services = getService();

$vehicles_table = 'vehicle';

$stations = selectAll($station_table);
$plates = selectAll($vehicles_table,['driver_id' => $_SESSION['id']]);


$errors = array();
$s_id = '';
$id = '';
$station_name = '';
$address = '';
$city = '';
$state = '';
$zip = '';
$number_plate = '';
$station_address = '';
$time_out = '';
$expected_time_in = '';
$completed_task = '';

/*create new service station*/
if (isset($_POST['add-station']))
{
    $errors = validateStation($_POST);
    /*if no errors, enter into db*/
    if (count($errors) === 0) {

        unset($_POST['add-station']);//remove add station button
        $_POST['added_by'] = $_SESSION['username'];
        $station_id = create($station_table, $_POST);//add station

        $_SESSION['message'] = 'Station added Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/service/index.php");
        exit();
        /*    dd($_POST);//display form data*/
    }else{
        $station_name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
    }
}
/*fetch records for editing*/

if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $station = selectOne($station_table,['id' => $id]);
    $id = $station['id'];
    $station_name = $station['name'];
    $address = $station['address'];
    $city = $station['city'];
    $state = $station['state'];
    $added_by = $station['added_by'];
    $zip = $station['zip'];

}

/*fetch value to be deleted and delete it*/
if (isset($_GET['del_id']))
{
    $id = $_GET['del_id'];
    $count = delete($station_table,$id);
    $_SESSION['message'] = 'Station Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/service/index.php");
    exit();

}


/*update fuel station Data*/
if (isset($_POST['update-station'])) {
    $errors = validateStation($_POST);
    if (count($errors) === 0) {

        $id = $_POST['id'];
        unset($_POST['update-station'], $_POST['id']);
        $station_id = update($station_table, $id, $_POST);
        $_SESSION['message'] = 'Station Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/service/index.php");
        exit();

        /*    dd($_POST);//display form data*/
    }else
    {
        $station_name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
    }

}

/* CREATE SERVICE REQUEST  */
/*on click create service request*/
if (isset($_POST['create-request'])) {
    $errors = validateRequest($_POST);
    /*if no errors, enter into db*/
    if (count($errors) === 0) {
        unset($_POST['create-request']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['username'] = $_SESSION['username'];
        $_POST['phone_number'] = $_SESSION['phonenumber'];
        $_POST['completed_task'] = isset($_POST['completed_task']) ? 1 : 0;


        $service_id = create($table, $_POST);
        $_SESSION['message'] = 'Request created Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/service/index.php");

        /*    dd($request_id);//display test data*/
    }else
    {
        $number_plate = $_POST['vehicle_id'];
        $station_name = $_POST['station_name'];
        $station_address = $_POST['station_address'];
        $time_out = $_POST['time_out'];
        $expected_time_in = $_POST['expected_time_in'];
        $completed_task = isset($_POST['completed_task']) ? 1 : 0;
    }
}

/*get id for deleting in table*/
if (isset($_GET['s_del_id']))
{
    $id = $_GET['s_del_id'];
    $count = delete($table,$id);
    $_SESSION['message'] = 'Service Request Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/service/index.php");
    exit();
}
//complete task  and uncomplete posts

if (isset($_GET['completed_task']) && isset($_GET['r_id']) )
{
    $completed = $_GET['completed_task'];
    $r_id = $_GET['r_id'];
    //..update completion status on the request and set a success message
    $count = update($table, $r_id, ['completed_task' => $completed]);
    $_SESSION['message'] = 'Service completion state changed!!';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/service/index.php");
    exit();
}

/*fetch records for editing*/
if (isset($_GET['req_id']))
{
    $req_id = $_GET['req_id'];

    $request = selectOne($table,['id' => $req_id]);
    $id = $request['id'];
    $number_plate = $request['vehicle_id'];
    $station_name = $request['station_name'];
    $station_address = $request['station_address'];
    $time_out = $request['time_out'];
    $expected_time_in = $request['expected_time_in'];
    $completed_task = $request['completed_task'] ? 1 : 0;
    /*    dd($request);//display data to be edited*/



}

/*update request records*/
if (isset($_POST['update-request'])) {
    $errors = validateRequest($_POST);
    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-request'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['username'] = $_SESSION['username'];
        $_POST['phone_number'] = $_SESSION['phonenumber'];
        $_POST['completed_task'] = isset($_POST['completed_task']) ? 1 : 0;

        $request_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'Request Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/service/index.php");
        exit();

    }
    else
    {
        $id = $_POST['id'];
        $number_plate = $_POST['vehicle_id'];
        $station_name = $_POST['station_name'];
        $station_address = $_POST['station_address'];
        $time_out = $_POST['time_out'];
        $expected_time_in = $_POST['expected_time_in'];
        $completed_task = isset($_POST['completed_task']) ? 1 : 0;

    }
}


