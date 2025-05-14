<?php 
session_start();
require_once('../config/loader.php');

if (isset($_POST['login'])){
    try{
        $key = trim(htmlspecialchars($_POST['key']));
        $loginPass = trim(htmlspecialchars($_POST['password']));

        $query = "SELECT * FROM `users` WHERE (username = :key OR email = :key OR mobile = :key) AND (password = :password);";

        // stmt
        $stmt = $conn-> prepare($query);

        $stmt->bindValue(':key',$key);
        $stmt->bindValue(':password',$loginPass);

        $stmt->execute();
        
        if($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['login success'] = "hello ".$user['username']." wellcome";
        header('location: ../index.php');
        }else{
            $_SESSION['login fail'] = "login failed";
            header('location: ../index.php');
        }

    }catch(Exception $e){
      echo "eror message is". $e->getMessage();
    }
}