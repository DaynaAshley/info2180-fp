<?php
session_start();

$host = 'localhost';
$username = 'info2180';
$password = '2021Sem1';
$dbname = 'bugme';

$context= filter_input(INPUT_GET,'context',FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


$sql= "SELECT issues.id, title, issues.type,issues.priority, issues.status, users.firstname,users.lastname, issues.created FROM issues join users on issues.assigned_to=users.id";
$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($context=='open'){

  $sql1= "SELECT issues.id, title, issues.type,issues.priority, issues.status, users.firstname,users.lastname, issues.created FROM issues join users on issues.assigned_to=users.id where issues.status=:stat";
  $stmt1 = $conn->prepare($sql1);
  $status='Open';
  $stmt1->bindParam(':stat', $status, PDO::PARAM_STR);
  $stmt1->execute();
  $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
}

if ($context=='my_ticket'){
  $sql2= "SELECT issues.id, title, issues.type,issues.priority, issues.status, users.firstname,users.lastname, issues.created FROM issues join users on issues.assigned_to=users.id where issues.assigned_to=:id";
  $stmt2 = $conn->prepare($sql2);
  
  $user_email=$_SESSION['email'];
  $sql3= "SELECT users.id FROM users Where users.email=:email";
  $stmt3 = $conn->prepare($sql3);
  $stmt3->bindParam(':email', $user_email, PDO::PARAM_STR);
  $stmt3->execute();
  $result = $stmt3->fetchAll(PDO::FETCH_ASSOC);

  foreach ($result as $row){
    $id=$row['id'];
  }
  
  $stmt2->bindParam(':id', $id , PDO::PARAM_STR);
  $stmt2->execute();
  $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php if($context=='all'){?>
 <table class= "ctable">
  <thead>
    <tr>
    <th>Title</th>
    <th>Type</th>
    <th>Status</th>
    <th>Assigned To</th>
    <th>Created</th>
</tr>
  </thead>

  <?php foreach ($results as $row): ?>
  <tbody>
    <tr>
    <td><?='#',$row['id'];?><?php echo '<a href="detailedissue_index.php?title='.$row['title'].'&id='.$row['id'].'">'.$row['title'].'</a>'?></td>
  <td><?=$row['type'];?></td>
  
  <?php if($row['status']=="Open"){ ?>
      <td><button class='open'><?=$row['status'];?></button></td>
  <?php } ?> 
  
  <?php if($row['status']=="Closed"){ ?>
      <td><button class='closed'><?=$row['status'];?></button></td>
  <?php } ?> 

  <?php if($row['status']=="In Progress"){ ?>
      <td><button class='progress'><?=$row['status'];?></button></td>
  <?php } ?> 

  <td><?=$row['firstname'];?><?=' ',$row['lastname'];?></td>
  <?php $date=str_split($row['created'],10);?> 
  <td><?=$date[0];?></td>
  </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<?php } ?> 

<?php if($context=='my_ticket'){?>
 <table class= "ctable">
  <thead>
    <tr>
    <th>Title</th>
    <th>Type</th>
    <th>Status</th>
    <th>Assigned To</th>
    <th>Created</th>
</tr>
  </thead>

  <?php foreach ($results2 as $row): ?>
  <tbody>
    <tr>
    <td><?='#',$row['id'];?><?php echo '<a href="detailedissue_index.php?title='.$row['title'].'&id='.$row['id'].'">'.$row['title'].'</a>'?></td>
  <td><?=$row['type'];?></td>
  <?php if($row['status']=="Open"){ ?>
      <td><button class='open'><?=$row['status'];?></button></td>
  <?php } ?> 
  
  <?php if($row['status']=="Closed"){ ?>
      <td><button class='closed'><?=$row['status'];?></button></td>
  <?php } ?> 

  <?php if($row['status']=="In Progress"){ ?>
      <td><button class='progress'><?=$row['status'];?></button></td>
  <?php } ?> 
  <td><?=$row['firstname'];?><?=' ',$row['lastname'];?></td>
  <?php $date=str_split($row['created'],10);?> 
  <td><?=$date[0];?></td>
  </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<?php } ?> 

<?php if($context=='open'){?>
 <table class= "ctable">
  <thead>
    <tr>
    <th>Title</th>
    <th>Type</th>
    <th>Status</th>
    <th>Assigned To</th>
    <th>Created</th>
</tr>
  </thead>

  <?php foreach ($results1 as $row): ?>
  <tbody>
    <tr>
    <td><?='#',$row['id'];?><?php echo '<a href="detailedissue_index.php?title='.$row['title'].'&id='.$row['id'].'">'.$row['title'].'</a>'?></td>
  <td><?=$row['type'];?></td>
  <?php if($row['status']=="Open"){ ?>
      <td><button class='open'><?=$row['status'];?></button></td>
  <?php } ?> 
  
  <?php if($row['status']=="Closed"){ ?>
      <td><button class='closed'><?=$row['status'];?></button></td>
  <?php } ?> 

  <?php if($row['status']=="In Progress"){ ?>
      <td><button class='progress'><?=$row['status'];?></button></td>
  <?php } ?> 
  <td><?=$row['firstname'];?><?=' ',$row['lastname'];?></td>
  <?php $date=str_split($row['created'],10);?> 
  <td><?=$date[0];?></td>
  </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<?php } ?> 