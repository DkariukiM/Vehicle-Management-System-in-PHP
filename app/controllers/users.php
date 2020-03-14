<?php
include (ROOT_PATH . "/app/database/db.php");
include (ROOT_PATH . "/app/helpers/validateUser.php");
include (ROOT_PATH . "/app/helpers/middleware.php");

$table = 'users';
$user_details = selectAll($table);



$errors = array();
$id = '';
$username = '';
$national_ID = '';
$email = '';
$password = '';
$passwordConf = '';
$admin = '';
$phonenumber='';
$about = '';
$profile = '';

/*function to log in user*/
function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['national_ID'] = $user['national_ID'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['phonenumber'] = $user['phonenumber'];
    $_SESSION['admin'] = $user['admin'];

    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    header('location:' . BASE_URL . "/dashboard/dashboard.php");
    exit();//end execution of the script
}

/*register user*/
if (isset($_POST['register-btn'])) {
    $errors = validateUser($_POST);
   /*Enter to the database if there are no errors*/
    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf']);
        $_POST['admin'] = 0;
        $_POST['assigned_image'] = 0;

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);

        //log user in, redirect
        loginUser($user);


        /*dd($user);*/
    }else//fill in data that user had put in previously
    {
        $username = $_POST['username'];
        $national_ID = $_POST['national_ID'];
        $email = $_POST['email'];
        $phonenumber= $_POST['phonenumber'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

/*login user*/
if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);//validate input values
    if (count($errors) === 0) {
        $user = selectOne($table, ['national_ID' => $_POST['national_ID']]);
        /*verifying ID and password*/

        if ($user && password_verify($_POST['password'], $user['password'])) {
            //login user, redirect
            loginUser($user);

        } else {
            array_push($errors, 'Invalid Username or Password');
        }

    }
        $national_ID = $_POST['national_ID'];
        $password = $_POST['password'];

    /*    dd($_POST);//check whether data is being pushed to this file*/
}

/*get user variables to be edited*/
if (isset($_GET['u_id']))
{
    $u_id = $_GET['u_id'];

    $users = selectOne($table,['id' => $u_id]);
    $id = $users['id'];
    $username = $users['username'];
    $national_ID = $users['national_ID'];
    $email = $users['email'];
    $phonenumber=$users['phonenumber'];
    $about = $users['description'];
    $profile = $users['image'];

}
/*update user script*/
if (isset($_POST['update-profile'])) {
/*    dd($_FILES['image']['name']);*/
    $errors = validateUserUpdate($_POST);

    if (!empty($_FILES['image']['name']))
    {
        $image_name =time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;

       $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

       if ($result)
       {
           $_POST['image'] = $image_name;
           $_POST['assigned_image'] = 1;
       }else
       {
           array_push($errors,'failed to upload the image');
       }
    }else
    {
        $_POST['image'] = '';
        $_POST['assigned_image'] = 0;

    }

    if (count($errors) === 0)
    {

        $id = $_POST['id'];
        unset($_POST['update-profile'], $_POST['id'],$_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'User Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/user management/index.php");
        exit();

    }
}

/*function to delete users*/
if (isset($_GET['u_del_id']))
{
    $id = $_GET['u_del_id'];
    $count = delete($table,$id);
    $_SESSION['message'] = 'User Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/user management/index.php");
    exit();

}



