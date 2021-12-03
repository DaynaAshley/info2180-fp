<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="login.js"></script>
    
  </head>
  <body>
    <header>
      <h1><i class="fa fa-bug"></i>BugMe Issue Tracker</h1>
    </header>  
    

<main>
    <label>Email:</label>
    <input id="email" type="email" placeholder="Enter email..." />
    <div class="email"></div>
    <label>Password:</label>
    <input id="password" type="password" placeholder="Enter password.."  minlength="8" required />
    <i class="fa fa-eye" id="see"></i>
    <div class="password"></div>
    
<button class="login">Login</button>
</main>
</body>
</html>