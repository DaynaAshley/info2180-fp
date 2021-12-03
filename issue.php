<?php
  session_start();
  ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Project 3</title>

    <link href="issue.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="issue.js" type="text/javascript"></script>
    <script src="sidebar.js" type="text/javascript"></script>
</head>

<body>
    <header>
   
        <h1><i class="fa fa-bug"></i>BugMe Issue Tracker</h1>

       
    </header>
    <nav>
        <div class="sidebar">
          <li><button class="hbtn"><i class="fa fa-home"></i> Home</button></li>
          <li><button class="abtn"><i class="fa fa-user-plus"></i> Add User</button></li>
          <li><button class="nbtn"><i class="fa fa-plus-circle"></i> New Issue</button></li>
          <li><button class="lbtn"><i class="fa fa-power-off"></i> Logout</button></li>
        </div>
      </nav>

    <main>
        <h2>Create Issue</h2>
        <div class="input">
        
            <div class="issue">
                <label for="tit">Title</label>
                <input id="title" type="text" name="title" />
            </div>
            <div class = "descr">
                <label for="des">Description</label>
                <input id="description" type="text" name="description" />
            </div>
            <div class= "assign">
                <label for="assigned">Assigned To</label>
                <div class="dropdown" id = "assigned"></div>
                
            </div>
            <div class= "type">
                <label for="type">Type</label>
                <select id="type" type="text" name="type">
                    <option >Bug</option>
                    <option >Proposal</option>
                    <option >Task</option>
                </select>
            </div>
            <div class = "prior">
                <label for="priority">Priority</label>
                <select id="priority" type="text" name="priority">
                    <option>Minor</option>
                    <option>Major</option>
                    <option>Critical</option>
                </select>

            </div>
</div>


            <button id='submit'>Submit</button>

            
   
    </main>

</body>

</html>