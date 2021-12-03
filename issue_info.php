

<?php
$host = 'localhost';
$username = 'info2180';
$password = '2021Sem1';
$dbname = 'bugme';

$title = filter_input(INPUT_GET,'title',FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_GET,'description',FILTER_SANITIZE_STRING);
$assigned_to = filter_input(INPUT_GET,'name',FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_GET,'type',FILTER_SANITIZE_STRING);
$priority = filter_input(INPUT_GET,'priority',FILTER_SANITIZE_STRING);
$created = date("Y-m-d h:i:sa");
$updated = date("Y-m-d h:i:sa");

$status = "Open";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


$email = 'admin@project2.com';
$sql3= "SELECT Users.id FROM Users Where Users.email=:email";
$stmt3 = $conn->prepare($sql3);
$stmt3->bindParam(':email', $email);
$stmt3->execute();
$result = $stmt3->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row){
  $created_by=$row['id'];
}


  $sql1= "SELECT Users.firstname,Users.lastname FROM Users";
  $stmt1 = $conn->prepare($sql1);
  $stmt1->execute();
  $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);




    $sql = "INSERT INTO Issues (title,description,type,priority,status,assigned_to,created_by,created,updated) VALUES ('$title', '$description', '$type','$priority','$status','$assigned_to','$created_by','$created','$updated')";
    $stmt = $conn->prepare($sql);

    // $stmt->bindParam('sssssssss', $title, $description, $type,$priority,$status,$assigned_to,$created_by,$created,$updated);
    // $stmt->bindParam(':title', $title,':description', $description, ':assigned', $assigned,':type', $type,':priority', $priority, ':status', $status, ':created_by', $created_by,':created', $created, ':updated', $updated);
    
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':assigned', $assigned_to);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':priority', $priority);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':created_by', $created_by);
    $stmt->bindParam(':created', $created);
    $stmt->bindParam(':updated', $updated);

    $conn->exec($stmt);         
    $stmt->fetchAll(PDO::FETCH_ASSOC);

  





?>

<select id="name" type="text" name="name">                
<?php foreach ($results1 as $row): ?>
    <option value = "names"><?=$row['firstname'] ?><?=' ',$row['lastname']?></option>
 <?php endforeach; ?>
 </select>
