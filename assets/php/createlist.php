<?php

require_once("functions.php");

$name = sanitizeData($_POST["list_name"]); 
$orderby = "id";

if($name !=null){
    try{
        $pdo = ConnectToDatabase();
        $stmt = $pdo->prepare("INSERT INTO cardlists (`name`, orderby)
        VALUES
        (:name, :orderby)"
        );
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":orderby", $orderby);
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