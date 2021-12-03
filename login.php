<?php
session_start();

$host = 'localhost';
$username = 'info2180';
$password = '2021Sem1';
$dbname = 'bugme';

$password1= filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING);
$email= filter_input(INPUT_GET,'email',FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


$sql= "SELECT users.password FROM users Where email=:email";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (empty($results)){
    echo ("false");
}
else{
    if(password_verify($password1, $results[0]['password'])||md5($password1)== $results[0]['password']) {
        $_SESSION['email']=$email;
        echo("true");
    }
    else{
        echo("false");
    }
}

?>

