<?php
session_start();

// if (isset($_SESSION['user'])) {
//     if ($_SESSION['user']['Admin'] === 1) {
//         if (!isset($_SESSION['time'])) {
//             $_SESSION['time'] = (int)time();
//         }

//         $timeStamp = time();
//         $userTime = 10;
//         if ($timeStamp >= $_SESSION['time'] + $userTime) {
//             unset($_SESSION['time']);
//             unset($_SESSION['user']);
//             $_SESSION['timeout'] = 'Login timed out';
//             header("Location: index.php?ctrl=user&view=login");
//         }
//     }
// }


if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['Admin'] === 1) {
        if (isset($_GET['ctrl'])) {
            switch ($_GET['ctrl']) {
                case 'page':
                    include_once "./Controllers/ControllerPageAdmin.php";
                    break;

                case 'user':
                    include_once "./Controllers/ControllerUserAdmin.php";
                    break;
                case 'product':
                    include_once "./Controllers/ControllerProductAdmin.php";
                    break;
                default:
                    include_once "./views/404Page.php";
                    break;
            }
        } else {
            header("Location: ?ctrl=page&view=dashboard");
        }
    } else {
        include_once "./views/404Page.php";
    }
} else {
    include_once "./views/404Page.php";
}
