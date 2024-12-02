<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'login':
            // model
            include_once "./models/ModelUser.php";

            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                if (checkMail($email)) {
                    $canLogin = login($email, $password);
                    if (!$canLogin) {
                        $_SESSION['mess'] = "Password is incorrect!";
                    } else {
                        $_SESSION['user'] = $canLogin;
                        if ($canLogin['Admin']) {
                            header("Location: admin.php?ctrl=page&view=dashboard");
                        } else {
                            header("Location: ?ctrl=page&view=home");
                        }
                    }
                } else {
                    $_SESSION['mess'] = "Email does not exist!";
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewUserLogin.php";
            include_once "./views/templates/footer.php";


            break;
        case 'register':
            // model
            include_once "./models/ModelUser.php";

            if (isset($_POST['register'])) {
                $name = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confpassword = $_POST['confpassword'];
                if ($password === $confpassword) {
                    if (!checkMail($email)) {
                        register($name, $email, $password);
                        header("Location: ?ctrl=user&view=login");
                    } else {
                        $_SESSION['mess'] = "Email already exists!";
                    }
                } else {
                    $_SESSION['mess'] = "Passwords do not match!";
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewUserRegister.php";
            include_once "./views/templates/footer.php";


            break;
        case 'chat':
            // model
            include_once "./models/ModelUser.php";

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/404page.php";
            include_once "./views/templates/footer.php";


            break;
        case 'forgotpassword':
            // model
            include_once "./models/ModelUser.php";
            include_once "./models/phpmailer.php";
            if (isset($_POST['forgot-password-btn'])) {
                $email = $_POST['email'];
                $hasMail = checkMail($email);
                if ($hasMail) {
                    $randomNumber = rand(100000, 999999);
                    codeForgotPassword($email, $randomNumber);
                    $_SESSION['forgotpassword']['code'] = $randomNumber;
                    $_SESSION['forgotpassword']['email'] = $email;
                    header("Location: index.php?ctrl=user&view=codeforgotpassword");
                    exit();
                } else {
                    $_SESSION['mess'] = 'Email does not exist';
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewUserForgotPassword.php";
            include_once "./views/templates/footer.php";


            break;
        case 'codeforgotpassword':
            // model
            include_once "./models/ModelUser.php";

            if (isset($_GET['code'])) {
                $code = (int) $_GET['code'];
                if (isset($_SESSION['forgotpassword'])) {
                    $tmp = "";
                    if ($code === $_SESSION['forgotpassword']['code']) {
                        $tmp = "
                        <form action=\"\" method=\"POST\" class=\"forgot-password__form\">
                            <label class=\"fs-3 d-block mb-3\">Password<span class=\"text-danger\">*</span></label>
                            <input type=\"password\" name=\"password\" class=\"fs-4 w-100 p-3 mb-4\" placeholder=\"Password\">
                            <button type=\"submit\" name=\"code-forgot-password\" class=\"text-light text-bg-dark px-5 py-2 fs-3 mt-4 \">change password</button>
                        </form>
                        ";
                    } else {
                        $tmp = 'Check code in email';
                    }
                    echo ($tmp);
                    exit();
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['code-forgot-password'])) {
                    $pass = $_POST['password'];
                    $change = changePassByEmail($_SESSION['forgotpassword']['email'], $pass);
                    if ($change) {
                        unset($_SESSION['forgotpassword']);
                        header("Location: ?ctrl=user&view=login");
                        exit();
                    }
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewUserCodeForgotPassword.php";
            include_once "./views/templates/footer.php";


            break;

        case 'profileuser':
            // model
            include_once "./models/ModelUser.php";

            if (isset($_POST['updateuser'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phonNumber = $_POST['phonenumber'];
                $address = $_POST['address'];
                if (!empty($_FILES['avatar']['name'])) {
                    if (isset($_FILES['avatar']['error'])) {
                        move_uploaded_file($_FILES["avatar"]["tmp_name"], "public/images/uploads/" . $_FILES["avatar"]["name"]);
                        userChangeAvatar($_SESSION["user"]["UserID"], $_FILES["avatar"]["name"]);
                        $_SESSION['user']['Avatar'] = $_FILES["avatar"]["name"];
                    }
                }
                if (strlen($password) > 0) {
                    if (checkPass($_SESSION['user']['UserID'], $password)) {
                        $newPassword = $_POST['newpassword'];
                        $confNewPassword = $_POST['confnewpassword'];
                        if ($newPassword === $confNewPassword) {
                            $hashed_Newpassword = password_hash($confNewPassword, PASSWORD_DEFAULT);
                            changePassword($_SESSION['user']['UserID'], $hashed_Newpassword);
                            unset($_SESSION['user']);
                            header("Location: index.php?ctrl=user&view=login");
                        } else {
                            $_SESSION['mess'] = 'Passwords do not match';
                        }
                    } else {
                        $_SESSION['mess'] = 'Password wrong';
                    }
                } else {
                    updateUser((int)$_SESSION['user']['UserID'], $name, $email, $phonNumber, $address);
                    $_SESSION['user']['Username'] = $name;
                    $_SESSION['user']['Email'] = $email;
                    $_SESSION['user']['SDT'] = $phonNumber;
                    $_SESSION['user']['DiaChi'] = $address;
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewUserProfile.php";
            include_once "./views/templates/footer.php";


            break;
        case 'useractive':
            // model
            include_once "./models/ModelUser.php";
            include_once "./models/auto-call/php/auto-call.php";
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['sdt'])) {
                    $sdt = $_GET['sdt'];
                    echo "
                    <div class=\"user-active__form\">
                        <h5 class=\"mb-4 fs-2 text-danger fw-medium\">Please do not reload the page</h5>
                        <div class=\"input-style-1\">
                            <label class=\"mb-4 fs-4 d-block\">Code</label>
                            <input class=\"fs-4 w-100 p-3 mb-4 input-otp\" type=\"text\" placeholder=\"Please enter the code sent to your phone number\" />
                        </div>
                        <button class=\"btn btn-primary p-3 text-bg-primary fs-4 w-100 text-center active-sdt\" >
                            Active
                        </button>
                        <button class=\"btn mt-4 p-3 text-decoration-underline text-primary again-code fs-4\">Again</button>
                    </div>
                    ";
                    changeSdt($sdt, $_SESSION['user']['UserID']);
                    $_SESSION['user']['SDT'] = $sdt;
                    if (!isset($_SESSION['sendcode'])) {
                        $_SESSION['sendcode'] = rand(1000, 9999);
                        sendCode($_SESSION['user']['SDT'], $_SESSION['sendcode']);
                    }
                    exit();
                }
                if (isset($_GET['code'])) {
                    $code = (int) $_GET['code'];
                    if ($code === $_SESSION['sendcode']) {
                        activePhone($_SESSION['user']['UserID']);
                        unset($_SESSION['sendcode']);
                        $_SESSION['user']['Active'] = 1;
                        echo true;
                        exit;
                    } else {
                        echo false;
                        exit;
                    }
                }

                if (isset($_GET['action'])) {
                    $_SESSION['sendcode'] =  rand(1000, 9999);
                    sendCode($_SESSION['user']['SDT'], $_SESSION['sendcode']);
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewUserActive.php";
            include_once "./views/templates/footer.php";


            break;
        case 'logout':
            unset($_SESSION['user']);
            header("Location: ?ctrl=user&view=login");
            break;

        default:
            include_once "./views/404Page.php";
            break;
    }
} else {
    include_once "./views/404Page.php";
}
