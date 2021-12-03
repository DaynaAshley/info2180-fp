
<?php

session_start();

$host = 'localhost';
$username = 'info2180';
$password = '2021Sem1';
$dbname = 'bugme';



$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$title = filter_input(INPUT_GET,'title',FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_GET,'description',FILTER_SANITIZE_STRING);
$assigned_to = filter_input(INPUT_GET,'assigned',FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_GET,'type',FILTER_SANITIZE_STRING);
$priority = filter_input(INPUT_GET,'priority',FILTER_SANITIZE_STRING);
$created = date("Y-m-d h:i:sa");
$updated = date("Y-m-d h:i:sa");
$context=filter_input(INPUT_GET,'context',FILTER_SANITIZE_STRING);

$status = "Open";


$email = $_SESSION['email'];
$sql3= "SELECT users.id FROM users Where users.email=:email";
$stmt3 = $conn->prepare($sql3);
$stmt3->bindParam(':email', $email);
$stmt3->execute();
$result = $stmt3->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row){
  $created_by=$row['id'];
}


  $sql1= "SELECT users.firstname,users.lastname FROM users";
  $stmt1 = $conn->prepare($sql1);
  $stmt1->execute();
  $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);


  


if ($context=="submit"){

  $names=explode(" ",$assigned_to);
  $firstname=$names[0];
  $lastname=$names[1];

  

  $sql2= "SELECT users.id FROM users where users.firstname=:fname and users.lastname=:lname";
  $stmt2 = $conn->prepare($sql2);
  
  $stmt2->bindParam(':fname', $firstname, PDO::PARAM_STR);
  $stmt2->bindParam(':lname', $lastname, PDO::PARAM_STR);
  $stmt2->execute();
  $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

  foreach ($results2 as $row){
    $assigned_id=$row['id'];
  }
 

    $sql = "INSERT INTO Issues (title,description,type,priority,status,assigned_to,created_by,created,updated) VALUES ('$title', '$description', '$type','$priority','$status','$assigned_id','$created_by','$created','$updated')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }


?>

<select id="name" type="text" name="name">                
<?php foreach ($results1 as $row): ?>
    <?php if ($row['firstname']!="administrator"){?>
    <option><?=$row['firstname'] ?><?=' ',$row['lastname']?></option>
    <?php }?>
 <?php endforeach; ?>
 </select>
