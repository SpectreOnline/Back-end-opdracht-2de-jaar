<?php

require_once("functions.php");

$name = sanitizeData($_POST["list_name"]); 
$orderby = "id";
$filter = "none";


if($name != NULL) {
    try{
        $pdo = ConnectToDatabase();
        $stmt = $pdo->prepare("INSERT INTO cardlists (`name`, orderby, `filter`)
        VALUES
        (:name, :orderby, :filter)"
        );
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":orderby", $orderby);
        $stmt->bindParam(":filter", $filter);
        $stmt->execute();

        $pdo = NULL;

        header("Location: ../../index.php");
    } catch (Exception $e) {
        echo "Something went wrong: ".$e->getMessage();
    }
}

