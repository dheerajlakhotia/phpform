<?php 

$conn = new mysqli('localhost','root','' , 'form');

if(!$conn){
  die(mysqli_error($conn));
}

?>