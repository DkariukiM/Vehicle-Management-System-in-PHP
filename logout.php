<?php
include ('path.php');
session_start();
unset($_SESSION['id'] );
unset($_SESSION['username'] );
unset($_SESSION['national_ID'] );
unset($_SESSION['email'] );
unset($_SESSION['phonenumber'] );
unset($_SESSION['admin'] );
unset($_SESSION['message'] );
unset($_SESSION['type'] );
session_destroy();

header('location:' . BASE_URL . "/index.php");






