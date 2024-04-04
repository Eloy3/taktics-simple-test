<html>
    <?php
        session_start();
        
        $username = $_SESSION['name'];
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
        $insert = "insert into movement (Type,Name,Date,Amount,Category,MovementUser)
        values (\"$type\",\"$name\",\"$date\",\"$amount\",\"$category\",\"$username\");";

        mysqli_query($connexion,$insert);
               
    ?>
    <meta http-equiv="Refresh" content="0; url='balance.php'" />
</html>

