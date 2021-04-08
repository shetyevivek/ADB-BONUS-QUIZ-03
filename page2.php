<?php 

   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   echo $_SESSION['superhero'];

?>