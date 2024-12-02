<?php

include_once "./models/connect.php";


function getProductHome($offset = 0, $cate)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE CategoryID = $cate LIMIT $offset,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductHomeOderBy($offset = 0, $cate, $orderBy)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE CategoryID = $cate ORDER BY SalePrice $orderBy LIMIT $offset,12 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductBycate($offset = 0, $cate, $makeinID)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE CategoryID = $cate AND MakeInID = $makeinID LIMIT $offset,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductBycateOrderBy($offset = 0, $cate, $makeinID, $order)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE CategoryID = $cate AND MakeInID = $makeinID ORDER BY SalePrice $order LIMIT $offset,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}


function getProductOther($offset = 0, $cate)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE CategoryID = $cate AND MakeInID IS NULL LIMIT $offset,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductOtherOrberBy($offset = 0, $cate, $order)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE CategoryID = $cate AND MakeInID IS NULL ORDER BY SalePrice $order LIMIT $offset,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}


function getProductSales($offset = 0)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE Price <> SalePrice LIMIT $offset,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductSalesOrderBy($offset = 0, $orderBY)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE Price <> SalePrice ORDER BY SalePrice $orderBY LIMIT $offset,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getCategoryProduct()
{
    global $conn;
    $sql = "SELECT * FROM MAKEIN";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductByCategory($categoryID, $default = 1)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE CategoryID = $categoryID AND MakeInID = $default";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getOtherProduct($categoryID, $offset)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE CategoryID = $categoryID AND MakeInID is NULL LIMIT = $offset , 12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductBySlug($slug)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE Slug = '$slug'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getProductBySlugCateAndMake($id)
{
    global $conn;
    $sql = "SELECT PRODUCTS.* , CATEGORIES.CategoryName as CategoryName , MAKEIN.Name as MakeInName FROM (PRODUCTS inner join CATEGORIES on PRODUCTS.CategoryID = CATEGORIES.CategoryID)
            inner join MAKEIN on  PRODUCTS.MakeInID = MAKEIN.MakeInID WHERE ProductID = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getProductSize($ProductID)
{
    global $conn;
    $sql = "SELECT SizeNum FROM SIZE WHERE ProductID = $ProductID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getImgBySlug($slug)
{

    global $conn;
    $sql = "SELECT IMAGES.Image as Img FROM PRODUCTS , IMAGES WHERE PRODUCTS.ProductID = IMAGES.ProductID AND Slug = '$slug' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getQuantityProduct($cate)
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM PRODUCTS WHERE CategoryID = $cate";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}
function getQuantityProductByCate($cate, $makeinID)
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM PRODUCTS WHERE CategoryID = $cate AND MakeInID = $makeinID ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getQuantityProductOther($cate)
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM PRODUCTS WHERE CategoryID = $cate AND MakeInID IS NULL ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getQuantityProductSale()
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM PRODUCTS WHERE Price <> SalePrice";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getAllPrice()
{
    global $conn;
    $sql = "SELECT sum(Price) as SumPrice FROM PRODUCTS";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function quantityOrderBy($year =  2024)
{
    global $conn;
    $sql = "SELECT month(Time) as 'Time' , count(*) as 'SL' from ODER where year(Time) = $year group by month(Time)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getOrderByYear()
{
    global $conn;
    $sql = "SELECT DISTINCT year(Time) as 'year' FROM `ODER`;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}


function quantityMoneyByOrder($year =  2024)
{
    global $conn;
    $sql = "SELECT month(Time) as 'Time' , sum(Money)  as 'SL' from ODER where year(Time) = $year group by month(Time)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}


function getAllSalePrice()
{
    global $conn;
    $sql = "SELECT sum(Money) as money FROM ODER WHERE Pay = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getProductByProductID($ProductID)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS WHERE ProductID = $ProductID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getAllProduct()
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getAllProductLimit($limit = 0)
{
    global $conn;
    $sql = "SELECT * FROM PRODUCTS limit $limit , 12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getAllQuantityProduct()
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM PRODUCTS";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getAllCategory()
{
    global $conn;
    $sql = "SELECT * FROM CATEGORIES ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getCategoryByID($id)
{
    global $conn;
    $sql = "SELECT * FROM CATEGORIES Where CategoryID = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getAllCMadein()
{
    global $conn;
    $sql = "SELECT * FROM MAKEIN ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}


function deleteProduct($productID)
{
    global $conn;
    $sql = "DELETE FROM PRODUCTS WHERE ProductID = $productID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function deleteCategory($categoryID)
{
    global $conn;
    $sql = "DELETE FROM CATEGORIES WHERE CategoryID = $categoryID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function editCategory($id, $name)
{
    global $conn;

    $sql = "UPDATE CATEGORIES SET CategoryName = '$name' where CategoryID = $id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function getMadeInByID($id)
{
    global $conn;
    $sql = "SELECT * FROM MAKEIN Where MakeInID = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function deleteMadein($madeinID)
{
    global $conn;
    $sql = "DELETE FROM MAKEIN WHERE MakeInID = $madeinID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}


function addProduct($name, $slug, $price, $salePrice, $instock, $cate, $made, $image)
{
    global $conn;

    $sql = "INSERT INTO PRODUCTS (Name , Slug , Price , SalePrice , Instock , CategoryID , MakeInID , Image) VALUES ('$name' , '$slug' , $price , $salePrice , $instock , $cate , $made , '$image')";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function updateProduct($name, $slug, $price, $salePrice, $instock, $cate, $made, $image, $productID)
{
    global $conn;

    $sql = "UPDATE PRODUCTS set Name ='$name' , Slug = '$slug' , Price = $price , SalePrice = $salePrice , Instock = $instock, CategoryID = $cate , MakeInID = $made , Image = '$image' where ProductID = $productID";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function getProductID()
{
    global $conn;

    $sql = "SELECT ProductID FROM `products` ORDER BY SalePrice desc limit 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function addSize($size, $id)
{
    global $conn;

    $sql = "INSERT INTO SIZE (SizeNum , ProductID) VALUES ($size , $id)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function addImages($id, $image)
{
    global $conn;

    $sql = "INSERT INTO IMAGES (ProductID , Image) VALUES ($id , '$image')";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function addCategory($name)
{
    global $conn;

    $sql = "INSERT INTO CATEGORIES ( CategoryName) VALUES ('$name')";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function addMadein($name)
{
    global $conn;

    $sql = "INSERT INTO MAKEIN ( Name) VALUES ('$name')";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function editMadein($id, $name)
{
    global $conn;

    $sql = "UPDATE MAKEIN SET Name = '$name' where MakeInID = $id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function deleteSize($id)
{
    global $conn;

    $sql = "DELETE FROM SIZE WHERE ProductID = $id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function deleteImages($id)
{
    global $conn;

    $sql = "DELETE FROM IMAGES WHERE ProductID = $id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function getProductBySearch($key, $offset, $order = "")
{
    global $conn;
    $sql = "";
    if ($order === "") {
        $sql = "SELECT * FROM `PRODUCTS` WHERE Name like '%$key%' OR Slug like '%$key%' limit $offset , 12";
    } else {
        $sql = "SELECT * FROM `PRODUCTS` WHERE Name like '%$key%' OR Slug like '%$key%' ORDER BY SalePrice $order limit $offset , 12";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductQuantityBySearch($key)
{
    global $conn;
    $sql = "SELECT count(*) as TT FROM `PRODUCTS` WHERE Name like '%$key%' OR Slug like '%$key%' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getAllCommentProduct($id)
{
    global $conn;
    $sql = "SELECT * FROM `COMMENT` INNER JOIN USERS ON COMMENT.UserID = USERS.UserID WHERE COMMENT.ProductID = $id ORDER BY CommentID DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function addComment($UserID, $content, $productID)
{
    global $conn;
    $sql = "INSERT INTO comment(UserID , Content , ProductID) values ($UserID , '$content' , $productID) ";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function deteleCmtByID($id)
{
    global $conn;

    $sql = "DELETE FROM comment WHERE CommentID = $id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function order($pay, $money, $userID, $address, $addressType, $ship)
{
    global $conn;
    $sql = "INSERT INTO ODER(Status , Pay , Money , UserID , Address , AddressType , Shipping) values (0 , $pay , $money , $userID , '$address' , '$addressType' , $ship) ";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function getIDOder()
{
    global $conn;
    $sql = "SELECT IDOder FROM `ODER` ORDER BY IDOder DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function orderDetail($id, $productID, $size, $instock)
{
    global $conn;
    $sql = "INSERT INTO DETAIL_ORDER(IDOder , ProductID , Size , Instock) values ($id , $productID , $size , $instock) ";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function reduceQuantity($sl, $id)
{
    global $conn;
    $sql = "UPDATE PRODUCTS SET Instock = Instock - $sl where ProductID = $id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function getProductUserBuy($id, $invoice)
{
    global $conn;
    $sql = "SELECT USERS.UserName as 'UserName' ,USERS.Email as 'UserEmail', USERS.SDT as 'UserSDT', ODER.Address 'UserAddress',ODER.Pay 'UserPay', ODER.Money 'UserMoney',ODER.Shipping 'UserShipping', ODER.IDOder 'UserIDOder', ODER.Time 'UserTime', DETAIL_ORDER.Instock as 'UserInstock' , DETAIL_ORDER.Size as 'UserSize' , PRODUCTS.SalePrice as 'UserSalePrice' , PRODUCTS.Name as 'ProductName' 
            FROM ((ODER inner join DETAIL_ORDER on ODER.IDOder = DETAIL_ORDER.IDOder) inner join Products 
            on DETAIL_ORDER.ProductID = Products.ProductID) inner join USERS on ODER.UserID = USERS.UserID
            where ODER.UserID = $id AND ODER.IDOder = $invoice";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProductByIDOrder($invoice)
{
    global $conn;
    $sql = "SELECT USERS.UserName as 'UserName' ,USERS.Email as 'UserEmail', USERS.SDT as 'UserSDT', ODER.Address 'UserAddress',ODER.Pay 'UserPay', ODER.Money 'UserMoney',ODER.Shipping 'UserShipping', ODER.IDOder 'UserIDOder', ODER.Time 'UserTime', DETAIL_ORDER.Instock as 'UserInstock' , DETAIL_ORDER.Size as 'UserSize' , PRODUCTS.SalePrice as 'UserSalePrice' , PRODUCTS.Name as 'ProductName' 
            FROM ((ODER inner join DETAIL_ORDER on ODER.IDOder = DETAIL_ORDER.IDOder) inner join Products 
            on DETAIL_ORDER.ProductID = Products.ProductID) inner join USERS on ODER.UserID = USERS.UserID
            where ODER.IDOder = $invoice";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getProducHistory($offset = 0)
{
    global $conn;
    $sql = "SELECT IDOder , UserName , Email , SDT , Pay , Status
            FROM ODER inner join USERS on ODER.UserID = USERS.UserID
            order by IDOder DESC LIMIT $offset , 12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getQuantityProducHistory()
{
    global $conn;
    $sql = "SELECT count(*) as 'SL'
            FROM ODER";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getAllOrderByID($id)
{
    global $conn;
    $sql = "SELECT * FROM `ODER` where UserID = $id ORDER BY IDOder DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function activeOrder($id)
{
    global $conn;
    $sql = "UPDATE ODER SET Status = 1 , Pay = 1 where IDOder = $id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}
