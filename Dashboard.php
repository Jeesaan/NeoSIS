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
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/tablestyle.css">
        <link rel="stylesheet" type="text/css" href="css/headstyle.css">
        <link rel="stylesheet" type="text/css" href="css/footerstyle.css">
    </head>
    <style>
        .buttons1{
           background-color: #333333; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
        }              
        .buttons1:hover{
            box-shadow: 2px 5px 5px #b6b4b4;
        }
        .bages{
            font-size: 12px;background-color: white; color: black;
        }
    </style>
    <body>
        <?php
        // put your code here
        ?>
        <div class="header">
            <i class="fa fa-home" style="border: none; background-color: #333333; padding: 15px 10px; text-align: center; color: white; font-size: 20px;"> NeoSIS</i>
            <a href="Dashboard.php"><i class="buttons"style="box-shadow: 2px 5px 5px #4CAF50; background-color: #336633;">Dashboard</i></a>
            <a href="Dashboard.php"><i class="buttons">Class</i></a>
            <a href="Dashboard.php"><i class="buttons">Student</i></a>
            <a href="Teacher.php"><i class="buttons">Teacher</i></a>
            <a href="Dashboard.php"><i class="buttons">Atendence</i></a>
            <a href="Dashboard.php"><i class="buttons">Marksheet</i></a>
            <a href="Dashboard.php"><i class="buttons">Reports</i></a>
        </div>
        
        
        <!--Body section-->
        <div align="center" id="topbutton" >
            <button id="ts"class="buttons1" style="background-color: #4CAF50; margin: 10px;  ">Total Student <span class="badge bages">12</span></button>
            <button id="tt"class="buttons1" style="background-color: #327394; margin: 10px; margin-left: 90px; ">Total Teacher <span class="badge bages" >12</span></button>
            <button id="tc"class="buttons1" style="background-color: #003399; margin: 10px; margin-left: 90px; padding-right: 50px; padding-left: 50px;">Total Class <span class="badge bages" >12</span></button>
            <button id="tm"class="buttons1" style="background-color: #006666; margin: 10px; margin-left: 90px; ">Total Marksheet <span class="badge bages">12</span></button>
        </div>
        
         <!--End...-->
            
            
        
        
        <div class="footer-text" align='center'>NeoSIS &copy; <?php echo date('Y'); ?></div>
    </body>
</html>
