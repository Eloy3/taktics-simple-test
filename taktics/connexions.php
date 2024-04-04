<?php    
    $connexion=mysqli_connect("localhost","root","")
    or die("Connection failure: can't connect to localhost");
    $bd=mysqli_select_db($connexion,"taktics")
    or die("Fatal error: error in database");
?>