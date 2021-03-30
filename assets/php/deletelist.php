<?php 
require_once("functions.php");

$id = $_GET['id'];

try{
$pdo = ConnectToDatabase();
$stmt = $pdo->prepare("DELETE FROM cardlists WHERE id = $id");
$stmt->execute();

$stmt = $pdo->prepare("DELETE FROM cards WHERE listid = $id");
$stmt->execute();

$pdo = NULL;
} catch (Exception $e) {
    echo "Something went wrong: ".$e->getMessage();
}

header("Location: ../../index.php");

?>