<?php
include_once "./models/connect.php";


function register($name, $email, $password)
{
    global $conn;

    $hasPass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO USERS (Username , Email , Password) VALUES ('$name' , '$email' , '$hasPass')";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function changePassByEmail($email, $password)
{
    global $conn;

    $hasPass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE USERS SET Password = '$hasPass' WHERE Email = '$email'";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}


function login($email, $password)
{
    global $conn;

    $sql = "SELECT * FROM USERS WHERE '$email' = Email";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $tmp = $stmt->fetch();
    if (password_verify($password, $tmp['Password'])) {
        return $tmp;
    }
    return false;
}

function checkPass($id, $password)
{
    global $conn;

    $sql = "SELECT * FROM USERS WHERE UserID = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $tmp = $stmt->fetch();
    if (password_verify($password, $tmp['Password'])) {
        return $tmp;
    }
    return false;
}


function checkMail($email)
{
    global $conn;
    $sql = "SELECT * FROM USERS WHERE Email = '$email' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function activePhone($id)
{
    global $conn;
    $sql = "UPDATE USERS SET Active = 1 WHERE UserID = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function changeSdt($sdt, $id)
{
    global $conn;
    $sql = "UPDATE USERS SET SDT ='$sdt' WHERE UserID = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function getQuantityUser()
{
    global $conn;
    $sql = "SELECT count(*) as user FROM USERS";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getAllUser()
{
    global $conn;
    $sql = "SELECT * FROM USERS WHERE Admin = 0 AND UserID <> 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getUserByID($id)
{
    global $conn;
    $sql = "SELECT * FROM USERS WHERE UserID = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

function getAllAdmin()
{
    global $conn;
    $sql = "SELECT * FROM USERS WHERE Admin <> 0 AND UserID <> 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function deleteUser($userID)
{
    global $conn;
    $sql = "DELETE FROM USERS WHERE UserID = $userID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}


function registerAdmin($name, $email, $password)
{
    global $conn;

    $hasPass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO USERS (Username , Email , Password , Admin , Active) VALUES ('$name' , '$email' , '$hasPass' , 1 , 1)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function updateUser($id, $name, $email, $phoneNumber, $address)
{
    global $conn;
    $sql = "UPDATE USERS SET Username ='$name' , Email = '$email' , SDT = '$phoneNumber' , DiaChi ='$address' WHERE UserID = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function changePassword($id, $password)
{
    global $conn;
    $sql = "UPDATE USERS SET Password = '$password' WHERE UserID = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function userChangeAvatar($id, $image)
{
    global $conn;
    $sql = "UPDATE USERS SET Avatar = '$image' WHERE UserID = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function quantityUserRegister($year =  2024)
{
    global $conn;
    $sql = "SELECT month(Time) as 'Time' , count(*) as 'SL' from users where year(Time) = $year group by month(Time)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getUserRegisterYear()
{
    global $conn;
    $sql = "SELECT DISTINCT year(Time) as 'year' FROM `USERS`;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}
