<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'shoes':
            // model
            include_once "./models/ModelProduct.php";

            if (!isset($_GET['sort'])) {
                $i = ceil(getQuantityProduct(1)['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = $_GET['page'];
                    $dsspShoesAll = getProductHome((int)$_GET['page'] * 12, 1);
                } else {
                    $dsspShoesAll = getProductHome(0, 1);
                }
            }

            if (isset($_GET['sort'])) {
                if ($_GET['sort'] === 'gradually-increase') {
                    $sort = 'ASC';
                } else if ($_GET['sort'] === 'gradually-decreasing') {
                    $sort = 'DESC';
                }
                $i = ceil(getQuantityProduct(1)['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = $_GET['page'];
                    $dsspShoesAll = getProductHomeOderBy((int)$_GET['page'] * 12, 1, $sort);
                } else {
                    $dsspShoesAll = getProductHomeOderBy(0, 1, $sort);
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductShoes.php";
            include_once "./views/templates/footer.php";


            break;

        case 'fashion':
            // model
            include_once "./models/ModelProduct.php";

            if (!isset($_GET['sort'])) {
                $i = ceil(getQuantityProduct(2)['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = $_GET['page'];
                    $dsspFashionAll = getProductHome((int)$_GET['page'] * 12,  2);
                } else {
                    $dsspFashionAll = getProductHome(0, 2);
                }
            }

            if (isset($_GET['sort'])) {
                if ($_GET['sort'] === 'gradually-increase') {
                    $sort = 'ASC';
                } else if ($_GET['sort'] === 'gradually-decreasing') {
                    $sort = 'DESC';
                }
                $i = ceil(getQuantityProduct(2)['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = $_GET['page'];
                    $dsspFashionAll = getProductHomeOderBy((int)$_GET['page'] * 12, 2, $sort);
                } else {
                    $dsspFashionAll = getProductHomeOderBy(0, 2, $sort);
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductFashion.php";
            include_once "./views/templates/footer.php";


            break;

        case 'sales':
            // model
            include_once "./models/ModelProduct.php";

            if (!isset($_GET['sort'])) {
                $i = ceil(getQuantityProductSale()['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = $_GET['page'];
                    $dsspSalesAll = getProductSales((int)$_GET['page'] * 12);
                } else {
                    $dsspSalesAll = getProductSales();
                }
            }

            if (isset($_GET['sort'])) {
                if ($_GET['sort'] === 'gradually-increase') {
                    $sort = 'ASC';
                } else if ($_GET['sort'] === 'gradually-decreasing') {
                    $sort = 'DESC';
                }
                $i = ceil(getQuantityProductSale()['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = $_GET['page'];
                    $dsspSalesAll = getProductSalesOrderBy((int)$_GET['page'] * 12,  $sort);
                } else {
                    $dsspSalesAll = getProductSalesOrderBy(0,  $sort);
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductSales.php";
            include_once "./views/templates/footer.php";


            break;

        case 'categoryshoes':
            // model
            include_once "./models/ModelProduct.php";
            $cate = 1;
            $dssm = getCategoryProduct();


            if (!isset($_GET['sort'])) {
                $default = (int) $_GET['make'];
                $i = ceil(getQuantityProductByCate($cate, $default)['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = $_GET['page'];
                    $dsspByDm =  getProductBycate((int)$_GET['page'] * 12,  $cate, $default);
                } else {
                    $dsspByDm = getProductBycate(0,  $cate, $default);
                }

                if ((int)$_GET['make'] === 0) {
                    $default = (int) $_GET['make'];
                    $i = ceil(getQuantityProductOther($cate)['SL'] / 12);
                    $index = 0;
                    if (isset($_GET['page'])) {
                        $index = $_GET['page'];
                        $dsspByDm = getProductOther((int)$_GET['page'] * 1,  $cate);
                    } else {
                        $dsspByDm = getProductOther(0,  $cate);
                    }
                }
            }

            if (isset($_GET['sort'])) {
                $default = (int) $_GET['make'];
                if ($_GET['sort'] === 'gradually-increase') {
                    $sort = 'ASC';
                } else if ($_GET['sort'] === 'gradually-decreasing') {
                    $sort = 'DESC';
                }
                $i = ceil(getQuantityProductByCate($cate, $default)['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = (int) $_GET['page'];
                    $dsspByDm = getProductBycateOrderBy((int)$_GET['page'] * 12,  $cate, $default, $sort);
                } else {
                    $dsspByDm = getProductBycateOrderBy(0,  $cate, $default, $sort);
                }

                if ((int)$_GET['make'] === 0) {
                    $default = (int) $_GET['make'];
                    $i = ceil(getQuantityProductOther($cate)['SL'] / 12);
                    $index = 0;
                    if (isset($_GET['page'])) {
                        $index = $_GET['page'];
                        $dsspByDm = getProductOtherOrberBy((int)$_GET['page'] * 1,  $cate, $sort);
                    } else {
                        $dsspByDm = getProductOtherOrberBy(0,  $cate, $sort);
                    }
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductCategoryShoes.php";
            include_once "./views/templates/footer.php";


            break;

        case 'categoryfashion':
            // model
            include_once "./models/ModelProduct.php";
            $cate = 2;
            $dssm = getCategoryProduct();

            if (!isset($_GET['sort'])) {
                $default = (int) $_GET['make'];
                $i = ceil(getQuantityProductByCate($cate, $default)['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = $_GET['page'];
                    $dsspByDm =  getProductBycate((int)$_GET['page'] * 12,  $cate, $default);
                } else {
                    $dsspByDm = getProductBycate(0,  $cate, $default);
                }

                if ((int)$_GET['make'] === 0) {
                    $default = (int) $_GET['make'];
                    $i = ceil(getQuantityProductOther($cate)['SL'] / 12);
                    $index = 0;
                    if (isset($_GET['page'])) {
                        $index = $_GET['page'];
                        $dsspByDm = getProductOther((int)$_GET['page'] * 1,  $cate);
                    } else {
                        $dsspByDm = getProductOther(0,  $cate);
                    }
                }
            }

            if (isset($_GET['sort'])) {
                $default = (int) $_GET['make'];
                if ($_GET['sort'] === 'gradually-increase') {
                    $sort = 'ASC';
                } else if ($_GET['sort'] === 'gradually-decreasing') {
                    $sort = 'DESC';
                }
                $i = ceil(getQuantityProductByCate($cate, $default)['SL'] / 12);
                $index = 0;

                if (isset($_GET['page'])) {
                    $index = (int) $_GET['page'];
                    $dsspByDm = getProductBycateOrderBy((int)$_GET['page'] * 12,  $cate, $default, $sort);
                } else {
                    $dsspByDm = getProductBycateOrderBy(0,  $cate, $default, $sort);
                }

                if ((int)$_GET['make'] === 0) {
                    $default = (int) $_GET['make'];
                    $i = ceil(getQuantityProductOther($cate)['SL'] / 12);
                    $index = 0;
                    if (isset($_GET['page'])) {
                        $index = $_GET['page'];
                        $dsspByDm = getProductOtherOrberBy((int)$_GET['page'] * 1,  $cate, $sort);
                    } else {
                        $dsspByDm = getProductOtherOrberBy(0,  $cate, $sort);
                    }
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductCategoryFashion.php";
            include_once "./views/templates/footer.php";


            break;

        case 'favourite':
            // model
            // unset($_SESSION['favourite']);
            include_once "./models/ModelProduct.php";
            // unset($_SESSION['favourite']);
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['index'])) {
                    $index = (int)$_GET['index'];
                    if (isset($_SESSION['favourite'])) {
                        $hasProduct = true;
                        $i = 0;
                        foreach ($_SESSION['favourite'] as $value) {
                            if ($value['ID'] === $index) {
                                $hasProduct = false;
                                array_splice($_SESSION['favourite'], $i, 1);
                                if (count($_SESSION['favourite']) === 0) {
                                    unset($_SESSION['favourite']);
                                }
                                break;
                            }
                            $i++;
                        }
                        if ($hasProduct) {
                            array_push(
                                $_SESSION['favourite'],
                                ["ID" => $index,]
                            );
                        }
                    } else {
                        $_SESSION['favourite'] = [
                            ["ID" => $index,]
                        ];
                    }
                }
            }

            if (isset($_SESSION['favourite'])) {
                $i = 0;
                foreach ($_SESSION['favourite'] as &$value) {
                    $tmp = getProductByProductID($value['ID']);
                    if ($tmp) {
                        $value['Name'] = $tmp['Name'];
                        $value['Slug'] = $tmp['Slug'];
                        $value['Price'] = $tmp['Price'];
                        $value['SalePrice'] = $tmp['SalePrice'];
                        $value['Instock'] = $tmp['Instock'];
                        $value['Image'] = $tmp['Image'];
                        unset($value);
                    } else {
                        array_splice($_SESSION['favourite'], $i, 1);
                        if (count($_SESSION['favourite']) === 0) {
                            unset($_SESSION['favourite']);
                        }
                    }
                    $i++;
                }
            }


            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductFavourite.php";
            include_once "./views/templates/footer.php";


            break;
        case 'search':
            // model

            include_once "./models/ModelProduct.php";

            if (isset($_GET['key'])) {
                $key = $_GET['key'];
                $index = 0;
                $i = ceil(getProductQuantityBySearch($key)['TT'] / 12);
                if (isset($_GET['page']) && isset($_GET['sort'])) {
                    $sort = "";
                    $index = (int) $_GET['page'];
                    if ($_GET['sort'] === 'gradually-increase') {
                        $sort = 'ASC';
                    } else {
                        $sort = 'DESC';
                    }
                    $dssp = getProductBySearch($key, (int)$_GET['page'] * 12, $sort);
                } else if (isset($_GET['page']) && !isset($_GET['sort'])) {
                    $index = (int) $_GET['page'];
                    $dssp = getProductBySearch($key, (int)$_GET['page'] * 12);
                } else if (!isset($_GET['page']) && isset($_GET['sort'])) {
                    $sort = "";
                    if ($_GET['sort'] === 'gradually-increase') {
                        $sort = 'ASC';
                    } else {
                        $sort = 'DESC';
                    }
                    $dssp = getProductBySearch($key, 0, $sort);
                } else {
                    $dssp = getProductBySearch($key, 0);
                }
            }


            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductSearch.php";
            include_once "./views/templates/footer.php";


            break;
        case 'cart':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as &$item) {
                    $info = getProductBySlug($item['Slug']);
                    if ($info) {
                        $item['Name'] = $info['Name'];
                        $item['SalePrice'] = $info['SalePrice'];
                        $item['Image'] = $info['Image'];
                        $item['ProductID'] = $info['ProductID'];
                        $item['Instock'] = $info['Instock'];
                        unset($item);
                    } else {
                        array_splice($_SESSION['cart'], $i, 1);
                        if (count($_SESSION['cart']) === 0) {
                            unset($_SESSION['cart']);
                        }
                    }
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['action']) && isset($_GET['id'])) {
                    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                        if ($_SESSION['cart'][$i]['ProductID'] === (int) $_GET['id']) {
                            $_SESSION['cart'][$i]['Quantity'] = (int) $_GET['action'];
                            echo  $_SESSION['cart'][$i]['Quantity'];
                            break;
                        }
                    }
                }
            }

            // unset($_SESSION['cart']);

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductCart.php";
            include_once "./views/templates/footer.php";


            break;

        case 'detail':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_SESSION['sizebuy'])) {
                unset($_SESSION['sizebuy']);
            }
            if (isset($_SESSION['size'])) {
                unset($_SESSION['size']);
            }

            $slug = $_GET['sp'];

            $sp = getProductBySlug($slug);

            $sizes = getProductSize($sp['ProductID']);

            $imgs = getImgBySlug($slug);

            $cmt = getAllCommentProduct($sp['ProductID']);

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductDetail.php";
            include_once "./views/templates/footer.php";


            break;

        case 'addcart':
            // model
            include_once "./models/ModelProduct.php";

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['size'])) {
                    $_SESSION['size'] = $_GET['size'];
                }
            }
            if (isset($_GET['sp'])) {
                $slug = $_GET['sp'];
                $hasSP = true;
                if (isset($_SESSION['size'])) {
                    $size = (int) $_SESSION['size'];
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as &$value) {
                            if ($value['Slug'] === $slug && $value['Size'] === $size) {
                                $value['Quantity'] += 1;
                                $hasSP = false;
                                break;
                            }
                        }
                        if ($hasSP) {
                            array_push($_SESSION['cart'], [
                                "Slug" => $slug,
                                "Size" => $size,
                                "Quantity" => 1,
                            ]);
                        }
                        unset($_SESSION['size']);
                        header("Location: ?ctrl=product&view=cart");
                    } else {
                        $_SESSION['cart'] = array();
                        array_push($_SESSION['cart'], [
                            "Slug" => $slug,
                            "Size" => $size,
                            "Quantity" => 1,
                        ]);
                        unset($_SESSION['size']);
                        header("Location: ?ctrl=product&view=cart");
                    }
                } else {
                    $_SESSION['mess'] = "Vui long chon size";
                    header("Location: ?ctrl=product&view=detail&sp=" . $slug);
                }
            }


        case 'deletecart':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_GET['slug']) && isset($_GET['index'])) {

                $index = (int) $_GET['index'];

                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    if ($_SESSION['cart'][$i]['ProductID'] === $index) {
                        array_splice($_SESSION['cart'], $i, 1);
                        if (count($_SESSION['cart']) === 0) {
                            unset($_SESSION['cart']);
                        }
                        header("Location: ?ctrl=product&view=cart");
                        break;
                    }
                }
            }

            break;
            // model
        case 'comment':
            include_once "./models/ModelProduct.php";
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_SESSION['user'])) {
                    if (isset($_GET['content'])) {
                        $content = $_GET['content'];
                        $userID = $_SESSION['user']['UserID'];
                        $productID = (int) $_GET['sp'];
                        $add = addComment($userID, $content, $productID);
                        if ($add) {
                            $sp = getAllCommentProduct($productID);
                            $tmp = "";
                            foreach ($sp as $i) {
                                $tmp .= "
                                <li class=\"p-3\">
                                    <h4 class=\"fs-2 fw-medium\">" . $i['Username'] . "</h4>
                                    <p class=\"fs-3\">" . $i['Content'] . "</p>
                                    <h6 class=\"fs-4 text-secondary\">" . $i['Time'] . "</h6>
                                </li>
                                ";
                            }
                            echo $tmp;
                        }
                    }
                }
            }
            break;
        case 'buy':
            include_once "./models/ModelProduct.php";
            include_once "./models/phpmailer.php";
            // unset($_SESSION['sizebuy']);
            $sp = null;
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['size'])) {
                    $_SESSION['sizebuy'] = (int)$_GET['size'];
                } else {
                    if (!isset($_SESSION['sizebuy'])) {
                        $slug = getProductByProductID((int)$_GET['product']);
                        $_SESSION['mess'] = 'Vui long chon size!';
                        header("Location: index.php?ctrl=product&view=detail&sp=" . $slug['Slug']);
                        exit;
                    }
                }
            }
            if (isset($_SESSION['sizebuy']) || isset($_GET['productlist'])) {
                if (isset($_GET['product']) || isset($_GET['productlist'])) {
                    if ($_SESSION['user']['Active']) {
                        // active true
                        if (isset($_GET['product'])) {
                            // buy
                            $sp = getProductByProductID((int)$_GET['product']);
                        } else if (isset($_GET['productlist'])) {
                            // phat trien trong tuong lai vi mat dinh productlist dung session cart
                        }
                        // view
                        include_once "./views/templates/head.php";
                        include_once "./views/templates/header.php";
                        include_once "./views/ViewProductBuy.php";
                        include_once "./views/templates/footer.php";
                    } else {
                        // active false
                        $_SESSION['mess'] = "Please active to buy";
                        unset($_SESSION['sizebuy']);
                        header("Location: index.php?ctrl=user&view=useractive");
                        exit;
                    }
                }
            }
            if (isset($_POST['buyproduct'])) {
                $id = $_SESSION['user']['UserID'];
                $money = (int)$_POST['sumtotalbuy'];
                $addType = $_POST['address'];
                $tinh = $_POST['country'];
                $huyen = $_POST['district'];
                $xa = $_POST['commune'];
                $sonha = $_POST['detailaddress'];
                $diachi = $sonha . " " . $xa . " " . $huyen . " " . $tinh;
                $payType = $_POST['pay-method'];

                if (isset($_GET['product'])) {
                    $sl = (int)$_POST['buysl'];
                    $productID = (int)$_GET['product'];
                    $size = $_SESSION['sizebuy'];

                    if ($payType === 'bank') {
                        $_SESSION['mess'] = 'Chức năng đang phát triển';
                        header("Location: index.php?ctrl=product&view=buy&product=" . $sp['ProductID']);
                        exit;
                    } else {
                        $true = order(0, $money, $id, $diachi, $addType, 30000);
                        if ($true) {
                            $orderID = getIDOder()['IDOder'];
                            $isOrder = orderDetail($orderID, $productID, $_SESSION['sizebuy'], $sl);
                            if ($isOrder) {
                                // - sl trong bang products
                                reduceQuantity($sl, $productID);
                                unset($_SESSION['sizebuy']);
                                // mail cam on
                                thankBuyStore($_SESSION['user']['Email']);
                                header("Location: index.php?ctrl=product&view=orders");
                                exit;
                            }
                        }
                    }
                } else if (isset($_GET['productlist'])) {
                    // cart 
                    if ($payType === 'bank') {
                        $_SESSION['mess'] = 'Chức năng đang phát triển';
                        header("Location: index.php?ctrl=product&view=buy&product=" . $sp['ProductID']);
                        exit;
                    } else {
                        $true = order(0, $money, $id, $diachi, $addType, 30000);
                        if ($true) {
                            $orderID = getIDOder()['IDOder'];
                            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                                $isOrder = orderDetail($orderID, $_SESSION['cart'][$i]['ProductID'], $_SESSION['cart'][$i]['Size'], (int)$_POST['buysl'][$i]);
                                if ($isOrder) {
                                    // tru sl trong bang product
                                    reduceQuantity((int)$_POST['buysl'][$i], $_SESSION['cart'][$i]['ProductID']);
                                }
                            }
                            // xoa cart
                            unset($_SESSION['cart']);
                            // mail cam on
                            thankBuyStore($_SESSION['user']['Email']);
                            header("Location: index.php?ctrl=product&view=orders");
                            exit;
                        }
                    }
                }
            }

            break;
        case 'orders':
            // model
            include_once "./models/ModelProduct.php";
            $dssp = getAllOrderByID((int)$_SESSION['user']['UserID']);

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['invoice'])) {
                    $invoice = getProductUserBuy((int)$_SESSION['user']['UserID'], (int) $_GET['invoice']);
                    echo json_encode($invoice);
                    exit;
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProductOrder.php";
            include_once "./views/templates/footer.php";
            break;
        default:
            include_once "./views/404Page.php";
            break;
    }
} else {
    include_once "./views/404Page.php";
}
