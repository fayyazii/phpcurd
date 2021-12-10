<?php
 
 $mysqli = new mysqli('localhost','root', '','crud') or die (mysqli_error($mysqli));
 if(isset($_POST['save']))
 {
    $name = $_POST['name'];
    $location=$_POST['location'];
    $mysqli->query("insert into cruddata (name,location)  values('$name','$location')  ") or
    die($mysqli->error);
 }
 if(isset($_GET['delete']))
 {
     $id = $_GET['delete'];
     $mysqli->query("Delete from cruddata where id =$id") or die($mysqli->error);
 }
?>