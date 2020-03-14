<?php
include "../../path.php";
include (ROOT_PATH . "/app/controllers/fuel.php");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/dashboard.css">


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="../../assets/img/sidebar-5.jpg">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <?php if (isset($_SESSION['id'])):?>
                    <a href=" " class="simple-text">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                <?php endif; ?>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo BASE_URL . '/dashboard/dashboard.php'  ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . '/Dashboard/user management/index.php'  ?>">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo BASE_URL . '/Dashboard/fuel/index.php'  ?>">
                        <i class="pe-7s-paint-bucket"></i>
                        <p> Fuel Management </p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . '/Dashboard/vehicle management/index.php'  ?>">
                        <i class="pe-7s-car"></i>
                        <p> Vehicle Management </p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . '/Dashboard/service/index.php'  ?>">
                        <i class="pe-7s-config"></i>
                        <p> Service Management </p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="<?php echo BASE_URL . '/logout.php'  ?>">
                        <i class="pe-7s-rocket"></i>
                        <p class="active-pro"> Logout </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo BASE_URL . '/dashboard/fuel/index.php'  ?>"> Fuel Status </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="<?php echo BASE_URL . '/dashboard/dashboard.php'  ?>" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                                <b class="caret hidden-sm hidden-xs"></b>
                                <span class="notification hidden-sm hidden-xs">5</span>
                                <p class="hidden-lg hidden-md">
                                    5 Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    Dropdown
                                    <b class="caret"></b>
                                </p>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL . '/logout.php'  ?>">
                                <p class="active-pro">Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h4 class="title"> Edit Fuel Request </h4>
                    </div>
                    <div class="content">
                        <div class="places-buttons">
                            <?php include (ROOT_PATH . "/app/includes/fuelNav-btn.php"); ?>

                            <br>
                            <br>
                            <!--all stations Table-->
                            <div class="card">
                                <div class="content">
                                    <form action="edit_request.php" method="post">
                                        <?php include (ROOT_PATH . "/app/helpers/formErrors.php")?>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputText1"> Vehicle Number Plate </label>
                                                <input type="text" class="form-control" id="inputText1" value="<?php echo $number_plate; ?>" name="number_plate" placeholder=" Enter the Vehicle Number Plate ">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputStation"> Station Name </label>
                                                <select id="inputStation" name="station_name" class="form-control">
                                                    <option selected value=""> </option>
                                                    <?php foreach ($stations as $key => $station): ?>

                                                        <?php if (!empty($station_name) && $station_name === $station['name']): ?>
                                                            <option selected value="<?php echo $station['name'];?>"> <?php echo $station['name'];?> </option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $station['name'];?>"> <?php echo $station['name'];?> </option>
                                                        <?php endif; ?>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress"> Station Address </label>
                                                <select id="inputAddress" name="station_address" class="form-control">
                                                    <option selected value=""> </option>
                                                    <?php foreach ($stations as $key => $station): ?>
                                                        <?php if (!empty($station_address) && $station_address === $station['address']): ?>
                                                            <option selected value="<?php echo $station['address'];?>"> <?php echo $station['address'];?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $station['address'];?>"> <?php echo $station['address'];?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputTime"> Time Out </label>
                                                <input type="datetime-local" name="time_out" value="<?php echo $time_out; ?>" class="form-control" id="inputTime">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEtime"> Expected Time In: </label>
                                                <input type="datetime-local" name="expected_time_in" value="<?php echo $expected_time_in; ?>" class="form-control" id="inputEtime">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <?php if (empty($completed_task) && $completed_task == 0): ?>
                                                    <input class="form-check-input" name="completed_task" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Completed trip.
                                                    </label>
                                                <?php else: ?>
                                                    <input class="form-check-input" name="completed_task" type="checkbox" id="gridCheck" checked>
                                                    <label class="form-check-label" for="gridCheck">
                                                        Completed trip.
                                                    </label>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <input type="submit" name="update-request" class="btn btn-primary" value="Update Request">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="<?php echo BASE_URL . '/dashboard/dashboard.php'  ?>">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script> <a href="<?php echo BASE_URL . '/dashboard/dashboard.php'  ?>"><?php echo $_SESSION['username']; ?></a>
                    </p>
                </div>
            </footer>

        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<script>
    function createRequest() {
        window.location.href = "<?php echo BASE_URL . '/Dashboard/fuel/create.php'  ?>";
    }
    function manageRequest() {
        window.location.href = "<?php echo BASE_URL . '/Dashboard/fuel/index.php'  ?>";
    }
    function addStation() {
        window.location.href = "<?php echo BASE_URL . '/Dashboard/fuel/station.php'  ?>";
    }
</script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<!--	<script src="../../assets/js/demo.js"></script>
-->
</html>
