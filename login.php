<?php
session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
    </head>

    
    <body>
        <nav class="navbar navbar-inverse" style="border-radius: 0px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img src="resources/images/logo.png" alt="logo" width="30px" height="30px" style="margin-top: 10px;"/>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">NeoSIS</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                
                <div class="col-sm-5" style="margin-left: 30%; margin-top: 3%; box-shadow: 2px 3px 10px #808080">
                    <form action="logincheck.php" method="POST" style="margin: 15px;">
                        <div style="text-align: center; margin-bottom: 30px;">
                            <h1>Login</h1>
                        </div>
                        <div style="margin-left: 33%; margin-bottom: 5%;">
                            <img src="resources/images/login.png" class="img-rounded" alt="image" width="150" height="125">
                        </div>
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox"> Remember me</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div class="navbar-right" style="margin-top: 3px;">Forget <a href="">password</a> ?</div>
                    </form>
                </div>
            </div>           
        </div>    
            
            
    </body>
</html>
