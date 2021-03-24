<?php
//connect mysql database
$hostname = "uta.cloud";
$username = "vvs1620_vivekshetye";
$password = "Shaleshwar12@";
$database = "vvs1620_database";

$con = mysqli_connect($hostname, $username, $password, $database);

if($con)
{
    echo "Connection Success";
}
else
{
    echo "Connection failed";
}
?>