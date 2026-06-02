<?php 
$con=new mysqli("localhost","root","","db_biblioteca");

if ($con->connect_error)
    {
      die("error al conectarse".$con->connect_error);
    }
?>
