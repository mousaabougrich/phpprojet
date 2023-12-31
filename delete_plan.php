<?php
include('connex.php');  // Assuming this file creates a connection object $conn
include('ClientPlan.php');

$connex = new Connection();
$connex->selectDatabase('crudp1');
$clientPlan = new ClientPlan($connex->conn);

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $clientId = $_GET['id'];

    // Example logic to decide which plan to delete
    // Fetch the lowest plan_id for this client
    $planIdQuery = "SELECT plan_id FROM ClientPlans WHERE client_id = $clientId ORDER BY plan_id ASC LIMIT 1";
    $result = mysqli_query($connex->conn, $planIdQuery);
    if ($row = mysqli_fetch_assoc($result)) {
        $planId = $row['plan_id'];

        // Use the deleteClientPlan method
        if ($clientPlan->deleteClientPlan($clientId, $planId)) {
            // Redirect back with a success message
            header("Location: read.php.php?message=PlanDeleted");
        } else {
            // Redirect back with an error message
            header("Location: read.php.php?error=DeleteFailed");
        }
    } else {
        // No plan found, or error fetching plan
        header("Location: read.php.php?error=PlanNotFound");
    }
} else {
    // Redirect back with an error message if ID is not set or not numeric
    header("Location: read.php.php?error=InvalidID");
}
?>
