<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="balancePage_style.css">
    <meta http-equiv="refresh" content="30" />
</head>
<?php
session_start();       
if(isset($_SESSION['name'])){
    $username = $_SESSION['name'];
    // Initialize variables outside the condition
    $totalIncome = 0;
    $totalExpense = 0;
    $balance = 0;
?>

<body>
    <?php
    include "connexions.php";       
    ?>
    <div class="row py-5 px-4"> 
        <div class="col-md-5 mx-auto"> <!-- Profile widget --> 
            <div class="bg-white shadow rounded overflow-hidden"> 
                <div class="px-4 pt-0 pb-4 cover"> <div class="media align-items-end profile-head">  
                        <div class="media-body mb-5 text-white"> 
                            <h4 class="mt-0 mb-0"><?php echo $_SESSION['name'] ?></h4> 
                        </div> 
                </div> 
                <p class="small mb-4"> </p> 
            </div> 
                <div class="py-4 px-4"> 
                    <div class="d-flex align-items-center justify-content-between mb-3"> 
                        <h5 class="mb-0"> Movements </h5>
                        <a href="addMovement.html" class="btn btn-link text-muted">Add a movement</a> 
                    </div> 

                    <div class="col"> 
                        <?php
                        $string="SELECT movementID, type, name, date, amount, category FROM movement WHERE \"$username\" = MovementUser ORDER BY date;";
                        $consulta=mysqli_query($connexion,$string);
                        $reg = mysqli_fetch_array($consulta); 
                        if($reg == NULL){
                            echo  "There are no movements";
                        } else {
                            ?>
                            <table class="movements-table"  style="border-spacing: 10px;">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Move initialization here to ensure it always happens
                                for($i=0;$reg!=NULL;$i++){
                                    ?>
                                    <tr>
                                        <td><?php echo $reg["type"];?></td>
                                        <td><?php echo $reg["name"];?></td>
                                        <td><?php echo $reg["date"];?></td>
                                        <td><?php echo $reg["amount"];
                                            if ($reg["type"] == 'Income') {
                                                $totalIncome += $reg["amount"];
                                            } else {
                                                $totalExpense += $reg["amount"];
                                            }
                                        ?></td>
                                        <td><?php echo $reg["category"];?></td>
                                        <td> <a href="editMovement.php?movementID=<?php echo $reg["movementID"]; ?>" class="btn btn-link text-muted">Edit</a> </td>
                                        <td> <a href="removeMovement.php?movementID=<?php echo $reg["movementID"]; ?>" class="btn btn-link text-muted">Delete</a> </td>
                                    </tr>
                                    <?php
                                    $reg = mysqli_fetch_array($consulta);
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                            // Calculate the balance
                            $balance = $totalIncome - $totalExpense;
                            }
                            ?>
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
    <!-- Footer section -->
    <footer>
        <div class="container">
            <div class="row" style="text-align :center;">
                <div class="col-md-4">
                    <h4>Total Income: <?php echo $totalIncome; ?></h4>
                </div>
                <div class="col-md-4">
                    <h4>Total Expense: <?php echo $totalExpense; ?></h4>
                </div>
                <div class="col-md-4">
                    <h4>Balance: <?php echo $balance; ?></h4>
                </div>
            </div>
        </div>
    </footer>
</body>
<?php
}else{
?>
    <p style="color:white; font-size:200%;text-align:center;"><?php echo "Error, you're not logged in"; ?></p>
<?php
}        
?>
</html>
