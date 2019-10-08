<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//Inside myfirstprogram.php

echo "<h2>Enjoy some PHP multiplication!</h2>";

echo "<table border = \"1\" style = border-collapse: collapse'>";
   for ($row=1; $row <= 10; $row++)
   {
      echo "<tr> \n";
      for($col = 1; $col <= 10; $col++)
      {
         $p = $col * $row;
         echo "<td>$p</td> \n";
      }
      echo "</tr>";
   }
   echo "</table>";
   echo "<br><br><a href=\"javascript:history.go(-1)\">GO BACK</a>";

?>