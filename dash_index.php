<?php
  session_start();
  ?>

<!DOCTYPE html>
<html>
   
  <head>
    <meta charset="utf-8">
    <title>DashBoard</title>
    <link rel="stylesheet" href="styles_dash.css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="dash.js"></script>
    <script src="sidebar.js"></script>
  </head>
  <body>
    <header>
      <h1><i class="fa fa-bug"></i>BugMe Issue Tracker</h1>
    </header>  
    <div class='side'>
       <nav>
        <div class="side-bar">
          <li><button class="hbtn"><i class="fa fa-home"></i> Home</button></li>
          <li><button class="abtn"><i class="fa fa-user-plus"></i> Add User</button></li>
          <li><button class="nbtn"><i class="fa fa-plus-circle"></i> New Issue</button></li>
          <li><button class="lbtn"><i class="fa fa-power-off"></i> Logout</button></li>
        </div>
      </nav>
</div>
     <main>
      <div class="heading">
        <h1>Issues</h1>
        <div class="button">
        <button class="new_btn">Create New Issue</button>
      </div>
      </div>
      
      <div class="filter">
       <h4>Filter By:</h4>
        <div class="button1">
       <button class="all_btn">ALL</button>
       <button class="open_btn">OPEN</button>
       <button class="ticket_btn">MY TICKETS</button>
      </div>
      </div>
    
      <div id='result'><div id='tables'></div></div>
    </main>
  </body>
</html>