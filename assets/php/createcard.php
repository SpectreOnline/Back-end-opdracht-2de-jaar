<?php

require_once("functions.php");

$name = sanitizeData($_POST["card_name"]); 
$status = sanitizeData($_POST["card_status"]);
$duration = sanitizeData($_POST["card_duration"]);
$listid = sanitizeData($_POST["card_listid"]);

if($name !=null && $status != null && $duration != null){
    try{
        $pdo = ConnectToDatabase();
        $stmt = $pdo->prepare("INSERT INTO cards (`name`, `status`, duration, listid)
        VALUES
        (:name, :status, :duration, :listid)"
        );
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":duration", $duration);
        $stmt->bindParam(":listid", $listid);
        $stmt->execute();

        $pdo = NULL;

        header("Location: ../../index.php");
    } catch (Exception $e) {
        echo "Something went wrong: ".$e->getMessage();
        var_dump($_POST);
    }
}
