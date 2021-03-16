<?php

function ConnectToDatabase() {

    $host = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "todolist";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $err){
        die("something went wrong in the database". $err);
    }
}




function PrepareStatementDetails(){
    $pdo = ConnectToDatabase();
    $id = $_GET['id'];
    
    $stmt = $pdo->prepare("SELECT * FROM tablename WHERE id =?");
    $stmt->execute([$name]);
    
    $result = $stmt -> fetch();
    
    $pdo = null;
    
    return $result;
    }