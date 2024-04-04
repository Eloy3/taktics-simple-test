<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php
        session_start();    
        if(isset($_GET['movementID'])) {

            // Retrieve the movementID from the URL
            $movementID = $_GET['movementID'];
            
        }else {
            echo "Error: ID not provided";
            exit();
        }
        $string="SELECT type, name, date, amount, category FROM movement WHERE \"$movementID\" = movementID;";
        include "connexions.php";
        $query=mysqli_query($connexion,$string);
        $reg = mysqli_fetch_array($query);
        $movementName = $reg["name"];
        $date = $reg["date"];
        $amount = $reg["amount"];
        $category = $reg["category"];  
    ?>
    <form action="editMovement2.php?movementID=<?php echo $movementID; ?>" method = "post">
        <!-- input type-->
        <div class="form-group">
          <select id="type" name="type" class="form-control">
            <option value="Income">Income</option>
            <option value="Expense">Expense</option>
          </select>
        </div>

        <!-- input name-->
        <div class="form-group">
            <textarea type="text" id="name" name="name" class="form-control" rows=1><?php echo $movementName ?></textarea>
        </div>

        <!-- input date-->
        <div class="form-group">
            <input type="date" id="date" name="date" class="form-control" value="<?php echo $date ?>"></textarea>
        </div>

        <!-- input amount-->
        <div class="form-group">
            <input type="text" id="amount" name="amount" class="form-control" rows=1 value="<?php echo $amount ?>" ></textarea>
        </div>

        <!-- input category-->
        <div class="form-group">
            <textarea type="text" id="category" name="category" class="form-control" rows=1 ><?php echo $category ?></textarea>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Edit</button>

        <div class="text-center">
            <p><a href="balance.php">Back to balance page</a></p>
        </div>
      
      </form>
</body>
</html>