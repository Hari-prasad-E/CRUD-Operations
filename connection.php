<!-- This page is used for the connectivity to the database named test -->
<?php
                // Database Connection
 $conn= mysqli_connect("localhost", "root", "", "");
 mysqli_select_db($conn,"test");
                  // Check Connectivity
 if(!$conn){

     die("Connection failed " .mysqli_connect_error());
 } 
    ?>