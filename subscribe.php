<?php
session_start();
include("connex.php"); // Connection script
include("ClientPlan.php"); // ClientPlan class

if (!isset($_SESSION['user_id'])) {
    header('Location: loging.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['plan_id'])) {
    $clientId = $_SESSION['user_id'];
    $planId = $_POST['plan_id'];

    $conn = new Connection();
    $db = $conn->getConnection();
    mysqli_select_db($db, 'crudp1');

    $clientPlan = new ClientPlan($db);
    $result = $clientPlan->subscribe($clientId, $planId);

    if ($result === true) {
        header('Location: read.php'); // Redirect on successful subscription
    } else {
        echo $result; // Display error message
    }
} else {
    echo "Invalid request";
}
?>

