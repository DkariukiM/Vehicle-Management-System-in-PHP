<?php
include "path.php";
include(ROOT_PATH . "/app/controllers/users.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login || Welcome </title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
    .modal-content{
        background-color: darkcyan;
        margin-top: 20%;
    }
    .btn-link{
        color:white;
    }
    .modal-heading h2{
        color:#ffffff;
    }
</style>
</head>
<body style="width: 100%;height: 100vh;background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.8)),url(assets/img/vehicle.png) center no-repeat;background-size: cover;">
<div class="modal-dialog">
    <div class="modal-content">
        <?php include (ROOT_PATH . "/app/helpers/formErrors.php")?>
        <div class="modal-heading">
            <h2 class="text-center">Login</h2>
        </div>
        <hr />
        <div class="modal-body">
            <form action="index.php" method="post" role="form">
                <div class="form-group">
                    <div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
							</span>
                        <input type="text" name="national_ID" value="<?php echo $national_ID; ?>" class="form-control" placeholder="Enter ID Number" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
							</span>
                        <input type="password" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="Password" />

                    </div>

                </div>

                <div class="form-group text-center">
                    <button type="submit" name="login-btn" class="btn btn-success btn-lg">Login</button>
                    <br>
                    <a href="#" class="btn btn-link"> Forgot Password? </a>
                    <a href="<?php echo BASE_URL . '/signup.php' ?>" class="btn btn-link"> Don't have an Account? </a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
