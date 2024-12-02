<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            // model
            include_once "./models/ModelProduct.php";
            $dsspShoes = getProductHome(0, 1);

            $dsspFashion = getProductHome(0, 2);

            $dsspSales = getProductSales();

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/templates/siderbar.php";
            include_once "./views/ViewPageHome.php";
            include_once "./views/templates/footer.php";


            break;
        case 'about':

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewPageAbout.php";
            include_once "./views/templates/footer.php";

            break;

        case 'contact':
            include_once './models/phpmailer.php';
            // view

            if (isset($_POST['contact-btn'])) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $mess = $_POST['message-contact'];
                $content = "Name: " . $name . "<br>Email: " . $email . "<br>Content: " . $mess;
                contactToEmail($content);
                echo "
                    <script>
                        alert('We will respond to your email as soon as possible');
                    </script>
                ";
                unset($_POST['contact-btn']);
            }



            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewPageContact.php";
            include_once "./views/templates/footer.php";


            break;

        case 'services':
            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewPageServices.php";
            include_once "./views/templates/footer.php";


            break;

        default:
            include_once "./views/404Page.php";
            break;
    }
} else {
    include_once "./views/404Page.php";
}
