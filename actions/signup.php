<?php 
require_once('../config/loader.php');
if (isset($_POST['signup'])){
  try {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    //query
    $query = "INSERT INTO users SET username=?, email=?, mobile=?, password=?";

    //stmt
    //prepare
    $stmt = $conn->prepare($query);
    //binde
    $stmt->bindValue(1, $username);
    $stmt->bindValue(2, $email);
    $stmt->bindValue(3, $mobile);
    $stmt->bindValue(4, $password);

    //excute
    $stmt->execute();
    
    echo "created account!";
    header("Location: /loginsystem/index.php");
    exit;
  } catch(PDOException $e){
    echo 'your eror is'.$e->getMessage();
  }




}