<?php 
$con=new mysqli("localhost","root","","bd_biblioteca");

if ($con->connect_error)
    {
      die("error  alc conectarse".$con->connect_error);
    }
?>