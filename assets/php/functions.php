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

/*
* Write function which only grabs cards for a specific cardlist by using
cardlist ID and Orderby as parameters for the function

*Cardlist shall be used for a where statement
*Orderby shall simply be used to determine how the cards are arranged
*/ 

 function PrepareStatementCardsByCardListId($listid, $orderby){
    $pdo = ConnectToDatabase();
    $stmt = $pdo->prepare("SELECT * FROM cards WHERE listid = :listid ORDER BY :orderby ");
    $stmt->bindParam(":listid", $listid);
    $stmt->bindParam(":orderby", $orderby);
    $stmt->execute();

    $result = $stmt->fetchall();

    $pdo = null;

    return $result;
}

function PrepareStatementCardLists() {
    $pdo = ConnectToDatabase();
    $stmt = $pdo->prepare("SELECT * FROM cardlists ORDER BY id ");
    $stmt->execute();
    
    $result = $stmt->fetchall();
    
    $pdo = null;
    
    return $result;
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