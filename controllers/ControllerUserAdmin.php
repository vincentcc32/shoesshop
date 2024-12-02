<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {

        case 'profileadmin':
            // model
            include_once "./models/ModelUser.php";
            // view

            $user = getUserByID((int)$_SESSION['user']['UserID']);

            if (isset($_POST['updateadmin'])) {
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

            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewAdminProfile.php";
            include_once "./views/templates/admin/footer.php";

            break;

        case 'usermanagement':
            // model
            include_once "./models/ModelUser.php";

            $users = getAllUser();

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewUserManagement.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'adminmanagement':
            // model
            include_once "./models/ModelUser.php";

            $admins = getAllAdmin();
            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewAdminManagement.php";
            include_once "./views/templates/admin/footer.php";

            break;

        case 'deleteuser':
            // model
            include_once "./models/ModelUser.php";

            if (isset($_GET['id'])) {
                $id = (int) $_GET['id'];
                deleteUser($id);
                header("Location: ?ctrl=user&view=usermanagement");
            }

            break;
        case 'deleteadmin':
            // model
            include_once "./models/ModelUser.php";

            if (isset($_GET['id'])) {
                $id = (int) $_GET['id'];
                deleteUser($id);
                header("Location: ?ctrl=user&view=adminmanagement");
            }

            break;
        case 'register':
            // model
            include_once "./models/ModelUser.php";

            if (isset($_POST['registeradmin'])) {
                $name = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confpassword = $_POST['confpassword'];
                if ($password === $confpassword) {
                    if (!checkMail($email)) {
                        registerAdmin($name, $email, $password);
                        header("Location: admin.php?ctrl=page&view=dashboard");
                    } else {
                        $_SESSION['mess'] = "Email already exists!";
                    }
                } else {
                    $_SESSION['mess'] = "Passwords do not match!";
                }
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewAdminRegister.php";
            include_once "./views/templates/admin/footer.php";
            break;

        case 'logout':
            unset($_SESSION['user']);
            header("Location: index.php?ctrl=user&view=login");
            break;

        default:
            include_once "./views/404Page.php";
            break;
    }
} else {
    include_once "./views/404Page.php";
}
