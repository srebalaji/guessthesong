<?php

if(!mysql_connect('localhost','root','') || !mysql_select_db('songlovers'))
   {
die("Database error....I will fix it soon");

   }
   
   
$user = "root";
$password = "";
$database_name = "songlovers";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

//initialize the connection to the database
$conn = new PDO($dsn, $user, $password);
?>