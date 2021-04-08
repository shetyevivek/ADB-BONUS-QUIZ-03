<?php 

   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc

   $names = $_GET['name'];

   echo $_SESSION['superhero'];
   echo "<br>";
   echo $names;

?>