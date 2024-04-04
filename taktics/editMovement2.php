<html>
    <?php
    // Check if the movementID is provided in the URL
    if(isset($_GET['movementID'])) {

        // Retrieve the movementID from the URL
        session_start();
        $movementID = $_GET['movementID'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $date = $_POST['date'];
        $amount = $_POST['amount']; 
        if (!is_numeric($amount)) {
            $amount = 0;
        } else {
            // Convert the amount to a float value
            $amount = (float) $amount;
        }
        $category = $_POST['category'];  
        include "connexions.php";
        $update = "update movement set Type=\"$type\", Name=\"$name\", Date=\"$date\", Amount=\"$amount\", Category = \"$category\"
        where movementID = \"$movementID\";";

        mysqli_query($connexion,$update);
        
    } else {
        echo "Error: Movement ID not provided";
        exit();
    }
    ?>

    <meta http-equiv="Refresh" content="0; url='balance.php'" />
</html>