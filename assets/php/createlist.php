<?php

require_once("functions.php");

$name = sanitizeData($_POST["list_name"]); 

function sanitizeData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);

    return $data;
}