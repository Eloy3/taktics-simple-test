<html>
    <head>
        <link rel="stylesheet" type="text/css" href="balancePage_style.css">
    </head>
    <?php
        session_start();
        $userlocal = $_POST['username'];
        $passlocal = $_POST['password'];
        $_SESSION['name'] = $userlocal;
        $_SESSION['pass'] = $passlocal;       

        include "connexions.php";
        $string = "select username from user where username = \"$userlocal\" and password = \"$passlocal\";";
        $consulta=mysqli_query($connexion,$string);
        $reg = mysqli_fetch_array($consulta); 
        if ($reg!=NULL){
    ?>
        <meta http-equiv="Refresh" content="0; url='balance.php'"/>
        <body>
            
    <?php
        }else{
    ?>
    
        <p style="color:black; font-size:200%;text-align:center;"><?php echo  "User or password incorrect";?>
        <div class="text-center">
            <p style="color:white; font-size:200%;text-align:center;">
                <a href="login.html">Back to login</a></p>
        </div>
        </body>
    <?php
        }
    ?>
</html>

