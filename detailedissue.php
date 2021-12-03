<?php
session_start();

$host = 'localhost';
$username = 'info2180';
$password = '2021Sem1';
$dbname = 'bugme';

$title= filter_input(INPUT_GET,'title',FILTER_SANITIZE_STRING);
$id= filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);


$context= filter_input(INPUT_GET,'context',FILTER_SANITIZE_STRING);


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


$sql= "SELECT issues.id, title,issues.description, issues.type,issues.priority, issues.status, users.firstname,users.lastname, issues.created, issues.updated FROM issues join users on issues.assigned_to=users.id where issues.id=:id";
$stmt1 = $conn->prepare($sql);
$id=(int)$id;
$stmt1->bindParam(':id', $id, PDO::PARAM_INT);
$stmt1->execute();
$results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$sql2= "SELECT issues.id,users.firstname,users.lastname FROM issues join users on issues.created_by=users.id where issues.id=:id";
$stmt2 = $conn->prepare($sql2);
$stmt2->bindParam(':id', $id, PDO::PARAM_INT);
$stmt2->execute();
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


if ($context=="Closed"){
   $date= date ('Y-m-d H:i:s'); 
    $status="Closed";

    $sql5 = "UPDATE issues SET issues.status=:status1, issues.updated=:date1 WHERE issues.id=:id";
    $stmt5= $conn->prepare($sql5);
    $stmt5->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt5->bindParam(':status1', $status, PDO::PARAM_STR);
    $stmt5->bindParam(':date1', $date, PDO::PARAM_STR);
    $stmt5->execute();


    $sql= "SELECT issues.id, title,issues.description, issues.type,issues.priority, issues.status, users.firstname,users.lastname, issues.created, issues.updated FROM issues join users on issues.assigned_to=users.id where issues.id=:id";
    $stmt1 = $conn->prepare($sql);
    $id=(int)$id;
    $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt1->execute();
    $results4 = $stmt1->fetchAll(PDO::FETCH_ASSOC);



    $sql2= "SELECT issues.id,users.firstname,users.lastname FROM issues join users on issues.created_by=users.id where issues.id=:id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt2->execute();
    $results3 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
}

if ($context=="Progress"){
   $date= date ('Y-m-d H:i:s'); 
    $status="In Progress";
    $sql5 = "UPDATE issues SET issues.status=:status1, issues.updated=:date1 WHERE issues.id=:id";
    $stmt5= $conn->prepare($sql5);
    $stmt5->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt5->bindParam(':status1', $status, PDO::PARAM_STR);
    $stmt5->bindParam(':date1', $date, PDO::PARAM_STR);
    $stmt5->execute();
        
    $sql2= "SELECT issues.id, title,issues.description, issues.type,issues.priority, issues.status, users.firstname,users.lastname, issues.created, issues.updated FROM issues join users on issues.assigned_to=users.id where issues.id=:id";
    $stmt2 = $conn->prepare($sql2);
    $id=(int)$id;
    $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt2->execute();
    $results4 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $sql3= "SELECT issues.id,users.firstname,users.lastname FROM issues join users on issues.created_by=users.id where issues.id=:id";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt3->execute();
    $results3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
}
?>


<?php if($context==""){?>
<?php foreach ($results1 as $row): ?>
 <h1><?=$row['title'];?></h1>
 <h3><?='Issue # ',$row['id'];?></h3>

 <p><?=$row['description'];?></p>

 <div class="box">
     <label><?="Assigned To";?></label>
     <?=$row['firstname'];?><?=" ",$row['lastname'];?>

     <label><?="Type:";?></label>
     <?=$row['type'];?>

     <label><?="Priority:";?></label>
     <?=$row['priority'];?>
     <label><?="Status:";?></label>
     <?=$row['status'];?>
</div>

<div class="info">
<?php $date=str_split($row['created'],10);?> 
   <p><?="Issue Created on ";?><?=$date[0];?><?=" at ";?><?=$date[1];?><?=" by ";?><?=$results2[0]['firstname'];?><?=" ", $results2[0]['lastname'];?></p>

<?php $date1=str_split($row['updated'],10);?> 
   <p><?="Last Updated on ";?><?=$date1[0];?><?=" at ";?><?=$date[1];?></p>
</div>
 <?php endforeach; ?>

 <?php } ?> 


 <?php if($context=="Closed"||$context=="Progress"){?>
 <?php foreach ($results4 as $row): ?>
 <h1><?=$row['title'];?></h1>
 <h3><?='Issue # ',$row['id'];?></h3>

 <div class="box-cont">
 <div class="box">
     <label><?="Assigned To";?></label>
     <?=$row['firstname'];?><?=" ",$row['lastname'];?>

     <label><?="Type:";?></label>
     <?=$row['type'];?>

     <label><?="Priority:";?></label>
     <?=$row['priority'];?>
     <label><?="Status:";?></label>
     <?=$row['status'];?>
</div>

 </div>
 
 <p><?=$row['description'];?></p>


<div class="info">
<?php $date=str_split($row['created'],10);?> 
   <p><?="Issue Created on ";?><?=$date[0];?><?=" at ";?><?=$date[1];?><?=" by ";?><?=$results3[0]['firstname'];?><?=" ", $results3[0]['lastname'];?></p>

<?php $date1=str_split($row['updated'],10);?> 
   <p><?="Last Updated on ";?><?=$date1[0];?><?=" at ";?><?=$date[1];?></p>
</div>
 <?php endforeach; ?>


<?php } ?> 