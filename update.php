<?php
include('connex.php');  // Include the connection script
include('client.php');  // Include the client class
include('ClientPlan.php');  // Include the ClientPlan class

// Create an instance of the Connection class
$connex = new Connection();
$connex->selectDatabase('crudp1');
$db = $connex->getConnection();

$emailValue = "";
$lnameValue = "";
$fnameValue = "";
$errorMesage = "";
$successMesage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    // Call the static selectClientById method and store the result in $row
    $row = Client::selectClientById('clients', $db, $id);

    $emailValue = $row["email"];
    $lnameValue = $row["lastname"];
    $fnameValue = $row["firstname"];
} else if (isset($_POST["submit"])) {
    $emailValue = $_POST["email"];
    $lnameValue = $_POST["lastName"];
    $fnameValue = $_POST["firstName"];
    $selectedPlanId = $_POST["plan"];

    if (empty($emailValue) || empty($fnameValue) || empty($lnameValue)) {
        $errorMesage = "All fields must be filled out!";
    } else {
        // Create a new instance of client
        $client = new Client($fnameValue, $lnameValue, $emailValue, '');

        // Call the static updateClient method
        Client::updateClient($client, 'Clients', $db, $_GET['id']);

        // Create a new instance of ClientPlan and update the plan
        $clientPlan = new ClientPlan($db);
        $updateResult = $clientPlan->updatePlan($_GET['id'], $selectedPlanId);

        if ($updateResult === true) {
            $successMesage = "Client updated successfully.";
        } else {
            $errorMesage = $updateResult;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5 ">


        <h2>Update</h2>


    <?php


    if(!empty($errorMesage)){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>$errorMesage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>";
    }
       ?>


        <br>
        <form method="post">
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="fname">First Name:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $fnameValue ?>" class="form-control" type="text" id="fname" name="firstName">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="lname">Last Name:</label>
                    <div class="col-sm-6">
                        <input  value="<?php echo $lnameValue ?>" class="form-control" type="text" id="lname" name="lastName">
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input value=" <?php echo $emailValue ?>" class="form-control" type="email" id="email" name="email">
                    </div>
            </div>
            <div class="row mb-3">
    <label class="col-form-label col-sm-1" for="plan">Plan:</label>
    <div class="col-sm-6">
        <select class="form-control" id="plan" name="plan">
            <?php
            $plans = Client::getAllPlans($connex->conn);
            foreach ($plans as $plan) {
                echo "<option value='" . $plan['id'] . "'>" . $plan['name'] . "</option>";
            }
            ?>
        </select>
    </div>
</div>
            


            <?php
            if(!empty($successMesage)){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>";
            }
  ?>  
      


            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class=" btn btn-primary">Update</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="read.php">Cancel</a>
                    </div>
            </div>
        </form>


    </div>


</body>
</html>
