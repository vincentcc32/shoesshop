<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {

        case 'dashboard':

            // model
            include_once "./models/ModelProduct.php";
            include_once "./models/ModelUser.php";

            $slShoes = getQuantityProduct(1);
            $slFashion = getQuantityProduct(2);


            $sumPrice = getAllPrice();
            $sumSalePrice = getAllSalePrice();

            $quantityUser = getQuantityUser();

            // sl user dang ky theo thang
            $userYear = getUserRegisterYear();
            $userRegister = quantityUserRegister();
            if (isset($_GET['useryear'])) {
                $userRegister = quantityUserRegister((int)$_GET['useryear']);
            }
            // sl order theo thang
            $orderBuy = quantityOrderBy();
            $oderYear = getOrderByYear();
            if (isset($_GET['orderyear'])) {
                $orderBuy = quantityOrderBy((int)$_GET['orderyear']);
            }

            // tien ban theo thang
            $moneyBuy = quantityMoneyByOrder();
            $moneyYear = getOrderByYear();
            if (isset($_GET['moneyyear'])) {
                $moneyBuy = quantityMoneyByOrder((int)$_GET['moneyyear']);
            }
            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewPageDashboard.php";
            include_once "./views/templates/admin/footer.php";


            break;

        default:
            include_once "./views/404Page.php";
            break;
    }
} else {
    include_once "./views/404Page.php";
}
