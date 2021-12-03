<?php
    session_start();
?>
 
 <!DOCTYPE html>
<html>
   
  <head>
    <meta charset="utf-8">
    <title>Add User</title>
    <link rel="stylesheet" href="adduser.css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="adduser.js"></script>
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

           <main id="display">
               
		            <div id="fields">
                       <h1> New User </h1>
                       <br><label for="fname">Firstname</label></br>
                       <input type="text" name="fname" id="fname"/><br>
                       <div class="firstname"></div>
                       
                       <label for="lname">Lastname</label><br>
			            <input type ="text" name="lname" id="lname"/> <br>			
			            <div class="lastname"></div>
                       
                        <label for="password">Password</label><br>
                       <input type="text" name="password" id="password" /><br>
                       <div class="password"></div>
                       
                       <label for="email">Email</label><br>
			            <input type="email" name="email" id="email"/><br>			
                        <div class="email"></div>
                       
                        <div class="results"></div>
                        <div id="subdiv">
                        <button class="sbtn">Submit</button>
                        </div>
		            </div>
           </main>

</body>
</html>
