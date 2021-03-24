<!DOCTYPE html>
<html>
<head>
  <title>Answer 11</title>
</head>
<body>
  <div>
    <h2>Student ID : 1001821620<br>Name : Vivek Vishwanath Shetye</h2><br><br><br>
  </div>
  </div>
</body>
</html>

<?php
//Start time
$start = microtime(true);

include_once 'connection.php';

// Input data
$name = $_POST['name'];
$year1 = $_POST['year1'];
$year2 = $_POST['year2'];

$sql = "SELECT * FROM ptelect WHERE candidate LIKE '$name%' OR candidate LIKE '%$name' OR candidate LIKE '%$name%' AND year BETWEEN $year1 AND $year2";
$result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

echo "<table border='1'>
<tr>
<th style='padding:15px;'>Candidate Name</th>
<th style='padding:15px;'>Year</th>
<th style='padding:15px;'>Party</th>
th style='padding:15px;'>State</th>
th style='padding:15px;'>Votes</th>
</tr>";

while ($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td style='padding:15px;'>" . $row['candidate'] . "</td>";
  echo "<td style='padding:15px;'>" . $row['year'] . "</td>";
  echo "<td style='padding:15px;'>" . $row['party_simplified'] . "</td>";
  echo "<td style='padding:15px;'>" . $row['state'] . "</td>";
  echo "<td style='padding:15px;'>" . $row['candidatevotes'] . "</td>";
  echo "</tr>";
}
echo "</table>";
echo "<br><br>";

mysqli_close($con);

//End time
$end = microtime(true);
echo "Query time = " .round($end - $start, 4);
?>