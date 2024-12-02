<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {

        case 'productlist':
            // model
            include_once "./models/ModelProduct.php";

            $dssp = getAllProductLimit();


            $index = ceil(getAllQuantityProduct()['SL'] / 12);

            if (isset($_GET['page'])) {
                $dssp = getAllProductLimit((int)$_GET['page'] * 12);
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewProductList.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'admindetail':
            // model
            include_once "./models/ModelProduct.php";

            $slug = $_GET['sp'];

            $sp = getProductBySlug($slug);

            $sizes = getProductSize($sp['ProductID']);

            $imgs = getImgBySlug($slug);

            $cmt = getAllCommentProduct($sp['ProductID']);



            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewAdminProductDetail.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'deletecmt':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_GET['id'])) {
                $id = (int) $_GET['id'];
                deteleCmtByID($id);
                header("Location: admin.php?ctrl=product&view=admindetail&sp=" . $_GET['sp']);
            }
            break;
        case 'categorylist':
            // model
            include_once "./models/ModelProduct.php";
            $dsdm = getAllCategory();


            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewCategoryList.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'madeinlist':
            // model
            include_once "./models/ModelProduct.php";

            $dsmade = getAllCMadein();


            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewMadeinList.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'orderhistory':
            // model
            include_once "./models/ModelProduct.php";
            $htr = getProducHistory();
            $sl = getQuantityProducHistory()['SL'];
            $page = (int) floor($sl / 12);

            if (isset($_GET['page'])) {
                $htr = getProducHistory((int) $_GET['page'] * 12);
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['invoice'])) {
                    $invoice = getProductByIDOrder((int) $_GET['invoice']);
                    echo json_encode($invoice);
                    exit;
                }
            }


            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewProductOrderHistory.php";
            include_once "./views/templates/admin/footer.php";
            break;
        case 'activeorder':
            // model
            include_once "./models/ModelProduct.php";
            if (isset($_GET['invoice'])) {
                $invoice = (int)$_GET['invoice'];
                $tmp = activeOrder($invoice);
                if ($tmp) {
                    header("Location: admin.php?ctrl=product&view=orderhistory");
                    exit;
                }
            }
            break;
        case 'chat':
            // model
            include_once "./models/ModelProduct.php";


            // view
            // include_once "./views/templates/admin/head.php";
            // include_once "./views/templates/admin/siderbar.php";
            // include_once "./views/templates/admin/header.php";
            // include_once "./views/ViewProductOrder.php";
            // include_once "./views/templates/admin/footer.php";
            include_once './views/comingsoon.php';
            break;
        case 'notif':
            // model
            include_once "./models/ModelProduct.php";


            // view
            // include_once "./views/templates/admin/head.php";
            // include_once "./views/templates/admin/siderbar.php";
            // include_once "./views/templates/admin/header.php";
            // include_once "./views/ViewProductOrder.php";
            // include_once "./views/templates/admin/footer.php";
            include_once './views/comingsoon.php';
            break;
        case 'addproduct':
            // model
            include_once "./models/ModelProduct.php";

            $cate = getAllCategory();

            $made = getAllCMadein();

            if (isset($_POST['addproduct'])) {
                $name = $_POST['productname'];
                $price = (float) $_POST['price'];
                $saleprice = (float) $_POST['saleprice'];
                $stock = (int) $_POST['stock'];
                $category = (int) $_POST['category'];
                $madein = (int)$_POST['madein'];
                $size = $_POST['size'];


                if (isset($_FILES["image"]["error"])) {
                    $image = $_FILES["image"]["name"];
                    $tmp = str_replace(" ", "-", $name);
                    $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $tmp);
                    move_uploaded_file($_FILES["image"]["tmp_name"], "public/images/uploads/" . $_FILES["image"]["name"]);
                    addProduct($name, $slug, $price, $saleprice, $stock, $category, $madein, $image);
                    $id = getProductID();
                    $sizeArr = explode(" ", strtolower(trim($size)));
                    for ($i = 0; $i < count($sizeArr); $i++) {
                        if (is_numeric($sizeArr[$i]) && $sizeArr[$i] > 0) {
                            addSize((int) $sizeArr[$i], $id['ProductID']);
                        }
                    }
                    if (isset($_FILES['images'])) {
                        for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
                            move_uploaded_file($_FILES["images"]["tmp_name"][$i], "public/images/uploads/" . $_FILES["images"]["name"][$i]);
                            addImages($id['ProductID'], $_FILES["images"]["name"][$i]);
                        }
                    }
                }
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewAddProduct.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'editproduct':
            // model
            include_once "./models/ModelProduct.php";

            $cate = getAllCategory();

            $made = getAllCMadein();

            if (isset($_GET['id'])) {
                $sp = getProductBySlugCateAndMake((int)$_GET['id']);
                if (isset($_POST['editproduct'])) {
                    deleteSize((int)$_GET['id']);
                    $name = $_POST['productname'];
                    $price = (float) $_POST['price'];
                    $saleprice = (float) $_POST['saleprice'];
                    $stock = (int) $_POST['stock'];
                    $category = (int) $_POST['category'];
                    $madein = (int)$_POST['madein'];
                    $size = $_POST['size'];
                    if (isset($_FILES["image"]["error"])) {
                        deleteImages((int)$_GET['id']);
                        $image = $_FILES["image"]["name"];
                        $tmp = str_replace(" ", "-", $name);
                        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $tmp);
                        move_uploaded_file($_FILES["image"]["tmp_name"], "public/images/uploads/" . $_FILES["image"]["name"]);
                        updateProduct($name, $slug, $price, $saleprice, $stock, $category, $madein, $image, (int)$_GET['id']);
                        $sizeArr = explode(" ", strtolower(trim($size)));
                        for ($i = 0; $i < count($sizeArr); $i++) {
                            if (is_numeric($sizeArr[$i]) && $sizeArr[$i] > 0) {
                                addSize((int) $sizeArr[$i], (int)$_GET['id']);
                            }
                        }
                        if (isset($_FILES['images'])) {
                            for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
                                move_uploaded_file($_FILES["images"]["tmp_name"][$i], "public/images/uploads/" . $_FILES["images"]["name"][$i]);
                                addImages((int)$_GET['id'], $_FILES["images"]["name"][$i]);
                            }
                        }
                    }
                    header("Location: admin.php?ctrl=product&view=productlist");
                }
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewEditProduct.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'addcategory':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_POST['addcategory'])) {
                addCategory(trim($_POST['categoryname']));
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewAddCategory.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'editcategory':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_GET['id'])) {
                $cate = getCategoryByID((int) $_GET['id']);
            }

            if (isset($_POST['editcategory'])) {
                editCategory((int)$_GET['id'], trim($_POST['categoryname']));
                header("Location: admin.php?ctrl=product&view=categorylist");
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewEditCategory.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'addmadein':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_POST['addmadein'])) {
                addMadein(trim($_POST['name']));
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewAddMadeIn.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'editmadein':
            // model
            include_once "./models/ModelProduct.php";


            if (isset($_GET['id'])) {
                $made = getMadeInByID((int) $_GET['id']);
            }

            if (isset($_POST['editmadein'])) {
                editMadein((int)$_GET['id'], trim($_POST['name']));
                header("Location: admin.php?ctrl=product&view=madeinlist");
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/siderbar.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewEditMadeIn.php";
            include_once "./views/templates/admin/footer.php";

            break;
        case 'deleteproduct':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_GET['id'])) {
                $id = (int) $_GET['id'];
                deleteProduct($id);
                header("Location: ?ctrl=product&view=productlist");
            }

            break;
        case 'deletecategory':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_GET['id'])) {
                $id = (int) $_GET['id'];
                deleteCategory($id);
                header("Location: ?ctrl=product&view=categorylist");
            }

            break;
        case 'deletemadein':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_GET['id'])) {
                $id = (int) $_GET['id'];
                deleteMadein($id);
                header("Location: ?ctrl=product&view=madeinlist");
            }

            break;
        default:
            include_once "./views/404Page.php";
            break;
    }
} else {
    include_once "./views/404Page.php";
}
