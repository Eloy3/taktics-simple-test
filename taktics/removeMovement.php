<html>
    <?php
    // Check if the movementID is provided in the URL
    if(isset($_GET['movementID'])) {

        // Retrieve the movementID from the URL
        $movementID = $_GET['movementID'];
        include "connexions.php";
        $delete = "DELETE FROM movement WHERE movementID = $movementID";
        mysqli_query($connexion,$delete);
        
    } else {
        echo "Error: ID not provided";
        exit();
    }
    ?>

    <meta http-equiv="Refresh" content="0; url='balance.php'" />
</html>