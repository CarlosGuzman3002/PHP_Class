<?php

include('../includes/db_conn.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];

    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
            Delete From
                    phpclass.customer
                where 
                    customerId = :Id
        
        ");
        $sql->bindValue(':Id', $id);
        $sql->execute();

        header("Location:customerListing.php?delete=1");
        exit();

    }catch (PDOException $e){

        echo $e->getMessage();
        exit();
    }
}

header("Location:customerListing.php");