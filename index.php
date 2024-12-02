<?php
session_start();
ob_start();
// if (isset($_SESSION['user'])) {
//     if (!isset($_SESSION['time'])) {
//         $_SESSION['time'] = (int)time();
//     }

//     $timeStamp = time();
//     $userTime = 10;
//     if ($timeStamp >= $_SESSION['time'] + $userTime) {
//         unset($_SESSION['time']);
//         unset($_SESSION['user']);
//         $_SESSION['timeout'] = 'Login timed out';
//         header("Location: index.php?ctrl=user&view=login");
//     }
// }

if (!isset($_SESSION['user']) || $_SESSION['user']['Admin'] != 1) {
    if (isset($_GET['ctrl'])) {
        switch ($_GET['ctrl']) {
            case 'page':
                include_once "./Controllers/ControllerPage.php";
                break;
            case 'product':
                include_once "./Controllers/ControllerProduct.php";
                break;
            case 'user':
                include_once "./Controllers/ControllerUser.php";
                break;
            default:
                include_once "./views/404Page.php";
                break;
        }
    } else {
        header("Location: ?ctrl=page&view=home");
    }
} else {
    include_once "./views/404Page.php";
}
