<?php

require_once("functions.php");

$name = sanitizeData($_POST["list_name"]); 
$status = "Worked on";

if($name !=null){
    try{
        $pdo = ConnectToDatabase();
        $stmt = $pdo->prepare("INSERT INTO cards (`name`, `status`)
        VALUES
        (:name, :status)"
        );
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":status", $status);
        $stmt->execute();

        $pdo = NULL;

        header("Location: ../../index.php");
    } catch (Exception $e) {
        echo "Something went wrong: ".$e->getMessage();
    }
}

function sanitizeData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);

    return $data;
}