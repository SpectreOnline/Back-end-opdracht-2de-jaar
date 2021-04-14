<?php
/*
Opens a connection to the database
*/
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

 function PrepareStatementCardsByCardListId($listid, $orderby = 'id', $filter = 'none'){
    $pdo = ConnectToDatabase();
    if($filter == 'none'){
        $stmt = $pdo->prepare("SELECT * FROM cards WHERE listid = :listid ORDER BY $orderby asc");
    } else {
        $stmt = $pdo->prepare("SELECT * FROM cards WHERE listid = :listid AND status = :stat ORDER BY $orderby asc");
    }

    $stmt->bindParam(":listid", $listid);

    if($filter != 'none'){
    $stmt->bindParam(":stat", $filter);
    }

    $stmt->execute();

    $result = $stmt->fetchAll();

    $pdo = null;

    return $result;
}
/*
This function fetches all the card lists out of the database that are to be displayed on the page
*/
function PrepareStatementCardLists() {
    $pdo = ConnectToDatabase();
    $stmt = $pdo->prepare("SELECT * FROM cardlists ORDER BY id ");
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    $pdo = null;
    
    return $result;
    }
    
/*
Receives data en then proceeds to use 3 built in php functions to sanitize the given data
The sanitized data is then returned
*/
function sanitizeData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);

    return $data;
}