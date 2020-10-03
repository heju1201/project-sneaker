<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "sellingsneaker");

function db_connect(){
  $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  return $connect;
}

$db = db_connect();

function db_disconnect($connect){
    if(isset($connect)){
        mysqli_close($connect);
    }
}

function confirm_query_result($result){
  global $db;
  if (!$result) {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  } else {
    return $result;
  }
}
/*********************ADMIN*********************************** */
function SelectAllAdmin1(){
    global $db;
    $sql = "SELECT *FROM `admin`";
    $result =mysqli_query($db,$sql);
    return confirm_query_result($result);
}
function SelectAllAdmin($first, $final){
  global $db;

  if (isset($_POST["submit"])) {
    $search = $_POST['value'];
  } 
  else {
    if (!isset($_GET["page"])) {
      $search = "";
    } else {
      $search = $_GET['value'];
    }
  }
  $sql = "SELECT * FROM `admin` ";
  $sql .= "WHERE adminName LIKE '%" . $search . "%'". "LIMIT  $first,$final";
  return  mysqli_query($db, $sql);
}
function InsertAdmin($admin){
  global $db;

  $sql = "INSERT INTO admin ";
  $sql .= "(adminName, password, phone, email) ";
  $sql .= "VALUES (";
  $sql .= "'" . $admin['name'] . "',";
  $sql .= "'" . $admin['password'] . "',";
  $sql .= "'" . $admin['phone'] . "',";
  $sql .= "'" . $admin['email'] . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
}
function UpdateAdmin($admin){
  global $db;
  $sql = "UPDATE admin SET ";
  $sql .= "adminName='" . $admin['name'] . "', ";
  $sql .= "password='" . $admin['password'] . "', ";
  $sql .= "phone='" . $admin['phone'] . "', ";
  $sql .= "email='" . $admin['email'] . "' ";
  $sql .= "WHERE idadmin='" . $admin['idadmin'] . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
}
function SelectOneAdmin($id){
  global $db;

  $sql = "SELECT * FROM admin ";
  $sql .= "WHERE idadmin='" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_query_result($result);
  $admin = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $admin;
}
function DeleteAdmin($id) {
  global $db;

  $sql = "DELETE FROM admin ";
  $sql .= "WHERE idadmin='" . $id . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
}
/*********************Brand*********************************** */
function SelectAllBrand1(){
  global $db;
  $sql = "SELECT *FROM `brand`";
  $result =mysqli_query($db,$sql);
  return confirm_query_result($result);
}
function SelectAllBrand($first, $final){
  global $db;

  if (isset($_POST["submit"])) {
    $search = $_POST['value'];
  } 
  else {
    if (!isset($_GET["page"])) {
      $search = "";
    } else {
      $search = $_GET['value'];
    }
  }
  $sql = "SELECT * FROM `brand` ";
  $sql .= "WHERE brandName LIKE '%" . $search . "%'"."LIMIT  $first,$final";
  return  mysqli_query($db, $sql);
}
/*********************USER*********************************** */
function SelectAllUser1(){
  global $db;
  $sql = "SELECT *FROM `user`";
  $result =mysqli_query($db,$sql);
  return confirm_query_result($result);
}
function SelectAllUser($first, $final){
  global $db;

  if (isset($_POST["submit"])) {
    $search = $_POST['value'];
  } 
  else {
    if (!isset($_GET["page"])) {
      $search = "";
    } else {
      $search = $_GET['value'];
    }
  }
  $sql = "SELECT * FROM `user` ";
  $sql .= "WHERE userName LIKE '%" . $search . "%'"."LIMIT  $first,$final";
  return  mysqli_query($db, $sql);
}
/*********************Product*********************************** */
function SelectAllProduct1(){
  global $db;
  $sql = "SELECT *FROM `sneaker`";
  $result =mysqli_query($db,$sql);
  return confirm_query_result($result);
}

function SelectAllProduct($first, $final){
  global $db;

  if (isset($_POST["submit"])) {
    $search = $_POST['value'];
  } 
  else {
    if (!isset($_GET["page"])) {
      $search = "";
    } else {
      $search = $_GET['value'];
    }
  }
  $sql = "SELECT * FROM `sneaker` ";
  $sql .= "WHERE sneakerName LIKE '%" . $search . "%'"."LIMIT  $first,$final";
  return  mysqli_query($db, $sql);
}
