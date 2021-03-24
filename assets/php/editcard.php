<?php
require_once("functions.php");

$id = $_GET['id'];

$name = sanitizeData($_POST["new_card_name"]); 
$status = sanitizeData($_POST["new_card_status"]);
$duration = sanitizeData($_POST["new_card_duration"]);


if($name != NULL && $status != NULL && $duration != NULL) {
    try {
    $pdo = ConnectToDatabase();
    $stmt = $pdo->prepare("UPDATE cards SET `name` = :name, `status` = :status, duration = :duration WHERE id = :id");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":duration", $duration);
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