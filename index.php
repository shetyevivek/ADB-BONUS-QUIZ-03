<?php

   session_start();
   $_SESSION['superhero'] = "batman";

   $name = "Vivek";

   echo "<a href='page2.php?name=$name'>Go to the other page</a>";

?>