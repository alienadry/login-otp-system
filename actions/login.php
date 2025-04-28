<?php 
require_once('../config/database.php');

if (isset($_POST['login'])){
    try{
        $key = $_POST['key'];
        $loginPass = $_POST['password'];

        $query = "SELECT * FROM `users` WHERE (username = :key OR email = :key OR mobile = :key) AND (password = ?);";

        // stmt
        $stmt = $conn-> prepare($query);

        $stmt->bindValue(':key',$key);
        $stmt->bindValue(1,$loginPass);

        $stmt->execute();
        
        if($user = $stmt->fetch(PDO::FETCH_ASSOC)){
         echo "hello".$user['username']."wellcome";
        }else{
            echo "user not found";
        }

    }catch(Exception $e){
      echo "eror message is". $e->getMessage();
    }
}