<?php
session_start();

$host = 'localhost';
$username = 'info2180';
$password = '2021Sem1';
$dbname = 'bugme';

$password1= filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING);
$email= filter_input(INPUT_GET,'email',FILTER_SANITIZE_STRING);
$firstname= filter_input(INPUT_GET,'firstname',FILTER_SANITIZE_STRING);
$lastname= filter_input(INPUT_GET,'lastname',FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$mysqltime = date ('Y-m-d H:i:s'); 


    $passwordhash=password_hash($password1,PASSWORD_DEFAULT);
   

    $sql="INSERT INTO users (firstname, lastname, password,email,date_joined)
    VALUES (:fname, :lname, :password1,:email,:date_joined)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fname', $firstname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lastname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password1', $passwordhash, PDO::PARAM_STR);
    $stmt->bindParam(':date_joined', $mysqltime, PDO::PARAM_STR);
    $stmt->execute();

   echo($lastname);
?>