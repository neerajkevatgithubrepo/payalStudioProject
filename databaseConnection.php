<?php
   $server= "localhost";
   $username= "root";
   $pass= "";
   $database= "schoolidcard";
 
   $connection = mysqli_connect($server,$username, $pass,$database);
 
         if ($connection)
           {
              echo"";
           }
 
       else
           {
             echo "database connection error";
           }
  ?>