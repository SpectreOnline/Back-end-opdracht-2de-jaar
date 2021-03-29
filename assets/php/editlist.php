<?php
require_once("functions.php");

$id = $_GET['id'];

$name = sanitizeData($_POST["new_list_name"]); 
$orderby = sanitizeData($_POST["new_list_orderby"]);


if($name != NULL && $orderby != NULL) {
    try {
    $pdo = ConnectToDatabase();
    $stmt = $pdo->prepare("UPDATE cardlists SET `name` = :name, orderby = :orderby WHERE id = :id");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":orderby", $orderby);
    $stmt->bindParam(":id", $id);
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

?>