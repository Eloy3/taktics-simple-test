<html>
    <head>
        <link rel="stylesheet" type="text/css" href="balancePage_style.css">
    </head>
    <?php

        $userlocal = $_POST['username'];
        $passlocal = $_POST['password'];

        include "connexions.php";
        $usuari = "select username from user where username = \"$userlocal\";";
        $consulta=mysqli_query($connexion,$usuari);
        $reg = mysqli_fetch_array($consulta); 
        if ($reg!=NULL){
            echo  "This username already exists";
    ?>
        <div class="text-center">
            <p><a href="login.html">Back to login</a></p>
        </div>
    <?php
        }else{

        $insert = "insert into user (username,password)
         values (\"$userlocal\",\"$passlocal\");";

        mysqli_query($connexion,$insert);
    ?>
        <meta http-equiv="Refresh" content="0; url='login.html'" />
    <?php
        }      
    ?>
    
</html>

